@extends('layouts.default')

@section('title', 'Blog - tanteng.me')
@section('description', 'Welcome to tanteng.me!')
@section('canonical', 'http://www.tanteng.me/blog')
@section('content')

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">tanteng.me</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">About</a></li>
                        <li><a href="#">About Me</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>
                <li class="active"><a href="/blog">Blog</a></li>
                <li><a href="/resume">Resume</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

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

<footer class="footer">
    <div class="container">
        <p>Powered By:</p>
        <ul class="list-inline">
            <li><span class="label label-info">阿里云</span></li>
            <li><span class="label label-info">七牛云</span></li>
            <li><span class="label label-info">CentOS 7</span></li>
            <li><span class="label label-info">PHP 7</span></li>
            <li><span class="label label-info">Nginx 1.8</span></li>
            <li><span class="label label-info">MariaDB 10.1</span></li>
            <li><span class="label label-info">Redis 3.0</span></li>
            <li><span class="label label-info">Laravel 5.2</span></li>
            <li><span class="label label-info">Bootstrap 3</span></li>
            <li><span class="label label-info">WordPress</span></li>
        </ul>
        <p><a href="mailto:tanteng@tanteng.me"><span class="glyphicon glyphicon-envelope"></span> tanteng@tanteng.me</a> 鄂ICP备14007278号</p>
    </div>
</footer>
@stop