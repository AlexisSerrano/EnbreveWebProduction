<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Http\Models\Articulo;
use App\Model;
use Faker\Generator as Faker;

$factory->defineAs(Articulo::class,'1',function (Faker $faker) {
    return [
        'titulo' => $faker->text($maxNbChars = 50),
        'resumen' => $faker->text($maxNbChars = 100),
        'contenido' => $faker->text($maxNbChars = 2000),
        'imagen' => 'recursos/articulosDefault.png',
        'autor' => "1"
    ];
});
$factory->defineAs(Articulo::class,'2',function (Faker $faker) {
    return [
        'titulo' => $faker->text($maxNbChars = 50),
        'resumen' => $faker->text($maxNbChars = 100),
        'contenido' => $faker->text($maxNbChars = 2000),
        'imagen' => 'recursos/articulosDefault.png',
        'autor' => "2"
    ];
});
$factory->defineAs(Articulo::class,'3',function (Faker $faker) {
    return [
        'titulo' => $faker->text($maxNbChars = 50),
        'resumen' => $faker->text($maxNbChars = 100),
        'contenido' => $faker->text($maxNbChars = 2000),
        'imagen' => 'recursos/articulosDefault.png',
        'autor' => "3"
    ];
});
