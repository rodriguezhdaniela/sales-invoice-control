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
        ]);

        factory(State::class)->create([
            'state' => 'Bolivar',
        ]);

        factory(State::class)->create([
            'state' => 'Caldas',
        ]);

        factory(State::class)->create([
            'state' => 'Guaviare',
        ]);

        factory(State::class)->create([
            'state' => 'Huila',
        ]);

        factory(State::class)->create([
            'state' => 'Magdalena',
        ]);

        factory(State::class)->create([
            'state' => 'Meta',
        ]);

        factory(State::class)->create([
            'state' => 'Nariño',
        ]);

        factory(State::class)->create([
            'state' => 'Putumayo',
        ]);

        factory(State::class)->create([
            'state' => 'Quindio',
        ]);

        factory(State::class)->create([
            'state' => 'Risaralda',
        ]);

        factory(State::class)->create([
            'state' => 'San Andres',
        ]);

        factory(State::class)->create([
            'state' => 'Vaupes',
        ]);
    }
}
