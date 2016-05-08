<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','后台') - Admin - tanteng.me</title>
    <link href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/assets/admin/dist/css/timeline.css" rel="stylesheet">
    <link href="/assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    @include('admin.nav')
    @yield('content')
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/assets/admin/dist/js/sb-admin-2.js"></script>
@yield('js')
</body>
</html>
