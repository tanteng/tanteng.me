@extends('layouts.default')

@section('title', 'Resume - tanteng.me')
@section('description', '从事PHP开发，熟悉Laravel，ThinkPHP，CI等框架，熟悉MySQL，Redis，MongoDB数据库及缓存技术，熟悉jQuery，css等前端技术，能较好理解面向对象的思想，注重代码的规范和性能。有大型网站开发经验，熟悉Linux环境下的开发，对Nginx等服务器端配置和优化有所了解。')
@section('canonical', 'http://www.tanteng.me/resume')
@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-file"></span> 简历 <small>Resume</small></h1>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <p class="text-center"><img class="img-circle" src="http://oddgb63aa.qnssl.com/assets/images/avatar.jpg" alt="avatar" width="140" height="140"></p>
            <h2 class="text-center">谈腾</h2>
            <p class="text-center">PHP高级工程师 · 深圳迅雷网络</p>
            <p class="text-center">男 | 26岁 | 本科 | 3年工作经验 | 深圳</p>
            <p class="text-center"><img src="http://oddgb63aa.qnssl.com/uploads/2016/05/contact.png" alt="联系方式"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>自我简介</h3>
            <p>从事 WEB 开发，主要语言 PHP，熟悉 Laravel, ThinkPHP, CodeIgniter 等框架，对现代化的 PHP 开发比较感兴趣，对MySQL，Redis，Memcache 数据库及缓存技术都有所实践，前端方面熟悉 jQuery, CSS 等基础。</p>

            <h3>工作经历</h3>
            <h4>深圳迅雷网络技术有限公司</h4>
            <p><img src="http://oddgb63aa.qnssl.com/assets/images/xunlei-logo.jpg" alt="迅雷网络" width="118" height="112"></p>
            <p>2016.4 —— 至今</p>
            <p>主要负责触达系统后台开发，会员活动开发，代码自动发布系统开发（包括推进团队使用 git 进行项目版本控制，制定 git 使用规范和开发测试流程），参与酒窝直播平台项目,还有快鸟相关需求开发等。</p>
            <h5>一、续费触达系统</h5>
            <p>该项目是对快过期的会员以弹窗，气泡，邮件等形式进行消息的提醒，通过后台管理和推送，如弹窗类型可选择不同的模板生成页面，支持自定义页面上的文案和链接等，具体实现通过调用后端服务接口。系统核心业务是实现精细化推送，如会员等级，付费方式，注册时间，过期天数等几十个选项进行设置。</p>
            <h5>二、会员活动开发</h5>
            <p>通过开发各种各样的活动页面，吸引用户注册或充值成为会员，也可以针对迅雷会员，快鸟会员等推出各种服务。主要是一些活动逻辑的功能实现，考虑大并发的情况，使用缓存等，还有接口安全性的问题。 </p>
            <h5>三、代码自动化部署系统</h5>
            <p>项目背景是为了规范上线流程，实现自动化代码部署，支持发布到测试环境，预发布环境，线上环境等。主要原理是通过系统执行 git 或者 svn 命令拉取代码，执行运维提供的同步脚本等，并且解析命令的执行结果显示到页面。</p>
            <p>为了更好的使用该系统，推广团队使用 git 进行版本控制，从 svn 转到 git，建立 git 仓库，制定 git 使用规范和开发的流程。</p>

            <h4>深圳卷皮网络科技有限公司</h4>
            <p><img src="http://oddgb63aa.qnssl.com/assets/images/juanpi-logo.jpg" alt="卷皮网络" width="118" height="112"></p>
            <p>2015.3 —— 2016.4</p>
            <p>主要针对商家中心和财务系统相关的需求开发，负责或参与以下需求开发:</p>
            <ul>
                <li>商家中心商品报名</li>
                <li>买家帮助中心</li>
                <li>商家中心售后、订单、批量发货</li>
                <li>商家中心资金相关</li>
                <li>SOA服务化PHP支持</li>
                <li>商家结算系统</li>
                <li>大促活动后端支持</li>
                <li>财务系统</li>
            </ul>
            <p>以上需求中涉及到的技术：</p>
            <ul>
                <li>Redis的使用</li>
                <li>消息队列，用于异步任务</li>
                <li>MongoDB存取文件</li>
                <li>数据库的设计、分表、性能优化等</li>
                <li>Shell脚本和计划任务</li>
            </ul>

            <h4 class="margin-top15">武汉快游科技有限公司</h4>
            <ol>
                <li>基于PHPCMS进行CMS系统的二次开发，软件下载站9553.com、单机游戏站99danji.com、页游门户等整站开发，包括前后台功能的开发。网站之前是asp+mssql，改成php+mysql，进行数据的转换，保证数据完整和正确，以及第三方接口的使用等。</li>
                <li>基于ThinkPHP框架开发的一套广告联盟系统，该系统提供不同类型的广告给其他网站，帮助推广公司的游戏或者软件产品，按点击量、下载量等统计并支付推广费用，有完善的前台和后台系统。</li>
            </ol>

            <h3>教育经历</h3>
            <div class="row">
                <div class="col-md-1">
                    <img class="img-rounded" src="http://oddgb63aa.qnssl.com/uploads/2016/04/wust.jpeg" alt="武汉科技大学" width="70" height="70">
                </div>
                <div class="col-md-4">
                    <h4>武汉科技大学</h4>
                    <p>本科·计算机科学与技术·2013年毕业</p>
                </div>
            </div>

            <h3>其他技能</h3>
            <p>熟悉在 Linux 环境下的开发，本地使用 Vagrant+VirtualBox 搭建的虚拟机，熟悉 CentOS 或 Ubuntu 系统常用操作，对Nginx的基本配置和服务器性能调优有所了解。注重开发流程和规范，熟悉 Git 和 SVN 版本控制工具。另外对Python比较感兴趣并有所学习。</p>
            <ul class="list-unstyled">
                <li><span class="label label-primary">PHP</span></li>
                <li><span class="label label-primary">MySQL</span></li>
                <li><span class="label label-primary">Redis</span></li>
                <li><span class="label label-primary">MongoDB</span></li>
                <li><span class="label label-primary">消息队列</span></li>
                <li><span class="label label-primary">jQuery</span></li>
                <li><span class="label label-primary">CSS</span></li>
            </ul>
            <p>计划学习的方向：深入学习Laravel框架和其中的概念，了解和学习服务器方面的部署，WEB集群，Redis集群等，负载均衡等，以及服务器端安全和性能优化方面的知识。</p>


            <h3>个人爱好</h3>
            <p><a href="{{ route('index.travel') }}">旅行</a>，看书</p>

            <h3>博客</h3>
            <p><a href="http://blog.tanteng.me" target="_blank">http://blog.tanteng.me</a></p>
        </div>
    </div>
</div>
@endsection