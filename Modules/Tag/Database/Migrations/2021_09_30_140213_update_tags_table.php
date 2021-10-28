<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Tag\Entities\Tag;

class UpdateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('status')->default("published");
        });

        // Migrate Status Data.
        $tags = Tag::all();
        foreach ($tags as $tag) {
            $status = 'suspended';
            if ( $tag->published ) {
                $status = 'published';
            } else if ( $tag->is_trashed ) {
                $status = 'trashed';
            }
            $tag->update([
                'status' => $status
            ]);
        }

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('published');
            $table->dropColumn('is_trashed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('published')->default(0);
            $table->boolean('is_trashed')->default(0);
        });

        // Migrate Status Data.
        $tags = Tag::all();
        foreach ($tags as $tag) {
            switch( $tag->status ) {
                case 'published':
                    $is_published = 1;
                    $is_trashed = 0;
                    break;
                case 'trashed':
                    $is_published = 0;
                    $is_trashed = 1;
                    break;
                default:
                    $is_published = 0;
                    $is_trashed = 0;
            }

            $tag->update([
                'published' => $is_published,
                'is_trashed'  => $is_trashed,
            ]);        
        }

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
