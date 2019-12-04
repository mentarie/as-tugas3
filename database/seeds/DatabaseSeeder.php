<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;
use App\Kategori;
use App\Produk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Pelanggan::class, 100)->create();
        factory(Kategori::class, 5)->create();
        factory(Produk::class, 50)->create();
    }
}
