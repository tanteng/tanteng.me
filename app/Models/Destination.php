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
        'like'
    ];

    protected $appends = [
        'url',
    ];

    public function getList()
    {
        return $this->latest('updated_at')->paginate(10);
    }

    public function getAll()
    {
        return $this->all();
    }

    public function travel()
    {
        return $this->hasMany('App\Models\Travel', 'destination_id');
    }

    public function getUrlAttribute()
    {
        return route('travel.index').'/'.$this->slug;
    }
}
