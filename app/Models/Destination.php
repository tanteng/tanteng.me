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
        'first',
    ];

    public function getList()
    {
        $list = $this->latest('updated_at')->paginate(10);
        return $list;
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
        $firstSlug = $this->travel()->latest('id')->value('slug');
        return route('travel.index') . '/'.$firstSlug;
    }

    public function getFirstAttribute()
    {
        return $this->travel()->latest('id')->first();
    }
}