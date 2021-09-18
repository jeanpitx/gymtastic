<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Nacionalidad;
use Faker\Generator as Faker;

$factory->define(Nacionalidad::class, function (Faker $faker) {

    return [
        'nacionalidad' => $faker->word
    ];
});
