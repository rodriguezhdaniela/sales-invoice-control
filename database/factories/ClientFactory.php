<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->numberBetween(1,3),
        'personal_id' => $faker->numberBetween(10000000, 99999999),
        'name' => $faker->name(5),
        'e_mail' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone_number' => $faker->numberBetween(2222222,39999999999)

    ];

});
