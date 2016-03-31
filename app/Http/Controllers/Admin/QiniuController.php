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
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use zgldh\QiniuStorage\QiniuStorage;

class QiniuController extends Controller
{
    private $attachment;
    private $disk;
    private $allowedExts = ["gif", "jpeg", "jpg", "png", "txt", "pdf", "doc", "rtf", "docx", "xls", "xlsx"];
    const MAX_FILE_SIZE = 5 * 1024 * 1024; //5M
    const CDN_DOMAIN = 'http://cdn.tanteng.me/';

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
        $this->disk = QiniuStorage::disk('qiniu');
    }

    //上传post请求
    public function postUpload(Request $request)
    {
        $file = $request->file('file');
        if ($request->hasFile('file') && $file && $file->isValid()) {
            $originalName = $file->getClientOriginalName();
            list($filename,) = explode('.', $originalName);
            $extension = $file->getClientOriginalExtension();
            if (!in_array(strtolower($extension), $this->allowedExts)) {
                return redirect()->back()->with(['error' => sprintf('不能上传%s格式的文件！', $extension)]);
            }

            $size = $file->getClientSize();
            if ($size > self::MAX_FILE_SIZE) {
                return redirect()->back()->with(['error' => sprintf('文件大小不能超过%dM！', self::MAX_FILE_SIZE)]);
            }

            $key = 'uploads/' . date('Y/m/') . $filename . '.' . $extension;
            $count = $this->attachment->where('key', $key)->count();
            if ($count > 0) {
                return redirect()->back()->with(['error' => '存在相同文件名的文件，请更改文件名重新上传！']);
            }

            $status = $this->disk->put($key, file_get_contents($file->getRealPath()));
            if (false === $status) {
                return redirect()->back()->with(['error' => '传文件到七牛云出错！']);
            }

            $data = [
                'key' => $key,
                'url' => self::CDN_DOMAIN . $key,
                'type' => $file->getClientMimeType(),
                'size' => $size,
            ];

            $this->attachment->create($data);
            return redirect()->back()->with(['tip' => '上传成功！']);
        }
        throw new UploadException('Error while upload file');
    }

    //附件列表
    public function showList()
    {
        $lists = $this->attachment->attachmentList();
        return view('admin.attachment', compact('lists'));
    }
}
