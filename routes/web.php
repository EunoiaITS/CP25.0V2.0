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

// Route::get('/', function () {
//     return view('users/login');
// });
Route::get('/', 'UsersController@login');

Auth::routes();

Route::get('login', [
  'as' => 'login',
  'uses' => 'UsersController@login'
]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UsersController@login');

Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');

// Admin routes
Route::get('/admin', 'AdminController@index');
Route::resource('/admin/users', 'AdminUsersController');

Route::get('/author', 'AuthorController@index');
Route::get('/subscriber', 'SubscriberController@index');