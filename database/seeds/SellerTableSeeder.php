<?php

use Illuminate\Database\Seeder;
use App\Seller;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seller
        Seller::create([
            'name' => 'Liliana',
            'last_name' => 'Lopera',
            'type_id' => 'Card ID',
            'personal_id' => '44444444',
            'email' => 'lili@hotmail.com',
            'address' => 'cr 45 n47 18',
            'phone_number' => '3653652'
        ]);

        factory(Seller::class, 20)->create();
    }
}
