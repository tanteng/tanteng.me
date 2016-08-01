<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    /**
     * 目的地表
     * @var string
     */
    protected $table = "travel_destination";

    /**
     * 批量赋值字段
     * @var array
     */
    protected $fillable = [
        'destination',
        'title',
        'seo_title',
        'description',
        'cover_image',
        'year',
        'slug',
        'score',
        'latest',
        'like'
    ];

    /**
     * 自定义字段
     * @var array
     */
    protected $appends = [
        'url',
        'first_travel_url',
        'total',
    ];

    /**
     * 目的地列表
     * @param $nums
     * @return mixed
     */
    public function getList($nums)
    {
        $list = $this->latest('latest')->take($nums)->get();
        return $list;
    }

    /**
     * 定义目的地-游记的一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travel()
    {
        return $this->hasMany(Travel::class, 'destination_id');
    }

    /**
     * 目的地url
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('index.travel') . '/' . $this->slug . '/list';
    }
}
