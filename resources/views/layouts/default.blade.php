<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <link href="//cdn.tanteng.me" rel="dns-prefetch">
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.tanteng.me/assets/styles/style.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="@yield('canonical')" />
    <!--[if lt IE 9]>
    <script src="//cdn.tanteng.me/assets/js/ie8-responsive-file-warning.js'"></script>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>

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
                <li @if($navFlag == 'home')class="active" @endif><a href="/">Home</a></li>
                <li @if($navFlag == 'blog')class="active" @endif><a href="/blog">Blog</a></li>
                <li @if($navFlag == 'resume')class="active" @endif><a href="/resume">Resume</a></li>
                <li @if($navFlag == 'contact')class="active" @endif><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>Blog!</h1>
        <p class="lead">小谈博客是一个关注WEB开发的技术博客，学习世界上最流行的WEB开发语言PHP，这里有PHP的基础知识和技术实践，学习Laravel、ThinkPHP、Yii 2等开发框架，包括MySQL数据库设计和性能优化，Redis,memcache等数据库和缓存技术，还有Linux服务器方面的知识，Nginx配置优化，负载均衡等等。</p>
        <p><a class="btn btn-primary btn-lg" href="http://blog.tanteng.me" role="button">Go</a></p>
    </div>
</div>

@yield('content')

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
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="//cdn.tanteng.me/assets/js/ie10-viewport-bug-workaround.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?12046b0c748f019bd63e97845d980e33";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
