<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {

    $name = $faker -> unique(true) -> numberBetween(1, 20);
    
    return [
        'name' => 'Car' . $name,
        'model' => $faker -> word,
        'kw' => $faker -> numberBetween(500, 2000)
    ];
});
