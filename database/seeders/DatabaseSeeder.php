<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Makanan'
        ]);

        Category::create([
            'name' => 'Minuman'
        ]);

        Category::create([
            'name' => 'Pakaian'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Biskuat',
            'harga' => '500',
            'desc' => 'Biskuit dengan rasa cruncy dan membuat kita sekuat macan',
            'image' => 'barang-image/biskuat.svg'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Pop Mie',
            'harga' => '6000',
            'desc' => 'Makanan pengganjal perut sampai usus buntu',
            'image' => 'barang-image/popmie1.svg'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Teh Pucuk',
            'harga' => '4000',
            'desc' => 'Minuman teh menyegarkan sampai ke jiwa raga',
            'image' => 'barang-image/pucuk.svg'
        ]);

        Admin::create([
            'username' => 'nazal',
            'email' => 'nazal@gmail.com',
            'no_hp' => '089516439498',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Nazal Gusti Prastya',
            'email' => 'nazalprastya@gmail.com',
            'kelas' => '11',
            'jurusan' => 'Pengembangan Perangkat Lunak dan Gim',
            'no_telp' => '089516439498',
            'alamat' => 'Ciomas',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Nazal Gusti Prastya',
            'email' => 'zulfan@gmail.com',
            'kelas' => '11',
            'jurusan' => 'Pengembangan Perangkat Lunak dan Gim',
            'no_telp' => '089516439498',
            'alamat' => 'Ciomas',
            'password' => bcrypt('password')
        ]);
    }
}
