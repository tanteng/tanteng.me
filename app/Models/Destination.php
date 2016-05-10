<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = "travel_destination";

    protected $fillable = ['destination', 'description', 'cover_image', 'year', 'score', 'like'];

    public function getList()
    {
        return $this->latest('updated_at')->paginate(10);
    }

    public function getAll()
    {
        return $this->all();
    }
}
