<?php

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
<<<<<<< HEAD
        $this->call([
            ClientTableSeeder::class,
            ProductTableSeeder::class,
            SellerTableSeeder::class,
        ]);
=======
        $this->call(ClientTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SellerTableSeeder::class);
>>>>>>> b6fa7fb69a2bbef41e3f0ad39954ae924893b0a2
    }
}
