<?php

namespace App\Http\Controllers;

use App\Models\English;
use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;

class EnglishController extends Controller
{
    private $navFlag = 'explore';

    public function index()
    {
        $navFlag = $this->navFlag;
        $latest = English::latest('id')->take(20)->get(['slug', 'seo_title']);
        $seo['description'] = '英文怎么说';
        $seo['canonical'] = 'http://english.tanteng.me/how-to-say';
        return view('english.index', compact('latest', 'seo', 'navFlag'));
    }

    public function detail($slug = false)
    {
        $navFlag = $this->navFlag;
        $detail = English::where('slug', $slug)->firstOrFail();
        $nextSlug = English::where('id', '>', $detail['id'])->min('slug');
        $prevSlug = English::where('id', '<', $detail['id'])->max('slug');
        $latest = English::latest('id')->take(10)->get(['slug', 'seo_title']);
        $phrase = $detail['phrase'];
        $seoTitle = $detail['seo_title'] . '_英语_tanteng.me';
        $description = $detail['description'];
        $content = Markdown::convertToHtml($detail['content']);
        $canonical = 'http://english.tanteng.me/how-to-say/' . $slug;
        $compact = compact('navFlag', 'slug', 'phrase', 'seoTitle', 'description', 'content', 'canonical', 'latest', 'nextSlug', 'prevSlug');
        return view('english.how-to-say', $compact);
    }
}
