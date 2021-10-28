<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostsTag extends Model
{
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo('Modules\Post\Entities\Post');
    }

}
