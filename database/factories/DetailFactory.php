<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'invoice_id' => factory(Invoice::class),
        'product_id' => factory(Product::class),
        'quantity' => $faker->numberBetween(1, 5),
    ];
});
