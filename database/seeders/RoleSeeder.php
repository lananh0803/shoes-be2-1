<?php

namespace Database\Seeders;

use App\Enums\RoleEnums;
use Illuminate\Database\Seeder;
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
        Role::create(['name' => RoleEnums::Admin]);
        Role::create(['name' => RoleEnums::Customer]);
    }
}