<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Tag\Entities\{Tag, TagsMeta};

class CreateTagsMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained();
            $table->string('meta_key');
            $table->text('meta_value');
            $table->timestamps();
        });

        // Migrate Seo Title Data.
        $tags = Tag::where('seo_title', '!=', '')->get();
        foreach ($tags as $tag) {
            // Add data into 'tags_metas' table
            TagsMeta::create([
                'tag_id'     => $tag->id,
                'meta_key'    => 'seo_page_title',
                'meta_value'  => $tag->seo_title
            ]);
        }

        // Migrate Description Data
        $tags = Tag::where('description', '!=', '')->get();
        foreach ($tags as $tag) {
            // Add data into 'tags_metas' table
            TagsMeta::create([
                'tag_id'     => $tag->id,
                'meta_key'    => 'description',
                'meta_value'  => $tag->description
            ]);
        }

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('seo_title');
            $table->dropColumn('description');
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
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
        });

        // Migrate Seo Title Data.
        $metas = TagsMeta::where(['meta_key' => 'seo_page_title'])->get();
        foreach ($metas as $meta) {
            $tag = Tag::find($meta->tag_id);
            // Update 'seo_page_title' column.
            if ( $tag ) {
                $tag->update([
                    'seo_title' => $meta->meta_value
                ]);
            }
            $meta->delete();
        }

        // Migrate Description Data.
        $metas = TagsMeta::where(['meta_key' => 'description'])->get();
        foreach ($metas as $meta) {
            $tag = Tag::find($meta->tag_id);
            // Update 'description' column.
            if ( $tag ) {
                $tag->update([
                    'description' => $meta->meta_value
                ]);
            }
            $meta->delete();
        }

        Schema::dropIfExists('tags_metas');
    }
}
