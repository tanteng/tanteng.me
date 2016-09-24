<?php

namespace App\Http\Controllers;

use App\Models\Content;

class PageController extends Controller
{
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function share($slug)
    {
        $navFlag = 'share';
        $content = $this->content->getContent($slug);
        return view('share.page', compact('navFlag', 'content'));
    }
}
