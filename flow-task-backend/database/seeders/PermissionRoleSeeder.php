<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'owner' => [
                'members.view',
                'members.create',
                'members.update',
                'members.delete',
            ],

            'admin' => [
                'members.view',
                'members.create',
                'members.update',
            ],

            'member' => [
                'members.view',
            ],
        ];

        foreach ($roles as $roleSlug => $permissionSlugs) {
            $role = Role::where('slug', $roleSlug)->firstOrFail();

            $permissionIds = Permission::whereIn('slug', $permissionSlugs)
                ->pluck('id');

            $role->permissions()->sync($permissionIds);
        }
    }
}
