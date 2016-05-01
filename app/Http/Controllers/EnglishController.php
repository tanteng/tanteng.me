<?php

namespace App\Http\Controllers;

use App\Models\English;
use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;

class EnglishController extends Controller
{

    public function index()
    {
        return 'Hello World!';
    }

    public function detail($slug = false)
    {
        $navFlag = 'explore';
        $detail = English::where('slug', $slug)->firstOrFail();
        $phrase = $detail['phrase'];
        $seoTitle = $detail['seo_title'] . '_英语_tanteng.me';
        $description = $detail['description'];
        $content = Markdown::convertToHtml($detail['content']);
        $canonical = 'http://english.tanteng.me/how-to-say/' . $slug;
        $compact = compact('navFlag','slug', 'phrase', 'seoTitle', 'description', 'content', 'canonical');
        return view('english.how-to-say', $compact);
    }
}
