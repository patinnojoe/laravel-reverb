<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Freedy',
            'email' => 'freedy@example.com',
            'password' => '1234567890'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Eddy',
            'email' => 'eddy@example.com',
            'password' => '1234567890'
        ]);
    }
}
