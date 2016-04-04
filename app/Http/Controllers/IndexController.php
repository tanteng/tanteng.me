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

    public function contact()
    {
        $navFlag = 'contact';
        return view('index.contact', compact('navFlag'));
    }

    //Contact页面提交留言
    public function postComment(Request $request)
    {
        if($request->method() == 'POST'){
            $this->validate($request,[
                'nickname' => 'required',
                'content' => 'required',
                'captcha' => 'required|captcha',
            ]);

            $id = DB::table('guestbook')->insert([
                'nickname' => $request['nickname'],
                'website' => $request['website'],
                'content' => $request['content'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if($id){
                return redirect()->back()->with(['info', '发布成功！']);
            }else{
                return redirect()->back()->with(['info', '发布失败！']);
            }
        }
    }
}