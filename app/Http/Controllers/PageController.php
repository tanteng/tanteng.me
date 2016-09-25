<?php

namespace App\Http\Controllers;

use App\Models\Content as ContentModel;

class PageController extends Controller
{
    /**
     * 构造函数注入内容模型
     * PageController constructor.
     * @param ContentModel $content
     */
    public function __construct(ContentModel $content)
    {
        $this->content = $content;
    }

    /**
     * 分享页面
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function share($slug)
    {
        $navFlag = 'share';
        $content = $this->content->getContent($slug);
        return view('share.page', compact('navFlag', 'content'));
    }
}
