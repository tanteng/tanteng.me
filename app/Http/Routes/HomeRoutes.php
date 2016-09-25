<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class HomeRoutes
{
    public function map(Registrar $router)
    {
        $router->group(['domain' => 'www.tanteng.me', 'middleware' => 'web'], function ($router) {
            $router->auth();
            $router->get('/', ['as' => 'home', 'uses' => 'IndexController@index']);
            $router->get('/blog', ['as' => 'index.blog', 'uses' => 'BlogController@index']);
            $router->get('/resume', ['as' => 'index.resume', 'uses' => 'IndexController@resume']);
            $router->get('/page/{slug}', ['uses' => 'PageController@share']);
            $router->get('/post', ['name' => 'post.show', 'uses' => 'ArticleController@show']);
            $router->get('/contact', ['as' => 'index.contact', 'uses' => 'IndexController@contact']);
            $router->post('/contact/comment', ['uses' => 'IndexController@postComment']);
            $router->get('/travel', ['as' => 'index.travel', 'uses' => 'TravelController@index']);
            $router->get('/travel/latest', ['as' => 'travel.latest', 'uses' => 'TravelController@latest']);
            $router->get('/travel/{destination}/list', ['as' => 'travel.destination', 'uses' => 'TravelController@travelList']);
            $router->get('/travel/{slug}', ['uses' => 'TravelController@travelDetail']);
            $router->get('/commits', ['as' => 'git.commits', 'uses' => 'IndexController@commitsHistory']);
            $router->post('/gitHistory', ['as' => 'git.history', 'uses' => 'IndexController@gitCommitHistory']);
            $router->get('/sitemap.xml', ['as' => 'index.sitemap', 'uses' => 'IndexController@sitemap']);
            $router->get('/download', ['uses' => 'IndexController@download']);
            $router->get('/donate', ['as' => 'donate', 'uses' => 'IndexController@donate']);
        });
    }
}