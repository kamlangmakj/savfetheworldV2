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
    return view('user.index');
});
Route::get('/activity', function () {
    return view('user.activity');
});
Route::get('/reward', function () {
    return view('user.reward');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/tracking_rewards', 'AdminController@tracking_rewards');

//admin users
Route::get('/admin/users', 'AdminController@getUsers');
Route::get('/admin/users/edit/{id}', 'AdminController@getEditUsers');
Route::post('/admin/users/edit', 'AdminController@postEditUsers');
Route::post('/admin/users/delete', 'AdminController@postDeleteUsers');

//admin activities
Route::get('/admin/activities', 'AdminController@getActivities');
Route::get('/admin/activities/create', 'AdminController@getCreateActivities');
Route::post('/admin/activities/create', 'AdminController@postCreateActivities');
Route::get('/admin/activities/edit/{id}', 'AdminController@getEditActivities');
Route::post('/admin/activities/edit', 'AdminController@postEditActivities');
Route::post('/admin/activities/delete', 'AdminController@postDeleteActivities');

//admin rewards
Route::get('/admin/rewards', 'AdminController@getRewards');
Route::get('/admin/rewards/create', 'AdminController@getCreateRewards');
Route::post('/admin/rewards/create', 'AdminController@postCreateRewards');
Route::get('/admin/rewards/edit/{id}', 'AdminController@getEditRewards');
Route::post('/admin/rewards/edit', 'AdminController@postEditRewards');
Route::post('/admin/rewards/delete', 'AdminController@postDeleteRewards');
