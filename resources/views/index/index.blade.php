@extends('layouts.cover')

@section('title', 'tanteng.me')
@section('description', 'Welcome to tanteng.me!')
@section('content')
<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">
            <div class="masthead clearfix inner">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
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
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/resume">Resume</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="inner cover">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img class="img-circle" src="http://cdn.tanteng.me/assets/images/avatar.jpg" alt="avatar" width="140" height="140">
                        <h2>谈腾</h2>
                        <p>从事PHP开发，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery等前端技术，较好理解面向对象的思想，注重代码规范和性能。有大型网站开发经验，熟悉Linux环境，对Nginx等服务器端配置和优化有所研究。</p>
                        <p><a class="btn btn-default" href="/resume" role="button">更多</a></p>
                    </div>
                </div>

                <div class="mastfoot">
                    <p>鄂ICP备14007278号</p>
                </div>
            </div>

        </div>

    </div>
</div>
@stop