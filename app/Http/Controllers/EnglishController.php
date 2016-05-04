<?php

namespace App\Http\Controllers;

use App\Models\English;
use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class EnglishController extends Controller
{
    private $navFlag = 'explore';

    public function index()
    {
        $navFlag = $this->navFlag;
        $latest = $this->latest(40);
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
    public function latest($nums)
    {
        $key = 'english.latest.articles.' . $nums;
        $latest = Cache::remember($key, 30, function () use ($nums) {
            return English::latest('id')->take($nums)->paginate(20, ['id', 'slug', 'seo_title']);
        });
        return $latest;
    }

    //缓存上一篇下一篇
    public function getSlug($id, $prevOrnext = 'prev')
    {
        $slugId = $slug = '';
        if ($prevOrnext == 'prev') {
            $slugId = English::where('id', '<', $id)->max('id');
        } elseif ($prevOrnext == 'next') {
            $slugId = English::where('id', '>', $id)->min('id');
        }

        if ($slugId) {
            $key = 'english.article.' . $id . '.' . $prevOrnext;
            $slug = Cache::remember($key, 30, function () use ($slugId) {
                return English::where('id', $slugId)->first(['slug']);
            });
        }
        return $slug;
    }

    public function sitemap()
    {
        $content = view('english.sitemap');
        return Response($content, '200')->header('Content-Type', 'text/xml');
    }
}
