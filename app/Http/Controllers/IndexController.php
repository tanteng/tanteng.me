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
        return view('index.index');
    }
}