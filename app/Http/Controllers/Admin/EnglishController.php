<?php

namespace App\Http\Controllers\Admin;

use App\Models\English;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests;

class EnglishController extends Controller
{
    public function __construct(English $english)
    {
        $this->middleware('auth:admin');
        $this->english = $english;
    }

    //后台列表
    public function index()
    {
        $lists = $this->english->orderBy('id', 'desc')->paginate(10);
        return view('admin.english.index', compact('lists'));
    }

    //POST提交表单
    public function postNew(Request $request)
    {
        if ($request->isMethod('POST')) {
            $isEdit = $request->input('isEdit');
            $data['phrase'] = $request->input('phrase');
            $data['slug'] = $request->input('slug');
            $data['content'] = $request->input('content');
            $seoTitle = $request->input('seo_title');
            if (!$seoTitle) {
                $seoTitle = $data['slug'] . '英文怎么说';
            }
            $data['seo_title'] = $seoTitle;
            $data['description'] = $request->input('description');

            if ($isEdit) {
                $this->english->where('id', $request->input('id'))->update($data);
            } else {
                $this->english->create($data);
            }
        }
        return redirect('/english');
    }

    //添加内容
    public function create()
    {
        $isEdit = 0;
        return view('admin.english.create', compact('isEdit'));
    }

    //编辑内容
    public function edit($id)
    {
        $isEdit = 1;
        $detail = $this->english->find($id);
        return view('admin.english.edit', compact('detail', 'isEdit'));
    }
}
