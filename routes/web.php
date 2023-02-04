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

Route::resource('blog','BlogController'); //BLOG RESOURCES

//Routes per i post nel blog
Route::post('/post','PostController@store')
        ->name('post');

Route::post('/blog/post_delete','PostController@destroy')
        ->name('post_delete');

//Routes search
Route::post('/search','SearchController@find')
        ->name('search');

//ROUTES MESSAGES E FRIENDS
Route::get('/messages','MessagesController@messages')
        ->name('messages')
        ->middleware('user');

Route::get('/messages/{id}','MessagesController@messagesview')
        ->name('messagesview')
        ->middleware('user');

Route::post('/messages/store','MessagesController@store')
        ->name('messageswrite');

Route::post('/messages/accept','UserController@friendaccept')
        ->name('friendaccept')
        ->middleware('user');

Route::post('/messages/request','UserController@friendrequest')
        ->name('friendrequest')
        ->middleware('user');

Route::post('/messages/remove','UserController@friendremove')
        ->name('friendremove')
        ->middleware('user');

//Routes user
Route::get('/profile/edit','UserController@edit')
        ->name('profile.edit')
        ->middleware('user');

Route::put('/profile/update','UserController@update')
        ->name('profile.update');

Route::get('/profile/{thisid}','UserController@show')
        ->name('profiles');


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

Route::get('error', function () {
    return view('error.show', ['alert' => request()->alert]);
})->name('error');