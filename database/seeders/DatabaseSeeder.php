<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user (ID 1)
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@jewellery.local',
            'password' => Hash::make('admin12345'),
            'email_verified_at' => now(),
        ]);

        // Call AdminSeeder to populate initial data
        $this->call(AdminSeeder::class);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
