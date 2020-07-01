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

Route::get('/', 'HomeController@index');

Route::get('importTest', 'HomeController@importTest')->name('importTest');

//Route::get('/supply/{supply}', 'HomeController@supply');


Route::resource('supply', 'HomeController');

Route::fallback(function() {
    abort(404);
});
