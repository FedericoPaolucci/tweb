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
    return view('welcome');
});

Route::get('/prova', 'publicController@prova')
        ->name('prova');

/* Routes per l'autenticazione */

Route::get('/login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('/login', 'Auth\LoginController@login');

Route::post('/logout', 'Auth\LoginController@logout')
        ->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('/register', 'Auth\RegisterController@register');

/*Fine Routes autenticazione */