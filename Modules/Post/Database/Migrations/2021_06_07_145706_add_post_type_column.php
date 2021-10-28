<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_type')->default('post');
        });
        Schema::table('posts_settings', function (Blueprint $table) {
            $table->string('post_type')->default('post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('post_type');
        });
        Schema::table('posts_settings', function (Blueprint $table) {
            $table->dropColumn('post_type');
        });
    }
}
