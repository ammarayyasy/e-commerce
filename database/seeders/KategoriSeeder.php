<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'name' => 'Elektronik'
        ]);

        Kategori::create([
            'name' => 'Fashion'
        ]);

        Kategori::create([
            'name' => 'Furniture'
        ]);

        Kategori::create([
            'name' => 'Kuliner'
        ]);

        Kategori::create([
            'name' => 'Otomotif'
        ]);
    }
}
