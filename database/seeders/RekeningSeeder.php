<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rekening::create([
            'id_pelanggan' => 2,
            'no_rekening' => '310803001',
            'saldo' => 1000000,
            'pin' => '310803'
        ]);
        Rekening::create([
            'id_pelanggan' => 3,
            'no_rekening' => '310803002',
            'saldo' => 1500000,
            'pin' => '123456'
        ]);
    }
}
