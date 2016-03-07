<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index.index');
});

Route::get('/slide', function () {
    return view('wechat.slide');
});

Route::get('/nav', function () {
    return view('wechat.nav');
});

Route::get('/test/hscan', ['uses'=>'TestController@testRedisHscan']);
Route::get('/test/closure/{t1}/{t2}',['uses'=>'TestController@testClosure']);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/post', ['name' => 'post.show',  'uses' => 'ArticleController@show']);

    Route::get('admin/login', 'Admin\AuthController@getLogin');
    Route::post('admin/login', 'Admin\AuthController@postLogin');
    Route::get('admin/register', 'Admin\AuthController@getRegister');
    Route::get('admin/logout', 'Admin\AuthController@logout');
    Route::post('admin/register', 'Admin\AuthController@postRegister');
    Route::get('admin', 'AdminController@index');
});

