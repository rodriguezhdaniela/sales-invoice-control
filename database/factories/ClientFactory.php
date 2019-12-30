<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->randomElement(['Card ID','Foreign ID', 'Passport', 'Other']),
<<<<<<< HEAD
        'personal_id' => $faker->numberBetween(10000000, 99999999),
=======
        'personal_id' => $faker->unique()->Number_ID, $faker-> numberBetween(10000000, 9999999999),
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
        'name' => $faker->name(5),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone_number' => $faker->numberBetween(2222222,39999999999)

    ];

});

