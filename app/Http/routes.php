<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/404', function () {
    return view('errors/404');
});
//HOME
Route::get('/home', 'HomeController@index');
Route::get('/registro', 'HomeController@registro');
Route::auth();

//BRANDS

Route::get('/brands', 'BrandsController@index');
Route::get('/brand/create', 'BrandsController@create');
Route::post('/brands', 'BrandsController@store');
Route::put('/brands/{id}', 'BrandsController@update');
Route::get('/brands/{id}/edit','BrandsController@edit');
Route::delete('/brands/{id}','BrandsController@destroy');

//FEATURES

Route::get('/features', 'FeaturesController@index');
Route::get('/feature/create', 'FeaturesController@create');
Route::post('/feature', 'FeaturesController@store');
Route::put('/feature/{id}', 'FeaturesController@update');
Route::get('/feature/{id}/edit','FeaturesController@edit');
Route::delete('/feature/{id}','FeaturesController@destroy');

//MODELOS

Route::get('/modelos', 'ModelsController@index');
Route::get('/modelo/create', 'ModelsController@create');
Route::post('/modelo', 'ModelsController@store');
Route::put('/modelo/{id}', 'ModelsController@update');
Route::get('/modelo/{id}/edit','ModelsController@edit');
Route::delete('/modelo/{id}','ModelsController@destroy');

//CARS

Route::get('/cars', 'CarsController@index');
Route::get('/car/create', 'CarsController@create');
Route::post('/car', 'CarsController@store');
Route::put('/car/{id}', 'CarsController@update');
Route::get('/car/{id}/edit','CarsController@edit');
Route::delete('/car/{id}','CarsController@destroy');
