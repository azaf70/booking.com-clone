<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = Role::all();

        $permissions = [
            'manage-properties' => Role::ROLE_OWNER,
            'manage-bookings' => Role::ROLE_USER,
        ];

        foreach ($permissions as $permission => $roles) {
            $permission = Permission::create(['name' => $permission]);
            foreach ($permissions as $key => $roles) {
                $permission = Permission::create(['name' => $key]);
                foreach ($allRoles as $role) {
                    $role->permissions()->attach($permission->id);
                }
            }

        }
    }
}
