<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Users\Entities\{User, UsersSetting};

class ChangeUsersTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            $table->string('avatar')->after('bio')->nullable();
            $table->string('cover_photo')->nullable()->after('avatar');
        });

        // Move Data.
        $users = User::get();
        foreach ($users as $user) {
            UsersSetting::where( 'user_id', $user->id )->update([
                'avatar'      => $user->avatar,
                'cover_photo' => $user->cover_photo
            ]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('cover_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->after('email')->nullable();
            $table->string('cover_photo')->nullable()->after('avatar');
        });

        // Move Data.
        $users = UsersSetting::get();
        foreach ($users as $user) {
            User::where( 'id', $user->user_id )->update([
                'avatar'      => $user->avatar,
                'cover_photo' => $user->cover_photo
            ]);
        }

        Schema::table('users_settings', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('cover_photo');
        });
    }
}
