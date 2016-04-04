<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/3/29
 * Time: 21:48
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $navFlag = 'home';
        return view('index.index', compact('navFlag'));
    }

    public function resume()
    {
        $navFlag = 'resume';
        return view('index.resume', compact('navFlag'));
    }

    public function contact(Request $quest)
    {
        $navFlag = 'contact';
        return view('index.contact', compact('navFlag'));
    }

    //Contact页面提交留言
    public function postComment(Request $request)
    {
        $messages = [
            'nickname.required' => '请填写你的名字！',
            'content.required' => '请填写要发布的内容！',
            'captcha.required' => '请填写验证码，以证明你不是机器人！',
            'captcha.captcha' => '验证码错误！',
        ];

        if ($request->method() == 'POST'){
            $this->validate($request,[
                'nickname' => 'required',
                'content' => 'required',
                'captcha' => 'required|captcha',
            ], $messages);

            $result = DB::table('guestbook')->insert([
                'nickname' => $request['nickname'],
                'website' => $request['website'],
                'content' => $request['content'],
                'ip' => $request->getClientIp(),
                'is_audit' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if ($result) {
                return redirect()->back()->with(['info' => '发布成功！']);
            }
        }

        return redirect()->back()->with(['info' => '发布失败！']);
    }
}