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
        ]);

        factory(City::class)->create([
            'city' => 'Alejandria',
        ]);

        factory(City::class)->create([
            'city' => 'Amaga',
        ]);

        factory(City::class)->create([
            'city' => 'Arenal',
        ]);

        factory(City::class)->create([
            'city' => 'Arjona',
        ]);

        factory(City::class)->create([
            'city' => 'Manizales',
        ]);

        factory(City::class)->create([
            'city' => 'Marmato',
        ]);

        factory(City::class)->create([
            'city' => 'Calamar',
        ]);

        factory(City::class)->create([
            'city' => 'Miraflores',
        ]);

        factory(City::class)->create([
            'city' => 'Neiva',
        ]);

        factory(City::class)->create([
            'city' => 'Acevedo',
        ]);


    }
}
