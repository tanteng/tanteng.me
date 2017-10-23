<?php

namespace App\Http\Controllers;

use App\Models\WpPost;
use Cache;

class BlogController extends Controller
{
    private $blogPostsKey = 'blog.index.lists';

    /**
     * Blog页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $navFlag = 'blog';
        $newPosts = Cache::remember($this->blogPostsKey, 30, function () {
            $articles = [];
            $list = WpPost::type('post')->status('publish')->orderBy('post_date', 'desc')->take(17)->get();
            foreach ($list as $item) {
                $articles[] = [
                    'url' => $item->url,
                    'post_title' => $item->post_title,
                    'post_date' => $item->post_date->format('Y-m-d'),
                ];
            }
            return $articles;
        });
        return view('index/blog', compact('newPosts', 'navFlag'));
    }
}
