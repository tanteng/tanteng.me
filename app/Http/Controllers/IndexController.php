<?php

namespace App\Http\Controllers;


use App\Models\Destination;
use App\Models\Options;
use App\Models\Travel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $navFlag = 'home';
        $introduce = Cache::store('redis')->remember('options.introduce', 10, function () {
            $value = Options::where('name', 'introduce')->value('value');
            return $value;
        });
        return view('index.index', compact('navFlag', 'introduce'));
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


    /**
     * 生成sitemap地图
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        $data = Cache::remember('sitemap', 30, function () {
            return [
                'travels' => Travel::all(),
                'destinations' => Destination::all()
            ];
        });
        $travels = $data['travels'];
        $destinations = $data['destinations'];
        $data = compact('travels', 'destinations');
        $sitemap = view('index.sitemap', $data);
        return Response($sitemap, '200')->header('Content-Type', 'text/xml');
    }

    /**
     * github提交历史
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function commitsHistory()
    {
        $navFlag = '';
        return view('index.commits', compact('navFlag'));
    }

    /**
     * Github上提交版本历史
     * @method POST
     * @return string
     */
    public function gitCommitHistory()
    {
        $client = new Client([
            'base_uri' => 'https://api.github.com/',
        ]);
        $uri = 'repos/tanteng/tanteng.me/commits';
        $query['client_id'] = Config::get('github.client_id');
        $query['client_secret'] = Config::get('github.client_secret');
        try {
            $result = Cache::store('redis')->remember('git.commit.history', 60, function () use ($client, $uri, $query) {
                return $client->get($uri, $query)->getBody()->getContents();
            });
        } catch (ConnectException $e) {
            return json_encode(['result' => 1001, 'msg' => '请求超时！', 'data' => $e->getMessage()]);
        }

        $result = json_decode($result, true);
        $commitHistory = [];
        foreach ($result as $item) {
            $commitHistory[] = [
                'message' => $item['commit']['message'],
                'datetime' => date('Y-m-d H:i:s', strtotime($item['commit']['committer']['date']))
            ];
        }
        return json_encode(['result' => 0, 'msg' => '请求成功！', 'data' => $commitHistory]);
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

        if ($request->method() == 'POST') {
            $this->validate($request, [
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

    /**
     * 捐赠页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function donate()
    {
        $navFlag = '';
        return view('index.donate', compact('navFlag'));
    }
}