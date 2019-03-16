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

// FRONTEND ROUTES
Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@about_us');
Route::get('/permission', 'HomeController@permission');
Route::get('/team', 'HomeController@team');
Route::get('/privacy-policy', 'HomeController@privacy_policy');
Route::get('/contact', 'HomeController@contact');
Route::get('/user-register', 'HomeController@register');
Route::post('/user-register', 'HomeController@register');
Route::post('/user-login', 'HomeController@login');
Route::get('/user-logout', 'HomeController@logout')->middleware('is_subscriber');
Route::get('/subscription', 'HomeController@subscription')->middleware('is_subscriber');
Route::get('/company-registration', 'HomeController@company_registration');
Route::get('/refund-policy', 'HomeController@refund_policy');
Route::get('/forums', 'HomeController@forums');
Route::get('/events', 'HomeController@events');
Route::get('/events/{id}', 'HomeController@event_detail');
Route::post('/search', 'HomeController@search');


Route::get('/login', 'UsersController@login');

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