<?php

use App\State;
use Illuminate\Database\Seeder;


class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(State::class)->create([
            'state' => 'Antioquia',
            'country_id' => 1
        ]);



        factory(State::class)->create([
            'state' => 'Bolivar',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Caldas',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Guaviare',
            'country_id' => 1
        ]);


        factory(State::class)->create([
            'state' => 'Huila',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Magdalena',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Meta',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Nariño',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Putumayo',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Quindio',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Risaralda',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'San Andres',
            'country_id' => 1
        ]);

        factory(State::class)->create([
            'state' => 'Vaupes',
            'country_id' => 1
        ]);
    }
}
