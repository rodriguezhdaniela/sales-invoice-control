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
           'type_id' => 'Card ID',
           'personal_id' => '12345678',
           'email' => 'dani-rodriguez-95@hotmail.com',
           'password' => bcrypt('12345678'),
        ]);

        //Client
        User::create([
            'name' => 'Manuela Arboleda',
            'type_id' => 'Card ID',
            'personal_id' => '22222222',
            'email' => 'manu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        //Supervisor
        User::create([
            'name' => 'Ana Maria Berrio',
            'type_id' => 'Card ID',
            'personal_id' => '33333333',
            'email' => 'ana@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        //Seller
        User::create([
            'name' => 'Liliana Lopera',
            'type_id' => 'Card ID',
            'personal_id' => '44444444',
            'email' => 'lili@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        factory(User::class, 7)->create();
    }
}
