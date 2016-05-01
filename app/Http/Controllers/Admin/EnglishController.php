<?php

namespace App\Http\Controllers\Admin;

use App\Models\English;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EnglishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        return view('admin.english_create');
    }

    public function postNew(Request $request)
    {
        if($request->isMethod('POST')){
            $english = new English();
            $english->phrase = $request->input('phrase');
            $english->content = Markdown::convertToHtml($request->input('content'));
            $english->seo_title = $request->input('seo_title');
            $english->description = $request->input('description');
            $english->slug = $request->input('slug');
            $english->save();
        }
        return redirect()->back();
    }
}
