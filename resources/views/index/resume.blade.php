@extends('layouts.default')

@section('title', 'Resume')
@section('description', '谈腾的简历，PHP开发工程师，目前在深圳工作，3年工作经验，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery等前端技术。主要负责或参与的业务：商品报名，商家售后、订单、批量发货，商家资金相关需求，商家结算系统，财务系统。')
@section('canonical', 'http://www.tanteng.me/resume')
@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-file"></span> 简历 <small>Resume</small></h1>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <p class="text-center"><img class="img-circle" src="http://cdn.tanteng.me/assets/images/avatar.jpg" alt="avatar" width="140" height="140"></p>
            <h2 class="text-center">谈腾</h2>
            <p class="text-center">PHP工程师 · 深圳迅雷网络技术有限公司</p>
            <p class="text-center">男 | 26岁 | 本科 | 3年工作经验 | 深圳</p>
            <p class="text-center">15012801031 | tanteng@qq.com</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>自我简介</h3>
            <p>从事PHP开发，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery，css等前端技术，能较好理解面向对象的思想，注重代码的规范和性能。有大型网站开发经验，熟悉Linux环境下的开发，对Nginx等服务器端配置和优化有所了解，另外对Python比较感兴趣并有所研究。</p>

            <h3>工作经历</h3>
            <h4>深圳迅雷网络技术有限公司</h4>
            <p>2016.4——至今</p>
            <code>//TODO</code>

            <h4>深圳卷皮网络科技有限公司</h4>
            <p>2015.3——2015.9 武汉奇米网络科技有限公司（卷皮网武汉总部）财务支撑组</p>
            <p>主要负责或参与的业务：</p>
            <ul>
                <li>商品报名</li>
                <li>买家帮助中心</li>
                <li>商家售后、订单、批量发货</li>
                <li>商家资金</li>
                <li>商家结算系统</li>
            </ul>
            <p>2015.9——2016.4 深圳卷皮网络科技有限公司 支付结算组</p>
            <p>主要负责或参与的业务：</p>
            <ul>
                <li>鹰眼系统PHP支持</li>
                <li>双12活动&3.7女生节API接口开发</li>
                <li>JAVA服务化升级PHP接口改造</li>
                <li>财务系统</li>
            </ul>
            <p>以上项目中涉及到的技术：</p>
            <ul>
                <li>Redis的使用</li>
                <li>消息队列，用于异步任务</li>
                <li>MongoDB存取文件</li>
                <li>数据库的设计、分表、性能优化等</li>
                <li>Shell脚本计划任务</li>
            </ul>

            <h4 class="margin-top15">武汉快游科技有限公司</h4>
            <ol>
                <li>基于PHPCMS进行CMS系统的二次开发，软件下载站9553.com、单机游戏站99danji.com、页游门户等整站开发，包括前后台功能的开发。网站之前是asp+mssql，改成php+mysql，进行数据的转换，保证数据完整和正确，以及第三方接口的使用等。</li>
                <li>基于ThinkPHP框架开发的一套广告联盟系统，该系统提供不同类型的广告给其他网站，帮助推广公司的游戏或者软件产品，按点击量、下载量等统计并支付推广费用，有完善的前台和后台系统。</li>
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

            <h3>其他技能</h3>
            <p>熟悉Linux开发环境，本地环境使用Vagrant+VirtualBox搭建的虚拟机，使用CentOS或Ubuntu操作系统，会部署PHP+MySQL+Redis+Git+Composer等，对Nginx的基本配置和服务器端性能调优有了解。熟悉Git和SVN版本控制工具。</p>
            <ul class="list-unstyled">
                <li><span class="label label-primary">PHP</span></li>
                <li><span class="label label-primary">MySQL</span></li>
                <li><span class="label label-primary">Redis</span></li>
                <li><span class="label label-primary">MongoDB</span></li>
                <li><span class="label label-primary">消息队列</span></li>
                <li><span class="label label-primary">jQuery</span></li>
                <li><span class="label label-primary">CSS</span></li>
                <li><span class="label label-primary">Python</span></li>
            </ul>
            <p>计划学习的方向：服务器方面的部署，WEB集群，Redis集群等，负载均衡，以及服务器端性能优化方面的知识。</p>


            <h3>个人爱好</h3>
            <p>旅行，看书</p>
        </div>
    </div>
</div>
@endsection