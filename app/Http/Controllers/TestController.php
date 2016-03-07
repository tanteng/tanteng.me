<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/3/5
 * Time: 23:44
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    //Test Redis Hscan
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

    //Test Closure function
    public function testClosure($t1, $t2)
    {
        $closure = function () use ($t1, $t2) {
            echo $t1 . $t2;
        };
        $closure();
    }
}