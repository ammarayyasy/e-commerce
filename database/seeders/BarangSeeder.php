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
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '2',
            'name' => 'Jaket Anti Badai',
            'harga' => '300000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '3',
            'name' => 'Lemari',
            'harga' => '350000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '4',
            'name' => 'Basreng 1Kg',
            'harga' => '35000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '5',
            'name' => 'Burok',
            'harga' => '5000000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '1',
            'name' => 'Poco F3',
            'harga' => '3000000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
        Barang::create([
            'id_kategori' => '2',
            'name' => 'Celana Anti Badai',
            'harga' => '300000',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum necessitatibus, ratione recusandae cum quisquam dicta aperiam natus at nobis ullam rem ipsa doloremque sunt totam dolor laboriosam, possimus vero. Dolorum, maiores voluptatem aliquam laudantium repudiandae maxime fugiat ullam quia assumenda illo voluptate eos tempore atque quos esse odio animi earum molestias voluptates saepe deserunt aperiam. Laborum reiciendis harum architecto nulla veritatis repellendus nobis eveniet quidem eius! Ipsa rerum nobis sequi? Animi maiores ex maxime ipsum quae architecto impedit, consequatur voluptas est officiis laborum iste laboriosam modi voluptatum ducimus vero. Aspernatur ducimus harum ipsa a reprehenderit architecto tempora nesciunt pariatur facilis.',
            'stok' => '12',
        ]);
    }
}
