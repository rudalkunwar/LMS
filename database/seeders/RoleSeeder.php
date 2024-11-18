<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
    Permission::create(['name' => 'create course']);
    Permission::create(['name' => 'view course']);
    Permission::create(['name' => 'assign grade']);

    // Create roles and assign permissions
    $admin = Role::create(['name' => 'admin']);
    $admin->givePermissionTo('create course', 'view course', 'assign grade');

    $instructor = Role::create(['name' => 'instructor']);
    $instructor->givePermissionTo('create course', 'view course');

    $student = Role::create(['name' => 'student']);
    $student->givePermissionTo('view course');
    }
}
