<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    private $indexPostsKey = 'com.tanteng.me.index.blog.posts';

    public function index()
    {
        $navFlag = 'blog';

        $newPosts = Cache::store('redis')->remember($this->indexPostsKey, 30, function () {
            $articles = [];
            $list = Wp::type('post')->status('publish')->orderBy('post_date', 'desc')->take(17)->get();
            foreach ($list as $item) {
                $articles[] = [
                    'url' => $item->url,
                    'post_title' => $item->post_title,
                    'post_date' => date('Y-m-d',$item->post_date->getTimestamp()),
                ];
            }
            return $articles;
        });
        return View('index/blog', compact('newPosts', 'navFlag'));
    }
}
