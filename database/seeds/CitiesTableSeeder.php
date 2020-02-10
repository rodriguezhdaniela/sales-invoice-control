<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(City::class)->create([
            'city' => 'Medellin',
            'state_id' => 1,
        ]);

        factory(City::class)->create([
            'city' => 'Alejandria',
            'state_id' => 1,
        ]);

        factory(City::class)->create([
            'city' => 'Amaga',
            'state_id' => 1,
        ]);

        factory(City::class)->create([
            'city' => 'Arenal',
            'state_id' => 2,
        ]);

        factory(City::class)->create([
            'city' => 'Arjona',
            'state_id' => 2,
        ]);

        factory(City::class)->create([
            'city' => 'Manizales',
            'state_id' => 3,
        ]);

        factory(City::class)->create([
            'city' => 'Marmato',
            'state_id' => 3,
        ]);

        factory(City::class)->create([
            'city' => 'Calamar',
            'state_id' => 4,
        ]);

        factory(City::class)->create([
            'city' => 'Miraflores',
            'state_id' => 4,
        ]);

        factory(City::class)->create([
            'city' => 'Neiva',
            'state_id' => 5,
        ]);

        factory(City::class)->create([
            'city' => 'Acevedo',
            'state_id' => 5,
        ]);


    }
}
