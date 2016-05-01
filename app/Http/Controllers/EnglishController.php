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
        return view('english.index', compact('latest', 'seo', 'navFlag'));
    }

    public function detail($slug = false)
    {
        $navFlag = $this->navFlag;
        $detail = English::where('slug', $slug)->firstOrFail();
        $nextId = English::where('id', '>', $detail['id'])->min('id');
        $prevId = English::where('id', '<', $detail['id'])->max('id');
        $nextSlug = $prevSlug = '';
        if($nextId){
            $nextSlug = English::where('id', $nextId)->first(['slug']);
        }
        if($prevId){
            $prevSlug = English::where('id', $prevId)->first(['slug']);
        }
        $latest = English::latest('id')->take(10)->get(['id', 'slug', 'seo_title']);
        $phrase = $detail['phrase'];
        $seoTitle = $detail['seo_title'] . '_英语_tanteng.me';
        $description = $detail['description'];
        $content = Markdown::convertToHtml($detail['content']);
        $compact = compact('navFlag', 'slug', 'phrase', 'seoTitle', 'description', 'content', 'canonical', 'latest', 'prevSlug', 'nextSlug');
        return view('english.how-to-say', $compact);
    }
}
