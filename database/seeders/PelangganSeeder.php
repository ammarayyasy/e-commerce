<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'name' => 'Admin Ganteng',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 1,
        ]);
        Pelanggan::create([
            'name' => 'User Ganteng',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => Hash::make('123456'),
            'role' => 2,
        ]);
        Pelanggan::create([
            'name' => 'Ammar Ayyasy',
            'email' => 'ammarmojur@gmail.com',
            'username' => 'ammarayyasy',
            'password' => Hash::make('123456'),
            'role' => 2,
        ]);
    }
}