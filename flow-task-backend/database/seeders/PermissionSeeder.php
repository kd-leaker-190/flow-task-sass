<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'View Members',
                'slug' => 'members.view',
                'description' => 'The possibility to view members table.',
            ],
            [
                'name' => 'Create member',
                'slug' => 'members.create',
                'description' => 'The possibility to create member.',
            ],
            [
                'name' => 'Edit member',
                'slug' => 'members.update',
                'description' => 'The possibility to update member.',
            ],
            [
                'name' => 'Delete member',
                'slug' => 'members.delete',
                'description' => 'The possibility to delete member.',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }
    }
}
