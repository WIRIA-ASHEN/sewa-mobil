<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan 5 pengguna dengan role 'admin' dan 'user'
        User::create([
            'nama' => 'Admin User',
            'alamat' => 'Jl. Admin No. 1',
            'nomor_telepon' => '081234567890',
            'nomor_sim' => 'SIM1234567890123',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Customer User 1',
            'alamat' => 'Jl. Customer No. 1',
            'nomor_telepon' => '081234567891',
            'nomor_sim' => 'SIM2345678901234',
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'nama' => 'Customer User 2',
            'alamat' => 'Jl. Customer No. 2',
            'nomor_telepon' => '081234567892',
            'nomor_sim' => 'SIM3456789012345',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'nama' => 'Customer User 3',
            'alamat' => 'Jl. Customer No. 3',
            'nomor_telepon' => '081234567893',
            'nomor_sim' => 'SIM4567890123456',
            'email' => 'user3@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'nama' => 'Customer User 4',
            'alamat' => 'Jl. Customer No. 4',
            'nomor_telepon' => '081234567894',
            'nomor_sim' => 'SIM5678901234567',
            'email' => 'user4@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
