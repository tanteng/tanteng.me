<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

$router->get('/profile', 'Api\WechatController@profile');
$router->get('/resume', 'Api\WechatController@resume');
$router->get('/blog', 'Api\WechatController@blog');
$router->get('/destination', 'Api\WechatController@destination');
$router->get('/destination/travelList', 'Api\WechatController@travelByDes');
$router->get('/travelDetail', 'Api\WechatController@travelDetail');
