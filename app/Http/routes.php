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
    Route::post('/upload', ['uses' => 'Admin\QiniuController@postUpload']);
    Route::get('/attachment', ['uses' => 'Admin\QiniuController@showList']);
    Route::get('/tables', ['uses' => 'AdminController@tables']);
    Route::get('/english/post-new', ['uses' => 'Admin\EnglishController@create']);
    Route::post('/english/post-new', ['uses' => 'Admin\EnglishController@postNew']);
});

//英文怎么说
Route::group(['domain' => 'english.tanteng.me', 'middleware' => 'web'], function() {
    Route::get('/', ['as' => 'english.index', 'uses' => 'EnglishController@index']);
    Route::get('/how-to-say', ['as'=>'how-to-say.index' ,'uses' => 'EnglishController@index']);
    Route::get('/how-to-say/{phrase}', ['as' => 'how-to-say.detail' ,'uses' => 'EnglishController@detail']);
});

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


Route::group(['domain' => 'www.tanteng.me', 'middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
    Route::get('/blog', ['as'=>'index.blog', 'uses' => 'BlogController@index']);
    Route::get('/resume', ['as'=>'index.resume' , 'uses' => 'IndexController@resume']);
    Route::get('/post', ['name' => 'post.show',  'uses' => 'ArticleController@show']);
    Route::get('/contact', ['as'=>'index.contact' ,'uses' => 'IndexController@contact']);
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
