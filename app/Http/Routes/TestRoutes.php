<?php
/**
 * Created by PhpStorm.
 * User: xl
 * Date: 2016/7/4
 * Time: 18:10
 */
namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class TestRoutes
{
    public function map(Registrar $router)
    {
        $router->group(['prefix' => 'test'], function ($router) {
            $router->get('/', ['uses' => 'TestController@test']);
        });
    }
}