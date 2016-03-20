<?php

namespace App\Models;

use Corcel\Post as Corcel;

class Wp extends Corcel
{
    protected $connection = 'wordpress';
    protected $domain = 'http://blog.tanteng.me/';

    //重写获取wordpress文章url方法
    public function getUrlAttribute()
    {
        return $this->domain.date('Y/m/',strtotime($this->post_date)).$this->slug.'/';
    }
}
