@extends('layouts.default')

@section('title', $content['seo_title'] . '_技术分享_' . $site_name)
@section('description', '从事PHP开发，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery，css等前端技术，能较好理解面向对象的思想，注重代码的规范和性能。有大型网站开发经验，熟悉Linux环境下的开发，对Nginx等服务器端配置和优化有所了解。')
@section('canonical', 'http://www.tanteng.me/resume')
@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-file"></span> 分享
            <small>Share</small>
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <section class="header">
                <h1 class="page-header">{{ $content['title'] }}</h1>
            </section>
            <section class="content">
                {{ $content['content'] }}
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $image = $(".post-content img");
        $image.parent('p').addClass('img-width');
        $image.addClass('img-responsive center-block');
    </script>
@endsection