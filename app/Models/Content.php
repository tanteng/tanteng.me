<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'seo_title',
        'slug',
        'description',
        'class_id',
        'tag_id',
        'content',
        'type'
    ];

    protected $dates = [
        'updated_at'
    ];

    /**
     * 根据 slug 获取内容
     * @param $slug
     * @return array
     */
    public function getContent($slug)
    {
        $content = self::where('slug', $slug)->firstOrFail();
        return $content;
    }
}
