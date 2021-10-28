<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Users\Entities\Permission;
use \DB;

class PermissionsSeeder extends Seeder
{
    private $table   = 'permissions';
    private $records = [];

    // Initial permission row counter
   private $permissionRowCounter = 0;

    private $lowPermissions = [
      'Allowed log in'
    ];

    private $mediumPermissions = [
      'Write post',
      'Read post',
      'Edit post',
      'Delete post',
    ];

    private $highPermissions = [
      'Write user',
      'Read user',
      'Edit user',
      'Delete user',
      'Change permissions',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->loopThroughLowPermissions();
        $this->loopThroughMediumPermissions();
        $this->loopThroughHighPermissions();

        $this->insertRecords();
    }

    public function insertRecords()
   {
      foreach ($this->records as $record) {
         $record['created_at'] = now();
         $record['updated_at'] = $record['created_at'];

         // DB::table($this->table)->insert($record);
         $update = ['key' => $record['key']];
         Permission::updateOrCreate($update, $record);
      }
   }

   public function loopThroughLowPermissions()
   {
      foreach ($this->lowPermissions as $name) {
         $this->pushPermission(
            $name,
            pow(2, $this->permissionRowCounter)
         );
      }
   }

   public function loopThroughMediumPermissions()
   {
      foreach ($this->mediumPermissions as $name) {
         $this->pushPermission(
            $name,
            pow(2, $this->permissionRowCounter)
         );
      }
   }

   public function loopThroughHighPermissions()
   {
      foreach ($this->highPermissions as $name) {
         $this->pushPermission(
            $name,
            pow(2, $this->permissionRowCounter)
         );
      }
   }

   public function pushPermission($name = null, $permission = null)
   {
      // Require name and permission
      if ($name === null || $permission === null) {
         return;
      }

      $key = strtolower($name);

      $key = str_replace('-', '', $key);
      $key = str_replace(' ', '_', $key);
      $key = str_replace('__', '_', $key);

      array_push(
         $this->records,
         [
           'key'        => $key,
           'name'       => $name,
           'permission' => $permission,
         ]
      );

      $this->permissionRowCounter++;
   }
}
