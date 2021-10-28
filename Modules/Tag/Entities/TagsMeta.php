<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;

class TagsMeta extends Model
{
    protected $guarded = ['id'];

    public function tag()
    {
        return $this->belongsTo('Modules\Tag\Entities\Tag');
    }

    static function getMetaData( $tag_id, $key ) {
        // Check if proper item is already exist.
        $meta = TagsMeta::where([
            'tag_id'  => $tag_id,
            'meta_key' => $key
        ])->first();

        if ( $meta ) {
            return $meta->meta_value;
        }

        return '';
    }

    static function insertMetaData( $tag_id, $key, $value ) {
        if (!empty($value)) {
            TagsMeta::create([
                'tag_id'    => $tag_id,
                'meta_key'   => $key,
                'meta_value' => $value
            ]);
        }
    }

    static function setMetaData( $tag_id, $key, $value ) {
        if (!empty($value)) {
            // Check if proper item is already exist.
            $meta = TagsMeta::where([
                'tag_id'  => $tag_id,
                'meta_key' => $key
            ])->first();

            if ( $meta ) {
                $meta->update( ['meta_value' => $value] );
            } else {
                TagsMeta::create([
                    'tag_id'    => $tag_id,
                    'meta_key'   => $key,
                    'meta_value' => $value
                ]);
            }
        }
    }

    static function deleteMetaData( $tag_id, $key ) {
        // Check if proper item is already exist.
        $meta = TagsMeta::where([
            'tag_id'  => $tag_id,
            'meta_key' => $key
        ])->first();

        if ( $meta ) {
            $meta->delete();
        }
    }

    static function deleteMultipleMetaData( $tag_ids, $key ) {
      TagsMeta::whereIn( 'tag_id', !is_array($tag_ids) ? [$tag_ids] : $tag_ids )->where('meta_key', $key)->delete();
    }

    static function emptyMetaData( $tag_id ) {
        // Check if proper item is already exist.
        $metas = TagsMeta::where( 'tag_id', $tag_id )->delete();
    }
}
