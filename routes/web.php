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

// BookController.php

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
