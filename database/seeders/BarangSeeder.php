<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'id_kategori' => '1',
            'name' => 'Acer Nitro V15',
            'harga' => '11000000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '2',
            'name' => 'Jaket Anti Badai',
            'harga' => '300000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '3',
            'name' => 'Lemari',
            'harga' => '350000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '4',
            'name' => 'Basreng 1Kg',
            'harga' => '35000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '5',
            'name' => 'Burok',
            'harga' => '5000000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '1',
            'name' => 'Poco F3',
            'harga' => '3000000',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '2',
            'name' => 'Celana Anti Badai',
            'harga' => '300000',
            'stok' => '12',
        ]);
    }
}
