<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Travel
 * @mixin \Eloquent
 * @package App\Models
 */
class Travel extends Model
{
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
     * 根据slug获取游记
     * @return Model|static
     */
    public function detailInfo($slug)
    {
        $detail = Cache::remember('travel.detail.slug.' . $slug, 600, function () use ($slug) {
            $item = self::where('slug', $slug)->firstOrFail();
            $item->show_date = $item->begin_date->toDateString();
            return $item->toArray();
        });
        return $detail;
    }

    /**
     * 同一个目的地的更多游记
     * @param $id
     * @param $destinationId
     * @param $num
     * @return mixed
     */
    public function travelListById($id, $destinationId, $num)
    {
        $travelList = Cache::remember('travel.list.except.id.' . $id, 600, function () use ($id, $destinationId, $num) {
            $data = [];
            $list = self::where('id', '<>', $id)->where('destination_id', $destinationId)->latest('begin_date')->take($num)->get();
            foreach ($list as $item) {
                $item->time_before = $item->begin_date->diffForHumans();
                $data[] = $item->toArray();
            }
            return $data;
        });
        return $travelList;
    }

    /**
     * 根据destination_id获取游记列表
     * @param $destinationId
     * @return mixed
     */
    public function travelListByDestinationId($destinationId)
    {
        $travelList = Cache::remember('travel.list.by.destination.id.' . $destinationId, 600, function () use ($destinationId) {
            $list = self::where('destination_id', $destinationId)->orderBy('begin_date', 'desc')->get();
            $travel = [];
            foreach ($list as $item) {
                $item->time_before = $item->begin_date->diffForHumans();
                $travel[] = $item->toArray();
            }
            return $travel;
        });
        return $travelList;
    }

    /**
     * 最新游记
     * @param $nums
     * @return mixed
     */
    public function latestTravel($nums)
    {
        $data = Cache::remember('travel.latest.num.' . $nums, 1200, function () use ($nums) {
            $data = [];
            $list = self::latest('begin_date')->take($nums)->get();
            foreach ($list as $item) {
                $item->time_before = $item->begin_date->diffForHumans();
                $data[] = $item->toArray();
            }
            return $data;
        });
        return $data;
    }

    /**
     * 每个目的地的游记总数
     * @return array
     */
    public function getTravelNumsGroupByDestination()
    {
        $data = Cache::remember('travel.nums.groupby.destination.id', 300, function () {
            $travelNums = [];
            $result = $this->groupBy('destination_id')->get(['destination_id', DB::raw('count(*) as total')]);
            foreach ($result as $item) {
                $travelNums[$item->destination_id] = $item->total;
            }
            return $travelNums;
        });
        return $data;
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
