<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleManagement extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // making super-admin


        //super admin
        $super = Role::create(['guard_name' => 'web', 'name' => 'super-admin']);
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'allAccess']);

        $permission->assignRole($super);

        //admin
        $role = Role::create(['guard_name' => 'web', 'name' => 'admin']);
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'access']);

        $permission->assignRole($role);

        User::find('1')->assignRole($super);
    }
}
