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
        \App\Models\User::factory()->create([
            'name' => 'Management Mobil',
            'email' => 'management@gmail.com',
            'password' => bcrypt('management'),
            'address' => 'Jl. Jendral Sudirman No. 1',
            'phone_number' => '081234567890',
            'SIM_number' => '1234567890',
            'is_admin' => true,
        ]);
    }
}
