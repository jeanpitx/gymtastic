<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Postulacion;
use Faker\Generator as Faker;

$factory->define(Postulacion::class, function (Faker $faker) {

    return [
        'id_persona' => $faker->randomDigitNotNull,
        'correo_electronico' => $faker->word,
        'telefono' => $faker->word,
        'direccion' => $faker->word,
        'expectativas' => $faker->word,
        'f_curriculum' => $faker->word,
        'id_ciudad' => $faker->randomDigitNotNull
    ];
});
