<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/sociales', function () {
    $seccion = 'sociales';
    return view('sociales',compact('seccion'));
});

Route::get('/cultura', function () {
    $seccion = 'cultura';
    return view('cultura',compact('seccion'));
});

Route::get('/articulos', function () {
    $seccion = 'articulos';
    return view('articulos',compact('seccion'));
});

Route::get('/busqueda/{busqueda}', function ($busqueda) {
    return view('busqueda',compact('busqueda'));
});

Route::get('/noticia/{titulo}','SitioController@getNoticia');

Route::get('/articulo/{titulo}','SitioController@getArticulo');