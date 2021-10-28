<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Users\Entities\Role;
use Modules\Users\Entities\User;
use \Hash;
use \DB;

class UsersSeeder extends Seeder
{
    private $table = 'users';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // get Admin permission
        $adminPermission = Role::where('key', 'admin')->first()->permission;

        // get Editor permission
        $editorPermission = Role::where('key', 'editor')->first()->permission;

        // get Registered User permission
        $registeredPermission = Role::where('key', 'registered')->first()->permission;

        $dateNow = now();

        $records = [
            [
                'name'       => 'George Miller',
                'username'   => 'administrator',
                'email'      => 'admin@mailinator.com',
                'password'   => Hash::make('helloworld'),
                'permission' => $adminPermission,
                'email_verified_at' => $dateNow,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name'       => 'Taylor Swift',
                'username'   => 'editor89',
                'email'      => 'swifties@mailinator.com',
                'password'   => Hash::make('helloworld'),
                'permission' => $editorPermission,
                'email_verified_at' => $dateNow,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name'       => 'Isaiah Faber',
                'username'   => 'Powfu',
                'email'      => 'powfu@mailinator.com',
                'password'   => Hash::make('helloworld'),
                'permission' => $registeredPermission,
                'email_verified_at' => $dateNow,
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
        ];

		foreach ($records as $record) {

            $update = ['email' => $record['email']];
            User::updateOrCreate($update, $record);
            // DB::table($this->table)->insert($record);
		}
    }
}
