<?php

namespace App\Http\Controllers;

use App\Models\Single;
use Cache;

class SingleController extends Controller
{
    /**
     * 单页面
     * @var Single
     */
    private $single;

    /**
     * 缓存时间
     */
    const CACHE_TIME = 200;


    /**
     * 注入single模型
     * SingleController constructor.
     * @param Single $single
     */
    public function __construct(Single $single)
    {
        $this->single = $single;
        view()->share(['navFlag' => 'blog']);
    }

    /**
     * 单页面
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($slug)
    {
        $data = Cache::remember('com.tanteng.share.page.' . $slug, self::CACHE_TIME, function () use ($slug) {
            $content = $this->single->getContent($slug);
            return ['content' => $content];
        });

        $content = $data['content'];

        return view('index.single', compact('content'));
    }
}
