<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Attachment extends Eloquent
{
    protected $table = 'attachment';

    protected $fillable = ['key', 'url', 'type', 'size'];

    public function attachmentList()
    {
        return $this->orderBy('updated_at','desc')->take(100)->paginate(20);
    }
}
