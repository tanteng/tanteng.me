<?php

/**
 * Created by PhpStorm.
 * User: xl
 * Date: 2016/7/4
 * Time: 17:56
 */

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class EnglishRoutes
{
    public function map(Registrar $router)
    {
        //英文怎么说
        $router->group(['domain' => 'english.tanteng.me', 'middleware' => 'web'], function ($router) {
            $router->get('/', ['as' => 'english.index', 'uses' => 'EnglishController@index']);
            $router->get('/how-to-say', ['as' => 'how-to-say.index', 'uses' => 'EnglishController@index']);
            $router->get('/how-to-say/{phrase}', ['as' => 'how-to-say.detail', 'uses' => 'EnglishController@detail']);
            $router->get('/sitemap.xml', ['uses' => 'EnglishController@sitemap']);
        });
    }
}