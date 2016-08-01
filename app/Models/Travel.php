<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class Travel extends Model
{
    /**
     * 游记表
     * @var string
     */
    protected $table = 'travel';

    /**
     * 批量赋值
     * @var array
     */
    protected $fillable = [
        'destination_id',
        'slug',
        'title',
        'seo_title',
        'description',
        'cover_image',
        'begin_date',
        'end_date',
        'content',
        'score'
    ];

    /**
     * Carbon时间
     * @var array
     */
    protected $dates = [
        'begin_date',
        'end_date',
    ];

    /**
     * 自定义字段
     * @var array
     */
    public $appends = [
        'url'
    ];

    /**
     * 一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    /**
     * 获取每个目的地的游记总数
     * @return array
     */
    public function getTravelNumsGroupByDestination()
    {
        $travelNums = [];
        $result = $this->groupBy('destination_id')->get(['destination_id', DB::raw('count(*) as total')]);
        foreach ($result as $item) {
            $travelNums[$item->destination_id] = $item->total;
        }
        return $travelNums;
    }

    /**
     * 游记详情页url
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('index.travel') . '/' . $this->slug;
    }
}
