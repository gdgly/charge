<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\wamp\www\charge\public/../application/demo\view\index\index.html";i:1526436638;s:59:"D:\wamp\www\charge\application\demo\view\layout\layout.html";i:1526436638;s:59:"D:\wamp\www\charge\application\demo\view\layout\header.html";i:1526436638;s:59:"D:\wamp\www\charge\application\demo\view\layout\footer.html";i:1526436638;}*/ ?>
<base href="/demo/" />
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>充电桩后台</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo url('index/index'); ?>">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="javascript:void(0)">管理员</a></li>
                <li><a href="<?php echo url('login/upload'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('login/loginout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <!--<a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>-->
                    <ul class="sub-menu">
                        <li><a href="<?php echo url('index/examine'); ?>"><i class="icon-font">&#xe008;</i>充电站审核</a></li>
                        <li><a href="<?php echo url('index/show'); ?>"><i class="icon-font">&#xe005;</i>充电站管理</a></li>
                        <li><a href="<?php echo url('feedback/show'); ?>"><i class="icon-font">&#xe006;</i>意见反馈单</a></li>
                        <!--<li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>-->
                    </ul>
                </li>
                <!--<li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>

	<base href="/admin/" />
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>welcome come to my Backstage</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    <li>
                        <label class="res-lab">4组-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info">2018年5月10日 21:08:24</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">官方交流网站：</label><span class="res-info"><a href="http://user.qzone.qq.com/1963644107/infocenter?ptsig=fwuIGucgSq7VB3N8vMjtbG8F-lEbvyN44NaOi-8MrHw_" title="有主机上线设计" target="_blank">jscss.me</a></span>
                    </li>
                    <li>
                        <label class="res-lab">官方交流QQ：</label><span class="res-info"><a class="qq-link" target="_blank" href="http://user.qzone.qq.com/1963644107/infocenter?ptsig=fwuIGucgSq7VB3N8vMjtbG8F-lEbvyN44NaOi-8MrHw_"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="JS-前端开发" title="JS-前端开发"></a> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
</body>
</html>

