@extends('layouts.default')

@section('title', 'Blog - tanteng.me')
@section('description', '最新小谈博客文章，小谈博客是一个专注WEB开发的技术博客。')
@section('canonical', 'http://www.tanteng.me/blog')
@section('content')
<div class="container">
    <div class="row">
        @foreach($newPosts as $post)
        <div class="col-md-4 col-md-offset-1">
            <h3><a href="{{ $post->url }}" target="_blank">{{ $post->post_title }}</a></h3>
            <span>{{ $post->post_date }}</span>
        </div>
        @endforeach
    </div>

    <div class="row text-center margin-top15">
        <a class="btn btn-default" href="http://blog.tanteng.me/page/2" role="button">更多</a>
    </div>
</div>
@stop