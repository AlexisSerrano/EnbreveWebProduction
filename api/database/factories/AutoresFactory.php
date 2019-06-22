<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Http\Models\Autor;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Autor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'primer_ap' => $faker->lastName,
        'segundo_ap' => $faker->lastName,
        'foto' => 'autores/default.png',
        'descripcion' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'facebook' => "https://www.facebook.com/$faker->userName",
        'instagram' => "https://www.instagram.com/$faker->userName",
        'twitter' => "https://twitter.com/$faker->userName"
    ];
});
