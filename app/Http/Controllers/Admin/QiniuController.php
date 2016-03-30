<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/30
 * Time: 15:45
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

class QiniuController extends Controller
{
    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }

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
        $originalName = $file->getClientOriginalName();
        list($original,) = explode('.', $originalName);
        $disk = QiniuStorage::disk('qiniu');
        $key = 'uploads/' . date('Y/m/') . $original . '.' . $file->getClientOriginalExtension();
        $disk->put($key, file_get_contents($file->getRealPath()));

        $data = [
            'key' => $key,
            'url' => 'http://cdn.tanteng.me/' . $key,
            'type' => $file->getClientMimeType(),
            'size' => $file->getSize()
        ];

        $this->attachment->create($data);
        return redirect('/admin/attachment');
    }

    //附件列表
    public function showList()
    {
        $lists = $this->attachment->attachmentList();
        //dd($lists);
        return view('admin.attachment', compact('lists'));
    }
}