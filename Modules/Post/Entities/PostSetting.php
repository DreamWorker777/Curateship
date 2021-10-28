<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostSetting extends Model
{
	protected $table = 'posts_settings';

    protected $guarded = ['id'];
}
