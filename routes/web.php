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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);
Route::get('/blog', ['as' => 'index.blog', 'uses' => 'BlogController@index']);
Route::get('/resume', ['as' => 'index.resume', 'uses' => 'IndexController@resume']);
Route::get('/page/{slug}', ['as' => 'index.page', 'uses' => 'SingleController@index']);
Route::get('/contact', ['as' => 'index.contact', 'uses' => 'IndexController@contact']);
Route::post('/contact/comment', ['uses' => 'IndexController@postComment']);
Route::get('/travel', ['as' => 'index.travel', 'uses' => 'TravelController@index']);
Route::get('/travel/latest', ['as' => 'travel.latest', 'uses' => 'TravelController@latest']);
Route::get('/travel/{destination}/list', ['as' => 'travel.destination', 'uses' => 'TravelController@travelList']);
Route::get('/travel/{slug}', ['uses' => 'TravelController@travelDetail']);
Route::get('/sitemap.xml', ['as' => 'index.sitemap', 'uses' => 'IndexController@sitemap']);
Route::get('/page/{slug?}', ['uses' => 'SingleController@index']);

