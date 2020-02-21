<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'type_id'=> $faker->randomElement(['Card ID','Foreign ID', 'Passport', 'Other']),
        'personal_id' => $faker->numberBetween(10000000, 99999999),
        'name' => $faker->name(5),
        'last_name' => $faker->name(4),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone_number' => $faker->numberBetween(2222222,39999999999)
    ];
});
