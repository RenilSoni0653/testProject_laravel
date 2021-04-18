<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

//Profile & home routes
Route::get('/home', 'ProfileController@index')->name('home');
Route::post('/profile','ProfileController@store');
Route::get('/status/{id}','ProfileController@show')->name('status.show');

//Contact routes
Route::get('/contact/{user}','ContactController@show')->name('contact.show');
Route::get('/contact','ContactController@index')->name('contact.index');
Route::post('/contact','ContactController@store');

//Request Routes
Route::get('/request/{request}','RequestedController@show')->name('requested.show');
Route::post('/request','RequestedController@store')->name('request.store');