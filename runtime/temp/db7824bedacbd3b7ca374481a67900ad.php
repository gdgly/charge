<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"C:\web\WWW\charge\public/../application/index\view\users\log.html";i:1526299627;s:59:"C:\web\WWW\charge\application\index\view\layout\layout.html";i:1526299627;s:59:"C:\web\WWW\charge\application\index\view\layout\header.html";i:1526299627;s:59:"C:\web\WWW\charge\application\index\view\layout\footer.html";i:1526299627;}*/ ?>

<!DOCTYPE html>
<base href="/index/" />
<html>
<head>
	<base href="/index/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<title>首页</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
<!--banner 脚本-->
<script src="js/TouchSlide.1.1.js"></script>
<!--banner 脚本-->
</head>
<body  >

	<!DOCTYPE html>
<html>
<head>
	<base href="/index/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
</head>

<body>
<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>登录</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 

<form method="post" class="login-form" action="users/login" id="login" autocomplete="off">
  <div class="registered">
    <div class="field">
      <input id="username" type="text" name="u_tel" class="username" placeholder="请输入手机号" >
    </div>
    <div class="field">
      <input type="password" name="u_pwd" id="yzm" class="yzm" placeholder="请输入密码"  maxlength="">
    </div>
         
  </div>
  <div class="next-step">
    <button type="submit" class="submit-btn">登录</button>
  </div>
</form>
     <div style="font-size: 14px;"><center>还没有注册，去<a href="users/reg" style="display: inline;">注册</a></center></div>

</div>
<!--container-end-->
</body>
</html>

<footer class="footer" id="footer">
  <ul class="footnav box-flex">
    <li class="on"><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
    <li><a href="my-order.html" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
  </ul>
</footer>
<!--footer-end-->
<!--栏目更多-->
<script type="text/javascript">
$(".ind-nav").each(function(){	
  var self = $(this); 
  var n=self.find("ul li").length;
  if(n<=8){
  self.find( ".more").addClass("hide-more");
  }else{
  self.find(".more").removeClass("hide-more");
  } 
 self.find(".more").click(function(){
    self.find( "ul" ).toggleClass("intro");
	self.find(".more").toggleClass("add-more");
  });
  });
</script>
<!--栏目更多--> 
</body>
</html>
