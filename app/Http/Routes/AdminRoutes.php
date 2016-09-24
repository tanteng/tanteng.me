<?php
/**
 * Created by PhpStorm.
 * User: xl
 * Date: 2016/7/4
 * Time: 18:12
 */
namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class AdminRoutes
{
    public function map(Registrar $router)
    {
        //后台管理
        $router->group(['domain' => 'admin.tanteng.me', 'middleware' => 'web'], function ($router) {
            $router->get('/', 'Admin\AdminController@index');
            $router->get('/login', 'Admin\AuthController@getLogin');
            $router->post('/login', 'Admin\AuthController@postLogin');
            $router->get('/logout', 'Admin\AuthController@logout');
            $router->post('/upload', ['uses' => 'Admin\QiniuController@postUpload']);
            $router->get('/attachment', ['uses' => 'Admin\QiniuController@showList']);
            $router->resource('travel', 'Admin\TravelController');
            $router->resource('destination', 'Admin\DestinationController');
            $router->get('/settings/cover', 'Admin\SettingsController@coverEdit');
            $router->post('/settings/cover', 'Admin\SettingsController@coverUpdate');
            $router->resource('content', 'Admin\ContentController');
        });
    }
}