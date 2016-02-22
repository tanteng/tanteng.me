<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/22
 * Time: 12:06
 */

namespace App\Http\Controllers;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        echo 'show';
    }
}