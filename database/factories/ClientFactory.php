<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->randomElement(['Card ID','Foreign ID', 'Passport', 'Other']),
        'personal_id' => $faker->unique()->Number_ID, $faker-> numberBetween(10000000, 9999999999),
        'name' => $faker->name(5),
        'e_mail' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone_number' => $faker->numberBetween(2222222,39999999999)

    ];

});

