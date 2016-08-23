<?php
namespace App\Http\Controllers;

class TestController extends Controller
{
    public function test()
    {
        //测试rebase，再提交一次修改
    }

    public function testCopy()
    {
        //提交在分支上提交的修改，此时主分支上也有了新的提交，两个分支都在前进
    }
}