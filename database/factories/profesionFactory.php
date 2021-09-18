<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profesion;
use Faker\Generator as Faker;

$factory->define(Profesion::class, function (Faker $faker) {

    return [
        'profesion' => $faker->word
    ];
});
