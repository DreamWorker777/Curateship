<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('seo_page_title', 255)->nullable();
            $table->text('tags')->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
