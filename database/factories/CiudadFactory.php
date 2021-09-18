<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ciudad;
use Faker\Generator as Faker;

$factory->define(Ciudad::class, function (Faker $faker) {

    return [
        'ciudad' => $faker->word
    ];
});
