<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/3/5
 * Time: 23:44
 */

namespace App\Http\Controllers;


use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;
use App\Models\Wp;

class TestController extends Controller
{
    //测试Redis
    public function testRedis()
    {

        $options = [
            'condition1' => [
                'option1' => 3,
                'option2' => 5,
                'potion3' => [4, 'or', 5],
            ]
        ];
        dump($options);
        echo json_encode($options);
        exit;


        $testRedisKey = 'com.tanteng.me.redis.test';
        Redis::set($testRedisKey, 'test');
        Redis::expire($testRedisKey, 1800);
        $value = Redis::get($testRedisKey);
        dump($value);
    }

    //测试memcache
    public function testMemcache()
    {
        Cache::store('memcached')->put('tanteng', 'tantengmemcache', 4);
        $value = Cache::store('memcached')->get('tanteng');
        dd($value);
    }

    //测试闭包传参及use使用外部变量
    public function testClosure($t1, $t2)
    {
        $closure = function ($param1, $param2) use ($t1, $t2) {
            echo $param1 . $param2 . $t1 . $t2;
        };
        $this->execClosure('test.closure', $closure);
    }

    //执行闭包函数
    protected function execClosure($name, Closure $closure)
    {
        echo 'Closure func name:' . $name;
        echo '<br>';
        $closure('p1', 'p2');
    }

    //斐波拉契数列
    public function fib($n = null)
    {
        if ($n > 100) {
            die('Number must <= 100!');
        }
        $key = 'com.tanteng.me.test.fib.string';
        $value = Redis::hget($key, $n);
        if ($value) {
            echo $value;
            return;
        }
        $fib = '';
        for ($i = 0; $i <= $n; $i++) {
            $fib = $fib . ' ' . $this->getNum($i);
        }
        echo $fib;
        Redis::hset($key, $n, $fib);
        Redis::expire($key, 1800);
    }

    private function getNum($n)
    {
        $key = 'com.tanteng.me.test.fib.num';
        $value = Redis::hget($key, $n);
        if ($value) {
            return $value;
        }
        if ($n == 0) $result = 1;
        if ($n == 1) $result = 1;
        if ($n > 1) {
            $result = $this->getNum($n - 2) + $this->getNum($n - 1);
        }
        Redis::hset($key, $n, $result);
        Redis::expire($key, 1800);
        return $result;
    }

    //测试写入数据到临时文件并保存到其他地方
    public function testFputcsv()
    {
        $tpname = tempnam(sys_get_temp_dir(), 'DATA');
        echo $tpname;
        echo '<br>';
        $fp = fopen($tpname, 'w');
        for ($i = 0; $i < 1600000; $i++) {
            fputcsv($fp, ['dd', 'xx', '23', '56', '76', '89', '43', '2', '3', '56']);
        }
        fclose($fp);
        $newFile = storage_path('app/test.csv');
        rename($tpname, $newFile);
        echo $newFile;
    }

    //laravel查询wordpress文章
    public function testWp()
    {
        $post = Wp::find(8772);
        //dd($post);
        dump($post->meta());
    }

    //创建初始化管理员
    public function createAdmin($password)
    {
        $admin_password = Config::get('app.admin_password');
        if ($admin_password == null || $password != $admin_password) {
            echo 'No permission!';
            exit;
        }
        $data = [
            'name' => Config::get('app.admin_name'),
            'email' => Config::get('app.admin_email'),
            'password' => $admin_password,
        ];

        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //测试接收curl方式post文件并保存
    public function testCurl(Request $request)
    {
        $rawInput = $request->getContent();
        if ($rawInput) {
            return ['result' => 200, 'msg' => 'success', 'data' => $rawInput];
        } else {
            return ['result' => 201, 'msg' => 'fail'];
        }

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $target = $file->move(storage_path('app') . '/uid', $filename);
            if ($target) {
                return json_encode(['status' => 0, 'msg' => 'curl post file success. target:' . $target]);
            }
        }
        $request = $request->input('request');
        return json_encode(['status' => 0, 'msg' => 'connection success.', 'data' => ['request' => $request]]);
    }

    //test preg_replace_callback
    public function preg()
    {
        $content = 'I want {water} and {food}';
        $new = preg_replace_callback('/\{(\w+)\}/', [$this, 'replace'], $content);
        dump($new);
    }

    //正则替换callback
    public function replace($matches)
    {
        $replace = [
            'water' => 'travel',
            'hehe' => 'coding',
        ];
        if (isset($replace[$matches[1]])) {
            return $replace[$matches[1]];
        }
        return $matches[0];
    }
}