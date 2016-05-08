<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = "travel_destination";

    protected $fillable = ['destination', 'description'];

    public function getList()
    {
        return $this->latest('id')->paginate(10);
    }
}
