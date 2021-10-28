<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Users\Entities\Permission;
use Modules\Users\Entities\Role;
use \DB;

class RolesSeeder extends Seeder
{
    private $table   = 'roles';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
      $this->insertRecords();
    }

    public function insertRecords()
    {
      $records = [
        [
          'name'       => 'Admin',
          'key'        => 'admin',
          'permission' => $this->getAdminPermission()
        ],
        [
          'name'       => 'Editor',
          'key'        => 'editor',
          'permission' => $this->getEditorPermission()
        ],
        [
          'name'       => 'Registered',
          'key'        => 'registered',
          'permission' => $this->getRegisteredPermission()
        ],
      ];

      foreach ($records as $record) {
        $record['created_at'] = now();
        $record['updated_at'] = $record['created_at'];

        $update = ['key' => $record['key']];
        Role::updateOrCreate($update, $record);

        // DB::table($this->table)->insert($record);
      }

      // remove previous "Subscriber" Role
      $subscriber = Role::where('key', 'subscriber');
      if ($subscriber)
        $subscriber->delete();
    }

    public function getAdminPermission()
    {
      // Summation of all permissions
      return Permission::sum('permission');
    }

    public function getEditorPermission()
    {
      $allowedLogIn = Permission::where('key', 'allowed_log_in')->first()->permission;
      $writePost    = Permission::where('key', 'write_post')->first()->permission;
      $readPost     = Permission::where('key', 'read_post')->first()->permission;
      $editPost     = Permission::where('key', 'edit_post')->first()->permission;
      $deletePost   = Permission::where('key', 'delete_post')->first()->permission;

      $permission = $allowedLogIn | $writePost | $readPost | $editPost | $deletePost;

      return $permission;
    }

    public function getRegisteredPermission()
    {
      return Permission::where('key', 'allowed_log_in')->first()->permission;
    }
}
