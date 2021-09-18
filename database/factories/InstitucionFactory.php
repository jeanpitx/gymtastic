<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\institucion;
use Faker\Generator as Faker;

$factory->define(institucion::class, function (Faker $faker) {

    return [
        'institucion_financiera' => $faker->word
    ];
});
