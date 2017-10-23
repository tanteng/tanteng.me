<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Resume;
use App\Models\Setting;
use App\Models\Travel;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * 网站首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $navFlag = 'home';
        $profile = Cache::remember('index.profile', 10, function () {
            $value = Setting::getSettingsByKey('index.profile');
            return $value;
        });
        return view('index.index', compact('navFlag', 'profile'));
    }

    /**
     * 简历
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume()
    {
        $navFlag = 'resume';
        $resume = Cache::remember('resume.latest', 20, function () {
            return Resume::where('status', 1)->orderBy('id', 'desc')->firstOrFail()->toArray();
        });
        return view('index.resume', compact('navFlag', 'resume'));
    }

    /**
     * 联系
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $navFlag = 'contact';
        return view('index.contact', compact('navFlag'));
    }

    //Contact页面提交留言
    public function postComment(Request $request)
    {
        $messages = [
            'nickname.required' => '请填写你的名字！',
            'content.required'  => '请填写要发布的内容！',
            'captcha.required'  => '请填写验证码，以证明你不是机器人！',
            'captcha.captcha'   => '验证码错误！',
        ];

        if ($request->method() == 'POST') {
            $this->validate($request, [
                'nickname' => 'required',
                'content'  => 'required',
                'captcha'  => 'required|captcha',
            ], $messages);

            $result = DB::table('guestbook')->insert([
                'nickname'   => $request['nickname'],
                'website'    => $request['website'],
                'content'    => $request['content'],
                'ip'         => $request->getClientIp(),
                'is_audit'   => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if ($result) {
                return redirect()->back()->with(['info' => '发布成功！']);
            }
        }

        return redirect()->back()->with(['info' => '发布失败！']);
    }

    /**
     * 生成sitemap地图
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        $data = Cache::remember('sitemap', 300, function () {
            return [
                'travels'      => Travel::all(),
                'destinations' => Destination::all()
            ];
        });
        $travels = $data['travels'];
        $destinations = $data['destinations'];
        $data = compact('travels', 'destinations');
        $sitemap = view('index.sitemap', $data);
        return response($sitemap)->header('Content-Type', 'text/xml');
    }

    /**
     * 下载文件
     * @param Request $request
     * @return mixed
     */
    public function download(Request $request)
    {
        $filename = $request->get('filename');
        if (!$filename) {
            abort(404);
        }
        $path = storage_path('download') . '/' . $filename;
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->download($path);
    }
}