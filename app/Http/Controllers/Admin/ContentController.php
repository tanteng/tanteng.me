<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $lists = Content::orderBy('id','desc')->paginate();
        return view('admin.content.index', compact('lists'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $quest)
    {
        $data['title'] = $quest->get('title');
        $data['seo_title'] = $quest->get('seo_title');
        $data['slug'] = $quest->get('slug');
        $data['class_id'] = $quest->get('class_id');
        $data['tag_id'] = $quest->get('tag_id');
        $data['content'] = $quest->get('content');
        $data['type'] = $quest->get('type');
        $create = Content::create($data);
        if (!$create) {
            return redirect()->back();
        }
        return view('admin.content.create');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
