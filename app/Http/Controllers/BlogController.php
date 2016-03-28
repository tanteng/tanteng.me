<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wp;

class BlogController extends Controller
{
    public function index()
    {
        $newPosts = Wp::status('publish')->orderBy('post_date', 'desc')->take(20)->get();
        return View('index/blog', compact('newPosts'));
    }
}
