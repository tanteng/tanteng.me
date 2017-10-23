<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

/**
 * Class Destination
 * @mixin \Eloquent
 * @package App\Models
 */
class Destination extends Model
{
    /**
     * 目的地表
     * @var string
     */
    protected $table = "travel_destination";

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

    protected $appends = [
        'url',
    ];

    /**
     * 目的地列表
     * @param $nums
     * @return mixed
     */
    public function getList()
    {
        $data = Cache::remember('destination.list', 600, function () {
            $cache = [];
            $list = $this->latest('latest')->get();
            foreach ($list as $item) {
                $cache[$item['id']] = $item->toArray();
            }
            return $cache;
        });

        return $data;
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
     * 根据slug获取目的地
     * @param $slug
     * @return mixed
     */
    public function getDestinationBySlug($slug)
    {
        $destination = Cache::remember('destination.slug.info.' . $slug, 600, function () use ($slug) {
            return self::where('slug', $slug)->firstOrFail()->toArray();
        });
        return $destination;
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
