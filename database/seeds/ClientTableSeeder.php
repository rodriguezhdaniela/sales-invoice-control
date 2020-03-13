<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Client
        Client::create([
            'name' => 'Manuela',
            'last_name' => 'Arboleda',
            'type_id' => 'Card ID',
            'personal_id' => '22222222',
            'email' => 'manu@gmail.com',
            'address' => 'cr 36 n47 18',
            'phone_number' => '3654452',
            'country_id' => '1',
            'state_id' => '1',
            'city_id' => '1',
            'postal_code' => '456231'
        ]);

        factory(Client::class,20)->create();
    }
}
