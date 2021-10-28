<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;

class TagCategory extends Model
{
    protected $guarded = ['id'];

    public static $DEFAULT = [
        'name' => 'Tags'
    ];

    /**
     * Get the tag from tag cateogry
     *
     * @return void
     */
    public function tag()
    {
        return $this->hasOne('Modules\Tag\Entities\Tag');
    }
}
