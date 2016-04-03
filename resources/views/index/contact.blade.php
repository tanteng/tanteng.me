@extends('layouts.default')

@section('title', 'Contact')
@section('description', '联系方式，社交网络，微博，github')
@section('canonical', 'http://www.tanteng.me/contact')
@section('head')
        <!--引用百度地图API-->
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-phone"></span> 联系我 <small>Contact</small></h1>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>社交网络</h2>
            <div class="list-group sns">
                <a href="http://weibo.com/tanteng" target="_blank" class="list-group-item"><span class="weibo sns_size"></span> 新浪微博</a>
                <a href="https://cn.linkedin.com/in/tanteng" class="list-group-item" target="_blank"><span class="linked sns_size"></span> Linked</a>
                <a href="https://www.zhihu.com/people/tanteng" target="_blank" class="list-group-item"><span class="zhihu sns_size"></span> 知乎</a>
                <a href="https://github.com/tanteng" target="_blank" class="list-group-item"><span class="github sns_size"></span> Github</a>
            </div>

            <h2>有话要说</h2>
            <form>
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="nick_name" id="nickName" placeholder="请输入名字">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="website" id="website" placeholder="请输入网址(可不填)">
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" name="content" placeholder="请输入内容"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="captcha" placeholder="请输入验证码">
                        <p class="help-block">{!! captcha_img() !!}</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>

            <h2>位置</h2>
            <!--百度地图容器-->
            <div style="height:360px;border:#ccc solid 1px;" id="dituContent"></div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.93695,22.539017);//定义一个中心点坐标
        map.centerAndZoom(point,15);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }


    initMap();//创建和初始化地图
</script>
@endsection