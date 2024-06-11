<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['manager', 'employee', 'director', 'client'];
        $permissions = ['view_users', 'edit_users', 'delete_users', 'create_users'];

        foreach ($roles as $role) {
            Role::query()->create(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::query()->create(['name' => $permission]);
        }

        // Assign permissions to roles
        $rolePermissions = [
            'manager' => ['view_users', 'edit_users', 'create_users'],
            'employee' => ['view_users'],
            'director' => ['view_users', 'edit_users', 'delete_users', 'create_users'],
            'client' => ['view_users'],
        ];
    }
}
