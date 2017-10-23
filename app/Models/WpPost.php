<?php

namespace App\Models;

use Corcel\Post as Corcel;

class WpPost extends Corcel
{
    protected $connection = 'wordpress';
    protected $domain = 'https://blog.tanteng.me/';

    /**
     * 构造URL
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->domain . date('Y/m/', strtotime($this->post_date)) . $this->slug . '/';
    }
}
