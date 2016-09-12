<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="description" content="@yield('description')">
    <link href="//oddgb63aa.qnssl.com" rel="dns-prefetch">
    <link href="{{ cdn(elixir('dist/css/cover.css')) }}" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="http://www.tanteng.me/" />
</head>
<body>

@yield('content')

<script src="{{ cdn(elixir('dist/js/all.js')) }}"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?a9ca60799a83235805e501810a3f895c";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
