<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="description" content="@yield('description')">
    <link href="//cdn.tanteng.me" rel="dns-prefetch">
    <link href="//cdn.tanteng.me{{ elixir('dist/css/cover.css') }}" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="http://www.tanteng.me/" />
</head>
<body>

@yield('content')

<script src="//cdn.tanteng.me/dist/js/all.js"></script>
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
