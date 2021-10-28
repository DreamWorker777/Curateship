<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title', 255);
            $table->text('slug');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_medium')->nullable();
            $table->string('seo_page_title', 255)->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_pending')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->string('reject_reason')->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
