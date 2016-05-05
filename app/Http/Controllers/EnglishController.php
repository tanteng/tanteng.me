<?php

namespace App\Http\Controllers;

use App\Models\English;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class EnglishController extends Controller
{
    private $navFlag = 'explore';

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $navFlag = $this->navFlag;
        $latest = $this->latest(20, $page);
        $seo['description'] = '英文怎么说';
        return view('english.index', compact('latest', 'seo', 'navFlag'));
    }

    public function detail($slug = false)
    {
        $navFlag = $this->navFlag;
        $detail = English::where('slug', $slug)->firstOrFail();
        $prevSlug = $this->getSlug($detail['id'], 'prev');
        $nextSlug = $this->getSlug($detail['id'], 'next');
        $latest = $this->latest(10);
        $phrase = $detail['phrase'];
        $seoTitle = $detail['seo_title'] . '_英语_tanteng.me';
        $description = $detail['description'];
        $content = Markdown::convertToHtml($detail['content']);
        $compact = compact('navFlag', 'slug', 'phrase', 'seoTitle', 'description', 'content', 'canonical', 'latest', 'prevSlug', 'nextSlug');
        return view('english.how-to-say', $compact);
    }

    //缓存最新文章
    public function latest($nums, $page=1)
    {
        $key = 'english.latest.articles.page.'.$page.'.nums.' . $nums;
        $latest = Cache::remember($key, 30, function () use ($nums) {
            return English::latest('id')->paginate($nums, ['id', 'slug', 'seo_title', 'created_at']);
        });
        return $latest;
    }

    //缓存上一篇下一篇
    public function getSlug($id, $prevOrnext = 'prev')
    {
        if ($prevOrnext == 'prev') {
            $op = '<';
        } elseif ($prevOrnext == 'next') {
            $op = '>';
        }
        $key = 'english.article.' . $id . '.' . $prevOrnext;
        $slug = Cache::remember($key, 30, function () use ($id, $op) {
            return English::where('id', $op, $id)->first(['slug']);
        });

        return $slug;
    }

    //生成sitemap.xml
    public function sitemap()
    {
        $latest = $this->latest(200);
        $content = view('english.sitemap', ['data' => $latest]);
        return Response($content, '200')->header('Content-Type', 'text/xml');
    }
}
