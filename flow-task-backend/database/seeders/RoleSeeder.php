<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Owner',
                'slug' => 'owner',
                'description' => 'The possibility to access everything in workspace',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'The possibility to access limited things in workspace',
            ],
            [
                'name' => 'Member',
                'slug' => 'member',
                'description' => 'The possibility to access member related things in workspace',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}
