<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30
 * Time: 15:45
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

class QiniuController extends Controller
{
    public function index()
    {
        return view('admin.upload');
    }

    public function postUpload(Request $request)
    {
        $hasFile = $request->hasFile('file');
        if (!$hasFile) {
            die('没有上传文件！');
        }
        $file = $request->file('file');
        $disk = QiniuStorage::disk('qiniu');
        $filename = 'uploads/' . date('Y/m/') . time() . '.' . $file->getClientOriginalExtension();
        $disk->put($filename, file_get_contents($file->getRealPath()));
        echo 'http://cdn.tanteng.me/' . $filename;
    }
}