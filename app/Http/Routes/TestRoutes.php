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
            $router->get('/redis', ['uses' => 'TestController@testRedis']);
            $router->get('/memcache', ['uses' => 'TestController@testMemcache']);
            $router->any('/testCurl', ['uses' => 'TestController@testCurl']);
            $router->get('/preg', ['uses' => 'TestController@preg']);
        });
    }
}