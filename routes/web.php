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

Route::post('/blog/post_delete_admin','PostController@destroy_admin')
        ->name('post_delete_admin');

Route::post('/blog/destroy_admin','BlogController@destroy_admin')
        ->name('blog_destroy_admin');

//Routes search
Route::post('/search','SearchController@find')
        ->name('search');

Route::post('/searchblog','SearchController@findblog')
        ->name('searchblog');

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
        ->name('profiles')
        ->middleware('user');


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

/*ROUTES STAFF O ADMIN*/

Route::get('/moderation', 'StaffController@moderation')
        ->name('moderation')
        ->middleware('staff');

Route::get('/managestaff', 'AdminController@managestaff')
        ->name('managestaff')
        ->middleware('admin');

Route::get('/community', 'AdminController@community')
        ->name('community')
        ->middleware('admin');

Route::post('/updaterole', 'UserController@updateRole')
        ->name('updaterole')
        ->middleware('admin');

Route::get('/community/showuserinfo', 'AdminController@showuserinfo')
        ->name('showuserinfo')
        ->middleware('admin');