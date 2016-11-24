<?php
namespace App\Http\Controllers;

use App\Jobs\MyQueue;
use App\Jobs\MyQueue2;

class TestController extends Controller
{
    public function queue()
    {
        $this->dispatch(new MyQueue(['name' => 'tanteng']));
        dump('dispatch queue1.');
    }

    public function httpsTest()
    {
        $navFlag = 'home';
        return view('index.httptest', compact('navFlag'));
    }
}