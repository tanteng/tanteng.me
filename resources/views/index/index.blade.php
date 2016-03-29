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
                        <p>主要从事PHP开发，熟悉Laravel、ThinkPHP、CI等框架，熟悉Linux开发环境，以及MySQL数据库设计及分库分表，掌握前端jQuery和css等，了解服务器及Nginx的基本配置和用法。有大型网站的开发经验，熟悉redis，memcache，对Python很感兴趣并有所研究。</p>
                    </div>
                </div>

                <div class="mastfoot">
                    <p><a href="mailto:tanteng@tanteng.me"><span class="glyphicon glyphicon-envelope"></span> tanteng@tanteng.me</a> 鄂ICP备14007278号</p>
                </div>
            </div>

        </div>

    </div>
</div>
@stop