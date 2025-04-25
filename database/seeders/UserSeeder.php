<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Admin
        User::create([
            'name' => 'Admin IDN',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Siswa
        User::create([
            'name' => 'Siswa IDN',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
    }
}
