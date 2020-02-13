<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Client;
use App\Seller;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'expiration_date' => $faker->date(),
        'status' => $faker->randomElement(['New']),
        'amount' => $faker->numberBetween(50,999999999),
        'total' => $faker->numberBetween(50,999999999),
        'client_id' => factory(Client::class),
        'seller_id' => factory(Seller::class)
    ];
});
