<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\invoice;
use App\Client;
use App\seller;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'expedition_date' => $faker->dateTime,
        'invoice_date' => $faker->date(),
        'expiration_date' => $faker->date(),
<<<<<<< HEAD
        'status' => $faker->randomElement(['New','Send', 'Receipt', 'Paid']),
=======
        'state' => $faker->randomElement(['New','Send', 'Receipt', 'Paid']),
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
        'amount' => $faker->numberBetween(50,9999999999),
        'total' => $faker->numberBetween(50,9999999999),

        'client_id' => factory(Client::class),
        'seller_id' => factory(Seller::class)

    ];
});
