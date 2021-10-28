<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Post\Entities\{Post, PostsMeta};

class CreatePostsMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->string('meta_key');
            $table->string('meta_value');
            $table->timestamps();
        });

        // Migrate Data.
        $posts = Post::where('status', 'rejected')->get();
        foreach ($posts as $post) {
            // Add data into 'posts_metas' table
            PostsMeta::create([
                'post_id'     => $post->id,
                'meta_key'    => 'rejected_reason',
                'meta_value'  => $post->reject_reason
            ]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('reject_reason');
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
            $table->string('reject_reason')->default("");
        });

        // Migrate Data.
        $posts = Post::where('status', 'rejected')->get();
        foreach ($posts as $post) {
            // Get Post Meta from meta table
            $meta = PostsMeta::where(['post_id' => $post->id, 'meta_key' => 'rejected_reason'])->first();
            // Update 'reject_reason' column.
            if ( $meta ) {
                $post->update([
                    'reject_reason' => $meta->meta_value
                ]);
            }
        }

        Schema::dropIfExists('posts_metas');
    }
}
