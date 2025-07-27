<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'owner',
            'email' => 'info@example.com',
            'password' => '$2y$12$E5umXJ6S5hki9cC.CgJHQOfO7C6g9B88ehmGHe0QyPeRMmgMj6LvC',// PW：testtest
        ]);
    }
}
