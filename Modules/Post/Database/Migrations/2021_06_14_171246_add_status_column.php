<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Post\Entities\Post;

class AddStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('status')->default("draft");
        });

        // Migrate Data.
        $posts = Post::all();
        foreach ($posts as $post) {
            $status = 'draft';
            if ( $post->is_published ) {
                $status = 'published';
            } else if ( $post->is_rejected ) {
                $status = 'rejected';
            } else if ( $post->is_pending ) {
                $status = 'pending';
            } else if ( $post->is_deleted ) {
                $status = 'deleted';
            }
            $post->update([
                'status' => $status
            ]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_published');
            $table->dropColumn('is_deleted');
            $table->dropColumn('is_pending');
            $table->dropColumn('is_rejected');
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
            $table->boolean('is_published')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_pending')->default(0);
            $table->boolean('is_rejected')->default(0);
        });

        // Migrate Data.
        $posts = Post::all();
        foreach ($posts as $post) {
            switch( $post->status ) {
                case 'draft':
                    $is_published = 0;
                    $is_rejected = 0;
                    $is_pending = 0;
                    $is_deleted = 0;
                    break;
                case 'published':
                    $is_published = 1;
                    $is_rejected = 0;
                    $is_pending = 0;
                    $is_deleted = 0;
                    break;
                case 'rejected':
                    $is_published = 0;
                    $is_rejected = 1;
                    $is_pending = 0;
                    $is_deleted = 0;
                    break;
                case 'pending':
                    $is_published = 0;
                    $is_rejected = 0;
                    $is_pending = 1;
                    $is_deleted = 0;
                    break;
                case 'deleted':
                    $is_published = 0;
                    $is_rejected = 0;
                    $is_pending = 0;
                    $is_deleted = 1;
                    break;
                default:
                    $is_published = 0;
                    $is_rejected = 0;
                    $is_pending = 0;
                    $is_deleted = 0;
            }

            $post->update([
                'is_published' => $is_published,
                'is_rejected'  => $is_rejected,
                'is_pending'   => $is_pending,
                'is_deleted'   => $is_deleted,
            ]);        
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
