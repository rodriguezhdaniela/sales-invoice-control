<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\invoice;
use App\Client;
use App\seller;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [

        'expiration_date' => $faker->now()->addDays(30)->toDateString(),
        'status' => $faker->randomElement(['New','Send', 'Receipt', 'Paid']),
        'client_id' => factory(Client::class),
        'seller_id' => factory(Seller::class),
        'tax' => $faker->randomNumber(4,6),
        'subtotal' => $faker->randomNumber(4,6),
        'total' => $faker->randomNumber(4,6),
    ];
});
