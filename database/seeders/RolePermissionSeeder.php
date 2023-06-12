<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-admin']);
        Permission::create(['name' => 'view-customer']);

        $adminRole = Role::create(['name' => 'Admin']);
        $customerRole = Role::create(['name' => 'Customer']);

        $adminRole->givePermissionTo(['view-admin']);
        $customerRole->givePermissionTo(['view-customer']);
    }
}
