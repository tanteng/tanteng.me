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
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="http://blog.tanteng.me">Blog</a></li>
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
                        <img class="img-circle img-responsive" src="http://cdn.tanteng.me/assets/images/avatar.jpg" alt="avatar" width="140" height="140">
                        <h2>谈腾</h2>
                        <p>主要从事PHP后端开发，熟悉ThinkPHP、Laravel、CI等框架，熟悉jQuery、CSS等前端技术，能较好理解MVC架构和面向对象的思想，注重代码的规范和效率，熟悉MySQL数据库及性能优化。对电商网站业务比较熟悉，有大型网站的开发经验，熟悉redis，memcache的用法，对Python很感兴趣并有所研究。</p>
                    </div>
                </div>

                <div class="mastfoot">
                    <p>Powered By:</p>
                    <ul class="list-inline">
                        <li><span class="label label-info">阿里云ECS</span></li>
                        <li><span class="label label-info">CentOS 7</span></li>
                        <li><span class="label label-info">PHP 7</span></li>
                        <li><span class="label label-info">Nginx</span></li>
                        <li><span class="label label-info">MariaDB</span></li>
                        <li><span class="label label-info">Redis 3.0</span></li>
                        <li><span class="label label-info">Laravel 5.2</span></li>
                        <li><span class="label label-info">Bootstrap 3</span></li>
                    </ul>
                    <p><a href="mailto:tanteng@tanteng.me"><span class="glyphicon glyphicon-envelope"></span> tanteng@tanteng.me</a> 鄂ICP备14007278号</p>
                </div>
            </div>

        </div>

    </div>
</div>
@stop