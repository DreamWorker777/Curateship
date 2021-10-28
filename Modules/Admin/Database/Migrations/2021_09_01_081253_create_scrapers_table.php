<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrapers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('default_url', 1023);
            $table->boolean('direction')->default(0);
            $table->string('item_url', 255);
            $table->string('title', 255);
            $table->string('image', 255);
            $table->string('video', 255);
            $table->string('artist', 255)->nullable();
            $table->string('origins', 255)->nullable();
            $table->string('character', 255)->nullable();
            $table->string('media', 255)->nullable();
            $table->string('misc', 255)->nullable();
            $table->string('status', 10)->default('stopped');
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
        Schema::dropIfExists('scrapers');
    }
}
