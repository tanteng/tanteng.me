<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Github API
    |--------------------------------------------------------------------------
    |
    | 在github上个人设置页面获取application授权的API id和secret，这样可以突破请求次数的限制，以及可用于Oauth登录
    |
    */
    'client_id' => env('GITHUB_ID', 0),
    'client_secret' => env('GITHUB_SECRET', 0)
];