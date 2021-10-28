<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostSettingSeederTableSeeder extends Seeder
{

    public function run()
    {
        \DB::table('posts_settings')->insert([
            'medium_width' => 600,
            'medium_height' => 400,
            'image_setting' => 'maintain',
            'list_per_page' => 25,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
