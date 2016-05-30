<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;

class Travel extends Model
{
    protected $table = 'travel';

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

    public $appends = [
        'url'
    ];

    public function destination()
    {
        return $this->belongsTo('\App\Models\Destination', 'destination_id');
    }

    public function travelList($destinationId)
    {
        return $this->where('destination_id', $destinationId)->latest('id')->paginate(10);
    }

    public function getUrlAttribute()
    {
        return route('index.travel') . '/' . $this->destination()->value('slug') . '/' . $this->slug;
    }
}
