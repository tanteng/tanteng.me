<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ContentController extends Controller
{
    public function __construct()
    {

    }

    /**
     * 内容管理列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $lists = Content::orderBy('id','desc')->paginate();
        return view('admin.content.index', compact('lists'));
    }

    /**
     * 新建内容
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * 插入内容
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $data['title'] = $request->get('title');
        $data['seo_title'] = $request->get('seo_title');
        $data['slug'] = str_slug($request->get('slug'));
        $data['description'] = $request->get('description');
        $data['class_id'] = $request->get('class_id');
        $data['tag_id'] = $request->get('tag_id');
        $data['content'] = $request->get('content');
        $data['type'] = $request->get('type');
        $create = Content::create($data);
        if (!$create) {
            return redirect()->back();
        }
        return view('admin.content.create');
    }

    public function show()
    {

    }

    /**
     * 编辑内容
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.edit', compact('content'));
    }

    /**
     * 更新内容
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $data['title'] = $request->get('title');
        $data['seo_title'] = $request->get('seo_title');
        $data['slug'] = str_slug($request->get('slug'));
        $data['description'] = $request->get('description');
        $data['class_id'] = $request->get('class_id');
        $data['tag_id'] = $request->get('tag_id');
        $data['content'] = $request->get('content');
        $data['type'] = $request->get('type');
        $update = $content->update($data);
        if (!$update) {
            return redirect()->back();
        }
        Cache::forget('com.tanteng.share.page.'.$data['slug']);
        return redirect()->route('content.index');
    }

    public function destroy()
    {

    }
}
