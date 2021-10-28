<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Users\Entities\User;

class ChangeUsersTableStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default("active");
        });

        // Move data.
        $users = User::all();
        foreach ($users as $user) {
            $status = 'active';
            if ( $user->is_trashed ) {
                $status = 'deleted';
            } else if ( $user->permission == '0' ) {
                $status = 'suspended';
            }

            $permission = $user->permission;
            if ($permission == '0') {
                $permission = $user->previous_permission;
            }
            $user->update([
                'permission' => $permission,
                'status'     => $status
            ]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_trashed');
            $table->dropColumn('previous_permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('previous_permission')->after('username')->nullable();
            $table->integer('is_trashed')->default(0);
        });

        // Move Data.
        $users = User::all();
        foreach ($users as $user) {
            switch( $user->status ) {
                case 'active':
                    $previous_permission = 0;
                    $permission = $user->permission;
                    $is_trashed = 0;
                    break;
                case 'suspended':
                    $previous_permission = $user->permission;
                    $permission = 0;
                    $is_trashed = 0;
                    break;
                case 'deleted':
                    $previous_permission = 0;
                    $permission = $user->permission;
                    $is_trashed = 1;
                    break;
                default:
                    $previous_permission = 0;
                    $permission = $user->permission;
                    $is_trashed = 0;
            }

            $user->update([
                'previous_permission' => $previous_permission,
                'permission'          => $permission,
                'is_trashed'          => $is_trashed,
                'status'              => $user->status
            ]);        
        }
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
