<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $awonerRole = Role::create(['name' => 'Awner']);
        $operatorRole = Role::create(['name' => 'Operatuer']);

        // Define permissions
        $permission = Permission::firstOrCreate(['name' => 'add menu']);
        $permission = Permission::firstOrCreate(['name' => 'delet menu']);
        $permission = Permission::firstOrCreate(['name' => 'update menu']);

    }
}
