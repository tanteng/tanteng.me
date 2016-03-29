<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wp;

class BlogController extends Controller
{
    public function index()
    {
        $newPosts = Wp::type('post')->status('publish')->orderBy('post_date', 'desc')->take(28)->get();
        //$newPosts = Wp::find(8634);
        //dd($newPosts);exit;
        return View('index/blog', compact('newPosts'));
    }
}
