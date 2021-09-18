<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Catalogo;
use Faker\Generator as Faker;

$factory->define(Catalogo::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'id_tipo_catalogo' => $faker->randomDigitNotNull
    ];
});
