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

        User::create([
            'first_name' => 'Admin',
            'other_name' => '',
            'last_name' => 'User',
            'email' => 'admin@project.com',
            'password' => 'password',
            'active' => '1',
        ]);
    }
}
