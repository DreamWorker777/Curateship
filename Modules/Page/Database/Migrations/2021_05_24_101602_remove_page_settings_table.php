<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pages_settings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pages_settings', function (Blueprint $table) {
            $table->id();
            $table->string('medium_width', 255)->nullable();
            $table->string('medium_height', 255)->nullable();
            $table->string('image_setting', 255)->nullable();
            $table->integer('list_per_page')->nullable();
            $table->timestamps();
        });
    }
}
