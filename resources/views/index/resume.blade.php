@extends('layouts.default')

@section('title', 'Resume')
@section('description', '谈腾的简历')
@section('content')
<div class="container">
    <div class="page-header">
        <h1>我的简历 <small>PHP工程师</small></h1>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <p class="text-center"><img class="img-circle" src="http://cdn.tanteng.me/assets/images/avatar.jpg" alt="avatar" width="140" height="140"></p>
            <h2 class="text-center">谈腾</h2>
            <p class="text-center">PHP工程师 · 深圳卷皮网络科技有限公司</p>
            <p class="text-center">男 | 26岁 | 本科 | 3年工作经验 | 深圳</p>
            <p class="text-center">15012801031 | tanteng@qq.com</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>工作经历</h3>
            <h4>深圳卷皮网络科技有限公司</h4>
            <p>2015.3——2015.9 武汉奇米网络科技有限公司（卷皮网武汉总部）财务支撑组</p>
            <p>主要负责或参与的业务：</p>
            <ul>
                <li>商品报名</li>
                <li>买家帮助中心</li>
                <li>商家售后、订单、批量发货</li>
                <li>商家资金相关需求</li>
                <li>商家资金相关需求</li>
                <li>商家结算系统</li>
            </ul>
            <p>2015.9——至今 深圳卷皮网络科技有限公司 支付结算组</p>
            <p>主要负责或参与的业务：</p>
            <ul>
                <li>鹰眼系统PHP增加报文项</li>
                <li>双12活动后端支持</li>
                <li>JAVA服务化升级PHP接口改造</li>
                <li>财务系统</li>
            </ul>
            <p>以上项目中涉及到的技术：</p>
            <ul>
                <li>Redis的使用</li>
                <li>HTTPSQS消息系统队列，用于异步任务</li>
                <li>MongoDB存取文件</li>
                <li>数据库的设计、分表、性能优化等</li>
                <li>Shell脚本计划任务</li>
            </ul>

            <h4 class="margin-top15">武汉快游科技有限公司</h4>
            <ol>
                <li>基于PHPCMS开源系统二次开发软件下载站、单机游戏站、页游综合站等整站开发，包括前后台功能的二次开发，熟悉CMS系统的各种功能开发。</li>
                <li>使用ThinkPHP框架开发的一套广告联盟系统，该系统提供各种类型的广告给其他网站，帮助推广公司的游戏或者软件产品，按点击量、下载量等统计并支付推广费用，有完善的前台和后台系统。</li>
            </ol>

            <h3>教育经历</h3>
            <div class="row">
                <div class="col-md-1">
                    <img class="img-rounded" src="http://cdn.tanteng.me/uploads/2016/04/wust.jpeg" alt="武汉科技大学" width="70" height="70">
                </div>
                <div class="col-md-4">
                    <h4>武汉科技大学</h4>
                    <p>本科·计算机科学与技术·2013年毕业</p>
                </div>
            </div>

            <h3>自我描述</h3>
            <p>从事PHP开发，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery等前端技术，较好理解面向对象的思想，注重代码规范和性能。有大型网站开发经验，熟悉Linux环境，对Nginx等服务器端配置和优化有所研究。</p>
        </div>
    </div>
</div>
@endsection