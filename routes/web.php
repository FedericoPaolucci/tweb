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

/*Routes homepage*/

Route::get('/', 'publicController@home')
        ->name('homepublic');

Route::get('/user', 'UserController@index')
        ->name('user')
        ->middleware('user');

Route::get('/staff', 'StaffController@index')
        ->name('staff')
        ->middleware('staff');

Route::get('/admin', 'AdminController@index')
        ->name('admin')
        ->middleware('admin');

/*FINE Routes homepage*/

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