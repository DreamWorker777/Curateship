<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostsMeta extends Model
{
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo('Modules\Post\Entities\Post');
    }

    static function getMetaData( $post_id, $key ) {
        // Check if proper item is already exist.
        $meta = PostsMeta::where([
            'post_id'  => $post_id,
            'meta_key' => $key
        ])->first();

        if ( $meta ) {
            return $meta->meta_value;
        }

        return '';
    }

    static function insertMetaData( $post_id, $key, $value ) {
        if (!empty($value)) {
            PostsMeta::create([
                'post_id'    => $post_id,
                'meta_key'   => $key,
                'meta_value' => $value
            ]);
        }
    }

    static function setMetaData( $post_id, $key, $value ) {
        if (!empty($value)) {
            // Check if proper item is already exist.
            $meta = PostsMeta::where([
                'post_id'  => $post_id,
                'meta_key' => $key
            ])->first();

            if ( $meta ) {
                $meta->update( ['meta_value' => $value] );
            } else {
                PostsMeta::create([
                    'post_id'    => $post_id,
                    'meta_key'   => $key,
                    'meta_value' => $value
                ]);
            }
        }
    }

    static function deleteMetaData( $post_id, $key ) {
        // Check if proper item is already exist.
        $meta = PostsMeta::where([
            'post_id'  => $post_id,
            'meta_key' => $key
        ])->first();

        if ( $meta ) {
            $meta->delete();
        }
    }

    static function deleteMultipleMetaData( $post_ids, $key ) {
        PostsMeta::whereIn( 'post_id', !is_array($post_ids) ? [$post_ids] : $post_ids )->where('meta_key', $key)->delete();
    }

    static function emptyMetaData( $post_id ) {
        // Check if proper item is already exist.
        $metas = PostsMeta::where( 'post_id', $post_id )->delete();
    }
}
