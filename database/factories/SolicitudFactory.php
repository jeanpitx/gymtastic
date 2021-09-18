<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solicitud;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {

    return [
        'nombre_tarjeta' => $faker->word,
        'tipo_tarjeta' => $faker->word,
        'estado_cuenta' => $faker->word,
        'f_mecanizado' => $faker->word,
        'f_historial_laboral' => $faker->word,
        'f_certificado_laboral' => $faker->word,
        'f_rol_pago' => $faker->word,
        'id_persona' => $faker->randomDigitNotNull
    ];
});
