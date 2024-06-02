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
            'name' => 'Admin Cantik',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 1,
        ]);
        Pelanggan::create([
            'name' => 'User Cantik',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => Hash::make('123456'),
            'role' => 2,
        ]);
        Pelanggan::create([
            'name' => 'Regina Valda',
            'email' => 'regina@gmail.com',
            'username' => 'regina',
            'password' => Hash::make('123456'),
            'role' => 2,
        ]);
    }
}
