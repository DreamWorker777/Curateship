<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Schema, File, URL};

use Modules\Admin\Providers\AdminServiceProvider;

class ScraperStat extends Model
{
  protected $guarded = ['id'];
}
