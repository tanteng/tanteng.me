<?php

namespace App\Http\Controllers;

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
            return Wp::type('post')->status('publish')->orderBy('post_date', 'desc')->take(17)->get();
        });
        return View('index/blog', compact('newPosts', 'navFlag'));
    }
}
