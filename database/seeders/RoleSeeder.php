<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'admin']);
        $agent = Role::create(['name' => 'agent']);
        Role::create(['name' => 'user']);

        $admin_permission = Permission::create(['name' => 'assign agents']);
        $admin->givePermissionTo($admin_permission);

        $agent_permission = Permission::create(['name' => 'close tickets']);
        $agent->givePermissionTo($agent_permission);

    }
}
