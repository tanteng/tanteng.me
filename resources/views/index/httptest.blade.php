@extends('layouts.default')

@section('title', 'TEST HTTPS - tanteng.me')
@section('description', '测试HTTPS页面')
@section('head')
<!--引用百度地图API-->
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-phone"></span> 测试HTTPS</h1>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>测试HTTPS</h2>
            <div class="list-group sns">
                <a href="http://weibo.com/tanteng" target="_blank" class="list-group-item"><span class="weibo sns_size"></span> 新浪微博</a>
                <a href="https://cn.linkedin.com/in/tanteng" class="list-group-item" target="_blank"><span class="linked sns_size"></span> Linked</a>
                <a href="https://www.zhihu.com/people/tanteng" target="_blank" class="list-group-item"><span class="zhihu sns_size"></span> 知乎</a>
                <a href="https://github.com/tanteng" target="_blank" class="list-group-item"><span class="github sns_size"></span> Github</a>
            </div>
            <p>PS:链接可以是 HTTPS 或者 HTTP</p>

            <h2>测试引用非 HTTPS 的 js 或者 css</h2>
            <script type="text/javascript" src="http://www.tanteng.me/dist/js/all.js"></script>
        </div>
    </div>
</div>
@endsection

