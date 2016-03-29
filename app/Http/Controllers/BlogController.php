<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wp;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    private $indexPostsKey = 'com.tanteng.me.blog.index.posts';
    public function index()
    {
        $newPosts = Cache::store('redis')->get($this->indexPostsKey);
        if (!$newPosts) {
            $newPosts = Wp::type('post')->status('publish')->orderBy('post_date', 'desc')->take(28)->get();
            Cache::store('redis')->put($this->indexPostsKey, $newPosts, 30);
        }
        return View('index/blog', compact('newPosts'));
    }
}
