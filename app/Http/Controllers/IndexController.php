<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/3/29
 * Time: 21:48
 */

namespace App\Http\Controllers;


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
}