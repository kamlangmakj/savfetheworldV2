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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', 'HomeController@postReceiveNews');
Route::post('/', 'HomeController@postContact');

Route::get('/activity', 'UserActivityController@index')->name('index');
Route::get('/reward', 'UserRewardController@index')->name('index');

Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

//user activity
Route::get('/activity_tabs_detail/{filter}', 'HomeController@getActivityTabsDetail');
Route::get('/activity_news_detail/{filter}', 'UserActivityController@getActivityNewsDetail');

//user reward
Route::get('/reward_tabs_detail/{filter}', 'HomeController@getRewardTabsDetail');
Route::get('/reward_news_detail/{filter}', 'UserRewardController@getRewardNewsDetail');

//user profile
Route::get('/profile', 'ProfileController@getProfileUser');

Route::get('/profile/edit/{id}', 'ProfileController@getEditProfileUser');
Route::post('/profile/edit', 'ProfileController@postEditProfileUser');


Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin', 'AdminController@index')->name('admin.index');

//admin users
Route::get('/admin/users', 'UsersController@getUsers');
Route::get('/admin/users/edit/{id}', 'UsersController@getEditUsers');
Route::post('/admin/users/edit', 'UsersController@postEditUsers');
Route::post('/admin/users/delete', 'UsersController@postDeleteUsers');

//admin activities
Route::get('/admin/activities', 'ActivitiesController@getActivities');
Route::get('/admin/activities/create', 'ActivitiesController@getCreateActivities');
Route::post('/admin/activities/create', 'ActivitiesController@postCreateActivities');
Route::get('/admin/activities/edit/{id}', 'ActivitiesController@getEditActivities');
Route::post('/admin/activities/edit', 'ActivitiesController@postEditActivities');
Route::post('/admin/activities/delete', 'ActivitiesController@postDeleteActivities');

//admin rewards
Route::get('/admin/rewards', 'RewardsController@getRewards');
Route::get('/admin/rewards/create', 'RewardsController@getCreateRewards');
Route::post('/admin/rewards/create', 'RewardsController@postCreateRewards');
Route::get('/admin/rewards/edit/{id}', 'RewardsController@getEditRewards');
Route::post('/admin/rewards/edit', 'RewardsController@postEditRewards');
Route::post('/admin/rewards/delete', 'RewardsController@postDeleteRewards');

//admin tracking_rewards
Route::get('/admin/tracking_rewards', 'TrackingRewardsController@getTrackingRewards');

