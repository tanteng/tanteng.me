<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function share($slug)
    {
        $navFlag = 'share';
        $content = Content::getContent($slug);
        return view('share.page', compact('navFlag', 'content'));
    }
}
