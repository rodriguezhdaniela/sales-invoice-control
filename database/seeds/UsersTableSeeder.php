<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
       User::create([
           'name' => 'Daniela Rodriguez',
           'email' => 'dani-rodriguez-95@hotmail.com',
           'password' => bcrypt('12345678'),
        ]);

        //Client
        User::create([
            'name' => 'Manuela Arboleda',
            'email' => 'manu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        //Supervisor
        User::create([
            'name' => 'Ana Maria Berrio',
            'email' => 'ana@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        //Seller
        User::create([
            'name' => 'Liliana Lopera',
            'email' => 'lili@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        factory(User::class, 7)->create();
    }
}
