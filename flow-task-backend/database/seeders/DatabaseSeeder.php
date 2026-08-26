<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Show::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Show',
            'email' => 'test@example.com',
        ]);
    }
}
