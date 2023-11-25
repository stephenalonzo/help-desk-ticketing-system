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

        $admin_permissions = [
            [
                'name' => 'assign agents'
            ],
            [
                'name' => 'create tickets'
            ],
            [
                'name' => 'close tickets'
            ]
        ];

        foreach ($admin_permissions as $admin_permission)
        {

            $permission = Permission::create($admin_permission);

            $admin->givePermissionTo($permission);
            $agent->givePermissionTo($permission['close tickets']);

        }

    }
}
