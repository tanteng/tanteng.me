<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resume
 * @mixin \Eloquent
 * @package App\Models
 */
class Resume extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'content',
        'status',
        'version',
    ];
}
