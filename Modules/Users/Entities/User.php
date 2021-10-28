<?php

namespace Modules\Users\Entities;

use File, Image, Imagick;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Modules\Admin\Entities\Settings;
use Modules\Users\Entities\UsersSetting;

use App\Notifications\PasswordReset;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's `permission` value and set it either Active/ Inactive as `status`.
     *
     * @param  string  $value
     * @return string
     */
    // public function getStatusAttribute()
    // {
    //     return ($this->permission < 1) ? 'Inactive' : 'Active';
    // }

    public function users_setting()
    {
        return $this->hasOne(UsersSetting::class);
    }

    public function hasSocialMedia()
    {
        $social_media_links = [
            $this->users_setting->twitter_link,
            $this->users_setting->facebook_link,
            $this->users_setting->instagram_link
        ];

        $has = false;

        foreach($social_media_links as $social_media_link){
            if(!is_null($social_media_link)){
                $has = true;
            }
        }

        return $has;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(448)
            ->height(448);
    }

    public function getCoverPhoto()
    {
        $user_info = UsersSetting::where('user_id', $this->id)->first();
        if(!$user_info || is_null($user_info->cover_photo)){
            return asset('assets/img/gray.jpg');
        }

        return asset('storage/users-images/cover') . '/' . $user_info->cover_photo;
    }

    public function hasCoverPhoto()
    {
        $user_info = UsersSetting::where('user_id', $this->id)->first();
        return (!$user_info || is_null($user_info->cover_photo)) ? false : true;
    }

    public function hasAvatar() {
        $user_info = UsersSetting::where('user_id', $this->id)->first();
        return ! $user_info || is_null($user_info->avatar) ? false : true;
    }

    public function getAvatar()
    {
        $user_info = UsersSetting::where('user_id', $this->id)->first();
        return (!$user_info || is_null($user_info->avatar))
        ? asset('storage/users-images/avatars')
        : asset('storage/users-images/avatars') . '/' . $user_info->avatar;
    }

    public function copyAvatar()
    {
        $media = Media::where('model_type', __CLASS__)
            ->where('model_id', $this->id)
            ->latest()
            ->first();

        $mime_type = $media->mime_type;

        $new_directory = storage_path() . '/app/public/users-images/avatars';

        // Add directory if does not exists.
        File::ensureDirectoryExists($new_directory);


        $settings_width = 448;
        $settings_height = 448;
        if ($mime_type == 'image/gif') {
            $old_directory = storage_path() . '/app/public/' . $media->id . '/' . $media->file_name;
            // Create random string
            $name = md5(uniqid()) . time() . '.gif';

            // Save thumbnail (medium) image to file system
            $thumbnail_medium = new Imagick($old_directory);
            $thumbnail_medium = $thumbnail_medium->coalesceImages();
            do {
                $thumbnail_medium->resizeImage( $settings_width, $settings_height, Imagick::FILTER_BOX, 1, true );
            } while ( $thumbnail_medium->nextImage());

            $thumbnail_medium = $thumbnail_medium->deconstructImages();
            $thumbnail_medium->writeImages($new_directory . '/' . $name, true);

        } else {
            $old_directory = storage_path() . '/app/public/' . $media->id . '/conversions/' . $media->name . '-thumb.jpg';
            // Create random string
            $name = md5(uniqid()) . time() . '.jpg';
            File::copy($old_directory, $new_directory . '/' . $name);
        }        

        return $name;
    }

    public function deleteMediaAvatar()
    {
        $query = Media::where('model_type', __CLASS__)
            ->where('model_id', $this->id)
            ->latest()
            ->first();

        if($query){
            $user_avatar_folder_path = storage_path() . '/app/public/' . $query->id;
            if(is_dir($user_avatar_folder_path)){
                File::deleteDirectory($user_avatar_folder_path);

                $query->delete();
            }
        }
    }

    public function deleteAvatarFile()
    {
        $user_info = UsersSetting::where('user_id', $this->id)->first();
        $path = storage_path() . '/app/public/users-images/avatars/' . $user_info->avatar;
        unlink($path);
    }

    public function posts()
    {
        return $this->hasMany('Modules\Post\Entities\Post');
    }

    public function getUserRole() {
        $query = Role::where('permission', $this->permission)
            ->first();

        if($query){
            return $query->key;
        }

        return false;
    }

    public function isAdmin() {
        return ($this->getUserRole() == 'admin') ? true : false;
    }

    public function isEditor() {
        return ($this->getUserRole() == 'editor') ? true : false;
    }

    public function isRegisteredUser() {
        return ($this->getUserRole() == 'registered') ? true : false;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $settings = Settings::getSiteSettings();
        
        $data = [
            'token' => $token,
            'from_email' => !empty($settings['notify_from_email']) ? $settings['notify_from_email'] : config('mail.from.address'),
            'template' => !empty($settings['template_forgot_password']) ? $settings['template_forgot_password'] : '',
        ];

        $this->notify(new PasswordReset($data));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $settings = Settings::getSiteSettings();
        
        $data = [
            'from_email' => !empty($settings['notify_from_email']) ? $settings['notify_from_email'] : config('mail.from.address'),
            'template' => !empty($settings['template_email_confirm']) ? $settings['template_email_confirm'] : '',
        ];
        $this->notify(new VerifyEmail($data));
    }
}
