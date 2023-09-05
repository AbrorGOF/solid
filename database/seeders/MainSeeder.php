<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::query()->firstOrCreate(
            [
                'email' => 'admin@example.com',
                'phone' => '998995181521',
            ],
            [
                'name' => 'Admin',
                'password' => bcrypt('new_admin')
            ]
        );
    }
}
