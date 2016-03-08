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
}