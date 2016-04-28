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


//后台管理
Route::group(['domain' => 'admin.tanteng.me', 'middleware' => 'web'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/login', 'Admin\AuthController@getLogin');
    Route::post('/login', 'Admin\AuthController@postLogin');
    Route::get('/logout', 'Admin\AuthController@logout');
});

Route::get('/', ['uses' => 'IndexController@index']);
Route::get('/blog', ['as'=>'index.blog', 'uses' => 'BlogController@index']);
Route::get('/resume', ['uses' => 'IndexController@resume']);

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

    Route::get('/admin/login', 'Admin\AuthController@getLogin');
    Route::post('/admin/login', 'Admin\AuthController@postLogin');
    Route::get('/admin/logout', 'Admin\AuthController@logout');
    Route::post('/admin/register', 'Admin\AuthController@postRegister');
    Route::get('/admin', 'AdminController@index');

    Route::post('/admin/upload', ['uses' => 'Admin\QiniuController@postUpload']);
    Route::get('/admin/attachment', ['uses' => 'Admin\QiniuController@showList']);

    Route::get('/contact', ['uses' => 'IndexController@contact']);
    Route::post('/contact/comment', ['uses' => 'IndexController@postComment']);
});




/*
|--------------------------------------------------------------------------
| 测试或工具类路由
|--------------------------------------------------------------------------
|
| 所有前缀是test的路由，如 http://www.tanteng.me/test/redis，该组路由用途为测试或工具类
|
*/
Route::group(['prefix' => 'test'], function(){
    Route::get('/redis', ['uses' => 'TestController@testRedis']);
    Route::get('/memcache', ['uses' => 'TestController@testMemcache']);
    Route::get('/admin/{password}', ['uses' => 'TestController@createAdmin']);
});
