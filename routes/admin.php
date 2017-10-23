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

Route::get('/', 'Admin\AdminController@index');

Route::get('/login', 'Admin\LoginController@showLoginForm');

Route::post('/login', 'Admin\LoginController@login');

Route::get('/logout', 'Admin\LoginController@logout');

Route::resource('/user', 'Admin\UserController');

Route::resource('/role', 'Admin\RoleController');

Route::resource('/permission', 'Admin\PermissionController');

Route::get('/testEntrust', 'Admin\TestEntrustController@hello');

Route::put('/settings/updateAll', 'Admin\SettingsController@updateAll')->name('settings.updateAll');

Route::resource('/settings', 'Admin\SettingsController');

Route::resource('/travel', 'Admin\TravelController');

Route::resource('/resume', 'Admin\ResumeController');
