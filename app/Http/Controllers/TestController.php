<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/3/5
 * Time: 23:44
 */

namespace App\Http\Controllers;


use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Models\Wp;

class TestController extends Controller
{
    //测试Redis及Hscan
    public function testRedisHscan()
    {
        Redis::hmset('xxx.test', [
            'tanteng'=>32,
            'youxi'=>32,
            'ruike'=>54,
            'jimi'=>31,
            'hayou'=>909,
            'test'=>11,
            'hehe'=>87,
            'tanteng.me'=>90
        ]);
        Redis::expire('xxx.test', 1800);

        //测试hscan的使用
        $testHscan = Redis::hscan('xxx.test', 0);
        dump($testHscan);
    }

    //测试闭包传参及use使用外部变量
    public function testClosure($t1, $t2)
    {
        $closure = function ($param1, $param2) use ($t1, $t2) {
            echo $param1.$param2.$t1.$t2;
        };
        $this->execClosure('test.closure', $closure);
    }

    //执行闭包函数
    protected function execClosure($name, Closure $closure)
    {
        echo 'Closure func name:'.$name;
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
        $post = Wp::find(9569);
        //dd($post);
        echo $post->post_title;
        echo '<br>';
        echo $post->url;
    }
}