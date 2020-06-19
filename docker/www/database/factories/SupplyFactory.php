<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supply;
use Faker\Generator as Faker;

$factory->define(Supply::class, function (Faker $faker) {
    return [
        'Status' => 1,
        'SupplyName' => $faker->company,
        'SupplyItemID' => random_int(1000, 9999),
        'SupplyNumber' => (string)random_int(1000, 9999),
    ];
});
