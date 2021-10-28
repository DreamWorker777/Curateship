<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('posts_settings', function (Blueprint $table) {
            $table->id();
            $table->string('medium_width', 255)->nullable();
            $table->string('medium_height', 255)->nullable();
            $table->string('image_setting', 255)->nullable();
            $table->integer('list_per_page')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts_settings');
    }
}
