<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
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
        'first_travel_url',
        'total',
    ];

    public function getList()
    {
        $list = $this->latest('latest')->paginate(10);
        return $list;
    }

    public function getAllDestination()
    {
        return $this->all();
    }

    public function travel()
    {
        return $this->hasMany('App\Models\Travel', 'destination_id');
    }

    //目的地首页url
    public function getUrlAttribute()
    {
        return route('index.travel') . '/' . $this->slug . '/list';
    }

    public function getTotalAttribute()
    {
        return $this->travel()->count();
    }

    //目的地slug
    public function getDestinationSlugById($destinationId)
    {
        $result = $this->find($destinationId, ['slug']);
        return $result['slug'];
    }
}
