<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/demo\view\login\upload.html";i:1526461474;s:83:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\demo\view\layout\layout.html";i:1526461474;s:83:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\demo\view\layout\header.html";i:1526461474;s:83:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\demo\view\layout\footer.html";i:1526461474;}*/ ?>
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
                        <li><a href="<?php echo url('pile/show'); ?>"><i class="icon-font">&#xe004;</i>维修站点</a></li>
                        <!-- <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li> -->
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

	<!doctype html>
<html>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">修改密码</span></div>
        </div>
        <center>
            <form action="<?php echo url('login/upload_to'); ?>" name="myform" id="myform" method="post">
                <table>
                	<input type="hidden" name="a_id" value="<?php echo $id; ?>" />
                	<tr>
                		<td>旧密码</td>
                		<td><input type="" name="pwd" id="pwd" value="" /></td>
                	</tr>
                	<tr>
                		<td>新密码</td>
                		<td><input type="" name="a_pwd" id="a_pwd" value="" /></td>
                	</tr>
                	<tr>
                		<td></td>
                		<td><input type="submit" name="" id="" value="修改" /></td>
                	</tr>
                </table>
            </form>
        </center>
    </div>
    <!--/main-->
</div>
</body>
</html>
</body>
</html>

