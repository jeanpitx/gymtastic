<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actividad;
use Faker\Generator as Faker;

$factory->define(Actividad::class, function (Faker $faker) {

    return [
        'actividad_emp' => $faker->word
    ];
});
