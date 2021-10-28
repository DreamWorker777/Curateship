<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Post\Entities\{Post, PostsMeta};

class RemoveSeoPageTitleColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Migrate Data.
        $posts = Post::where('seo_page_title', '!=', '')->get();
        foreach ($posts as $post) {
            // Add data into 'posts_metas' table
            PostsMeta::create([
                'post_id'     => $post->id,
                'meta_key'    => 'seo_page_title',
                'meta_value'  => $post->seo_page_title
            ]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('seo_page_title');
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
            $table->string('seo_page_title', 255)->nullable();
        });

        // Migrate Data.
        $metas = PostsMeta::where(['meta_key' => 'seo_page_title'])->get();
        foreach ($metas as $meta) {
            $post = Post::find($meta->post_id);
            // Update 'seo_page_title' column.
            if ( $post ) {
                $post->update([
                    'seo_page_title' => $meta->meta_value
                ]);
            }
            $meta->delete();
        }
    }
}
