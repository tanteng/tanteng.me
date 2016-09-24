<?php

namespace App\Http\Composers;


use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

class AppComposer
{
    public function compose(View $view)
    {
        $view->with('site_name', Config::get('app.site_name'));
    }
}