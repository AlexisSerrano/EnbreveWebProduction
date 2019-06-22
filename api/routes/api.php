<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Routes for resource usuario
 */
Route::get('usuario', 'UsuariosController@all');
Route::post('usuario', 'UsuariosController@add');
Route::post('create', 'UsuariosController@create');

/**
 * Routes for resource login
 */
Route::post('logout', 'LoginController@logout');
Route::post('login', 'LoginController@login');

/**
 * Routes for resource seccion
 */
Route::get('seccion', 'SeccionesController@all');
Route::get('seccion/{id}', 'SeccionesController@get');
Route::post('seccion', 'SeccionesController@add');
Route::delete('seccion/{id}', 'SeccionesController@remove');

/**
 * Routes for resource noticia
 */
Route::post('getNoticias', 'NoticiasController@all');
Route::get('noticia/{id}', 'NoticiasController@get');
Route::post('noticia', 'NoticiasController@add');
Route::delete('noticia/{id}', 'NoticiasController@remove');
Route::post('uploadGaleriaNoticia','NoticiasController@uploadGaleria');
Route::get('getImg/{id}','NoticiasController@getImg');

/**
 * Routes for resource autor
 */
Route::get('autor', 'AutorController@all');
Route::get('autor/{id}', 'AutorController@get');
Route::post('autor', 'AutorController@add');
Route::delete('autor/{id}', 'AutorController@remove');
Route::post('getAutores', 'AutorController@getAutores');

/**
 * Routes for resource articulo
 */
Route::get('articulo', 'ArticulosController@all');
Route::get('articulo/{id}', 'ArticulosController@get');
Route::post('articulo', 'ArticulosController@add');
Route::delete('articulo/{id}', 'ArticulosController@remove');

/**
 * Routes for resource banner
 */
Route::get('banner', 'BannersController@all');
Route::get('banner/{id}', 'BannersController@get');
Route::post('banner', 'BannersController@add');
Route::delete('banner/{id}', 'BannersController@remove');

/**
 * Routes for resource cartel
 */
Route::get('cartel', 'CartelesController@all');
Route::get('cartel/{id}', 'CartelesController@get');
Route::post('cartel', 'CartelesController@add');
Route::delete('cartel/{id}', 'CartelesController@remove');

/**
 * Routes for front
 */

Route::post('getItemsHome','HomeController@getItemsHome');
Route::post('getBannersHome','HomeController@getBannersHome');
Route::post('getNoticiasSeccion','HomeController@getNoticiasSeccion');
Route::post('getArticulos','HomeController@getArticulos');
Route::post('getCarteles','HomeController@getCarteles');
Route::post('getNoticia','HomeController@getNoticia');
Route::post('getCartel','HomeController@getCartel');
Route::post('getArticulo','HomeController@getArticulo');
Route::post('getAllNoticiasSeccion','HomeController@getAllNoticiasSeccion');
Route::post('getAllArticulos','HomeController@getAllArticulos');
Route::post('getBusqueda','HomeController@getBusqueda');