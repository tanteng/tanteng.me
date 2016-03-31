<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Attachment extends Eloquent
{
    protected $table = 'attachment';

    protected $fillable = [
        'key',
        'url',
        'type',
        'size'
    ];

    protected $appends = [
        'size',
        'is_img'
    ];

    //媒体文件列表
    public function attachmentList()
    {
        return $this->orderBy('updated_at','desc')->paginate(15);
    }

    //文件大小
    public function getSizeAttribute()
    {
        return $this->formatBytes($this->attributes['size']);
    }

    //判断文件是否是图片
    public function getIsImgAttribute()
    {
        list($tp,) = explode('/', $this->attributes['type']);
        if ($tp == 'image') {
            return true;
        }
        return false;
    }

    //文件大小单位转换
    private function formatBytes($size)
    {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2) . $units[$i];
    }
}
