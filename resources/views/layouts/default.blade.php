<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title') - tanteng.me</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <link href="//cdn.tanteng.me" rel="dns-prefetch">
    <link href="//cdn.tanteng.me/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.tanteng.me/assets/styles/style.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="@yield('canonical')" />
    <script src="//cdn.tanteng.me/assets/js/pace.min.js"></script>
    @yield('head')
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="top:0;">
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
            <ul class="nav navbar-nav navbar-right">
                <li @if($navFlag == 'home')class="active" @endif><a href="/">Home</a></li>
                <li @if($navFlag == 'blog')class="active" @endif><a href="/blog">Blog</a></li>
                <li @if($navFlag == 'resume')class="active" @endif><a href="/resume">Resume</a></li>
                <li @if($navFlag == 'contact')class="active" @endif><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="marquee"></div>

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
<script src="//cdn.tanteng.me/assets/bootstrap/js/bootstrap.min.js"></script>

@yield('js')

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
