<?php

namespace Modules\Tag\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

use Modules\Tag\Entities\TagCategory;

class TagCategoriesTableSeeder extends Seeder
{
    private $table = 'tag_categories';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $records = [
            TagCategory::$DEFAULT
        ];

        foreach ($records as $record) {
            $record['name']       = $record['name'];
            $record['created_at'] = now();
            $record['updated_at'] = $record['created_at'];

			DB::table($this->table)->insert($record);
        }

    }
}
