<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PersonaSolicitante;
use Faker\Generator as Faker;

$factory->define(PersonaSolicitante::class, function (Faker $faker) {

    return [
        'id_persona' => $faker->randomDigitNotNull,
        'profesion' => $faker->word,
        'id_actividad' => $faker->randomDigitNotNull,
        'id_conyugue' => $faker->randomDigitNotNull,
        'id_direccion' => $faker->randomDigitNotNull
    ];
});
