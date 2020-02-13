<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Client;
use App\Country;
use App\State;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->randomElement(['Card ID','Foreign ID', 'Passport', 'Other']),
        'personal_id' => $faker->numberBetween(10000000, 99999999),
        'name' => $faker->name(5),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->name(4),
        'phone_number' => $faker->numberBetween(2222222,39999999999),
        'country_id' => factory(Country::class),
        'state_id' => factory(State::class),
        'city_id' => factory(City::class),
        'postal_code' => $faker->numberBetween(11111,99999),
    ];
});

