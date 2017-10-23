<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - tanteng.me</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="/vendor/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/vendor/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/vendor/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/vendor/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="/vendor/plugins/morris/morris.css">
    <link rel="stylesheet" href="/vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="/vendor/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/vendor/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/admin/admin.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="{{ url('/admin') }}" class="logo">
            <span class="logo-mini"><strong>t</strong></span>
            <span class="logo-lg"><strong>t</strong>an<strong>t</strong>eng.me</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @if (!Auth::guard('admin')->guest())
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/vendor/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="/vendor/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>{{ Auth::guard('admin')->user()->name }} - Web Developer</p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            @if (!Auth::guard('admin')->guest())
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/vendor/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
            @endif
            <ul class="sidebar-menu">
                <li class="header">菜单</li>
                <li class="{{ Request::is('*user*') || Request::is('*role*') || Request::is('*permission*') ? 'active ' : '' }}treeview">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>用户管理</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li{{ Request::is('*user*') ? ' class=active' : '' }}><a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> 用户列表</a></li>
                        <li{{ Request::is('*role*') ? ' class=active' : '' }}><a href="{{ url('admin/role') }}"><i class="fa fa-circle-o"></i> 角色列表</a></li>
                        <li{{ Request::is('*permission*') ? ' class=active' : '' }}><a href="{{ url('admin/permission') }}"><i class="fa fa-circle-o"></i> 权限列表</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('*settings*') ? 'active ' : '' }}treeview">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>系统管理</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li{{ Request::is('*settings*') ? ' class=active' : '' }}><a href="{{ url('admin/settings') }}"><i class="fa fa-circle-o"></i> 网站设置</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('*resume*') ? 'active ' : '' }}treeview">
                    <a href="javascript:;">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>简历管理</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li{{ Request::is('*resume*') ? ' class=active' : '' }}><a href="{{ url('admin/resume') }}"><i class="fa fa-circle-o"></i> 我的简历</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('*travel*') ? 'active ' : '' }}treeview">
                    <a href="javascript:;">
                        <i class="fa fa-camera-retro"></i>
                        <span>游记管理</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li{{ Request::is('*travel') ? ' class=active' : '' }}><a href="{{ url('admin/travel') }}"><i class="fa fa-circle-o"></i> 游记列表</a></li>
                        <li{{ Request::is('*travel/create*') ? ' class=active' : '' }}><a href="{{ url('admin/travel/create') }}"><i class="fa fa-circle-o"></i> 添加游记</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

    @yield('main_content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
        </div>
        <strong>Copyright &copy; 2014-{{ date('Y') }} <a href="https://www.tanteng.me" target="_blank">tanteng.me</a>.</strong> All rights
        reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script src="https://cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/raphael/2.1.0/raphael-min.js"></script>
<script src="/vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="/vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/vendor/plugins/knob/jquery.knob.js"></script>
<script src="https://cdn.bootcss.com/moment.js/2.11.2/moment.min.js"></script>
<script src="/vendor/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/vendor/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/vendor/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/vendor/plugins/fastclick/fastclick.js"></script>
<script src="/vendor/dist/js/app.min.js"></script>
<script src='https://cdn.bootcss.com/tinymce/4.5.2/tinymce.min.js'></script>
@yield('js')
</body>
</html>
