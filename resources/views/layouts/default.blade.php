<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="description" content="@yield('description')">
    @yield('meta')
    <link href="//oddgb63aa.qnssl.com" rel="dns-prefetch">
    <link href="{{ cdn(elixir('dist/css/style.css')) }}" rel="stylesheet">
    <script src="{{ cdn(elixir('dist/js/all.js')) }}"></script>
    <link rel="icon" href="/favicon.ico">
    @if(isset($canonical))<link rel="canonical" href="{{ $canonical }}"/>@endif
    @yield('head')
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">tanteng.me</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li @if($navFlag == 'home')class="active" @endif><a href="{{ route('home') }}">Home</a></li>
                <li @if($navFlag == 'blog')class="active" @endif><a href="{{ route('index.blog') }}">Blog</a></li>
                <li @if($navFlag == 'resume')class="active" @endif><a href="{{ route('index.resume') }}">Resume</a></li>
                <li @if($navFlag == 'travel')class="active" @endif><a href="{{ route('index.travel') }}">Travel</a></li>
                <li @if($navFlag == 'contact')class="active" @endif><a href="{{ route('index.contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
        <p><a href="mailto:tanteng@tanteng.me"><span class="glyphicon glyphicon-envelope"></span> tanteng@tanteng.me</a>
            鄂ICP备14007278号 Page loaded in:{{ round(microtime(true) - LARAVEL_START, 5) }}s <a href="{{ route('git.commits') }}">版本历史</a></p>
    </div>
</footer>

@yield('js')
<script>
    (function () {
        $.scrollUp({
            animation: 'fade',
            scrollText: '回到顶部'
        });
        $('.pill-switch').addClass('active');
    })(jQuery)
</script>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?12046b0c748f019bd63e97845d980e33";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
