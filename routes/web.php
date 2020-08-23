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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/message', 'HomeController@message')->name('message');
Route::get('/message/{id}', 'HomeController@showMessage')->name('showM');
Route::post('/message/{id}', 'HomeController@storeMessage')->name('storeM');
