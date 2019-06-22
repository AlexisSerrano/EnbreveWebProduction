<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Http\Models\Noticia;
use App\Model;
use Faker\Generator as Faker;

$factory->defineAs(Noticia::class, '1',function (Faker $faker) {
    return [
        'titulo' => $faker->text($maxNbChars = 50),
        'resumen' => $faker->text($maxNbChars = 100),
        'contenido' => $faker->text($maxNbChars = 2000),
        'imagen' => 'recursos/noticiasDefault.png',
        // 'imagen' => $faker->imageUrl($width = 1920, $height = 1080),
        'usuario' => '1',
        'seccion' => "1"
    ];
});
$factory->defineAs(Noticia::class, '2',function (Faker $faker) {
    return [
        'titulo' => $faker->text($maxNbChars = 50),
        'resumen' => $faker->text($maxNbChars = 100),
        'contenido' => $faker->text($maxNbChars = 2000),
        'imagen' => 'recursos/noticiasDefault.png',
        // 'imagen' => $faker->imageUrl($width = 1920, $height = 1080),
        'usuario' => '1',
        'seccion' => "2"
    ];
});
