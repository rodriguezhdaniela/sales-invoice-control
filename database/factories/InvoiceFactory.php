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
        'status' => $faker->randomElement(['New','Send', 'Receipt', 'Paid']),
        'amount' => $faker->numberBetween(50,9999999999),
        'total' => $faker->numberBetween(50,9999999999),
        'client_id' => factory(Client::class),
        'seller_id' => factory(Seller::class)
    ];
});
