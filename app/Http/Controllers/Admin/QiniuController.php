<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30
 * Time: 15:45
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;

class QiniuController extends Controller
{
    public function test()
    {
        $disk = QiniuStorage::disk('qiniu');
        dd($disk);
    }
}