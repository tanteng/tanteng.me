<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    protected $table = 'english_phrase';

    protected $fillable = [
        'phrase', 'content', 'seo_title', 'description', 'slug', 'tag',
    ];
}
