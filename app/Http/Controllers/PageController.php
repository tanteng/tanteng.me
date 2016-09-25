<?php

namespace App\Http\Controllers;

use App\Models\Content as ContentModel;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    /**
     * 缓存时间
     */
    const CACHE_TIME = 200;

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

        $data = Cache::remember('com.tanteng.share.page.' . $slug, self::CACHE_TIME, function () use ($slug) {
            $content = $this->content->getContent($slug);
            $content->content = Markdown::convertToHtml($content->content);
            return ['content' => $content];
        });

        $content = $data['content'];

        return view('share.page', compact('navFlag', 'content'));
    }
}
