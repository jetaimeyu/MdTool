<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MainFactory;
use Faker\Generator as Faker;

$factory->define(MainFactory::class, function (Faker $faker) {
    return [
        'Name'=>$faker->company,
        'CompID' => random_int(1000,9999),
        'Status'=>1
    ];
});
