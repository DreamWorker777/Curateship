<?php

namespace Modules\Tag\Entities;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Modules\Post\Entities\{Post, PostsTag};
use Modules\Tag\Entities\TagsMeta;

class Tag extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = ['id'];

    /**
     * Get the tag category record associated with the tag.
     *
     * @return void
     */
    public function tagCategory()
    {
        return $this->hasOne('Modules\Tag\Entities\TagCategory', 'id', 'tag_category_id');
    }

    public function getThumbnail($type = 'original')
    {
        $thumbnail = TagsMeta::getMetaData( $this->id, 'thumbnail' );
        $thumbnail_medium = TagsMeta::getMetaData( $this->id, 'thumbnail_medium' );
    	if($type == 'original' && $thumbnail) {
    		return storage_path() . '/app/public/tags/original/' . $thumbnail;
    	}

    	if($type == 'medium' && $thumbnail_medium) {
    		return storage_path() . '/app/public/tags/thumbnail/' . $thumbnail_medium;
    	}

        return false;
    }

    public function showThumbnail($type = 'original')
    {
        $thumbnail = TagsMeta::getMetaData( $this->id, 'thumbnail' );
        $thumbnail_medium = TagsMeta::getMetaData( $this->id, 'thumbnail_medium' );
    	if($type == 'original'){
    		return asset('storage/tags/original') . '/' . $thumbnail;
    	}

    	if($type == 'medium'){
    		return asset('storage/tags/thumbnail') . '/' . $thumbnail_medium;
    	}
	}

    public function showVideo($video_file)
    {
        $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
        if (isMobileDevice() && File::exists($video_mobile)) {
            return asset('storage/videos/mobile') . '/' . $video_file;
        } else {
            return asset('storage/videos/original') . '/' . $video_file;
        }
	}
    
    public function getTagImage($collection = 'images') {
        $media = Media::where('model_type', __CLASS__)
            ->where('collection_name', $collection)
            ->where('model_id', $this->id)
            ->latest()
            ->first();
        return $media ? asset('storage') . '/' . $media->id . '/' . $media->file_name : '';
    }

    public function getPostCount() {
        $posts_count = Post::leftJoin('posts_tags', 'posts_tags.post_id', '=', 'posts.id')
            ->select([
                'posts.id',
                DB::raw('COUNT(*) as relevance')
            ])
            ->where(
                [
                    'posts_tags.tag_id' => $this->id,
                    'posts.status'      => 'published'
                ]    
            )->count();
        return $posts_count;
    }
}
