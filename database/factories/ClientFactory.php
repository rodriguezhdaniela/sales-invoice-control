<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->randomElement(['Card ID','Foreign ID', 'Passport', 'Other']),
        'personal_id' => $faker->numberBetween(10000000, 99999999),
        'name' => $faker->name(5),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone_number' => $faker->numberBetween(2222222,39999999999),
        'country_id' => $faker->numberBetween(1,1),
        'state_id' => $faker->numberBetween(1, 10),
        'city_id' => $faker->numberBetween(1, 10),
        'postal_code' => $faker->numberBetween(11111,99999),
    ];
});

