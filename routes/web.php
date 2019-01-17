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
Route::resource('/admin/qurans', 'AdminQuransController');
Route::resource('/admin/hadiths', 'AdminHadithsController');
Route::resource('/admin/zikirs', 'AdminZikirsController');
Route::resource('/admin/articles', 'AdminArticlesController');
Route::resource('/admin/manuscripts', 'AdminManuscriptsController');
Route::resource('/admin/foods', 'AdminFoodsController');
Route::resource('/admin/events', 'AdminEventsController');
Route::resource('/admin/advertisements', 'AdminAdvertisementsController');
Route::resource('/admin/keywords', 'AdminKeywordsController');
Route::get('/admin/keywords/{id}/manage', 'AdminKeywordsController@manage');
Route::post('/admin/keywords/link', 'AdminKeywordsController@link');
Route::get('/admin/keywords/{id}/unlink', 'AdminKeywordsController@unlink');

Route::get('/author', 'AuthorController@index');
Route::get('/subscriber', 'SubscriberController@index');