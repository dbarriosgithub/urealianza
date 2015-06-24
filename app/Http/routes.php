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
Route::resource('persona', 'PersonaController');
Route::resource('alcalde', 'AlcaldeController');
Route::resource('concejal', 'ConcejalController');
Route::resource('jefepolitico', 'JefepoliticoController');
Route::post('persona/search/{query}','PersonaController@search');
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('auto', 'WelcomeController@auto');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



