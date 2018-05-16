<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/index\view\users\reg.html";i:1526366920;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\layout.html";i:1526366920;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\header.html";i:1526366920;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\footer.html";i:1526367171;}*/ ?>

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
    <!--<link type="text/css" rel="stylesheet" href="css/mall.css"/>-->
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
<title>注册</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
</head>

<body>
<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>注册</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 

<form method="post" class="login-form" action="users/register" id="login" autocomplete="off">
  <div class="registered">
    <div class="field">
      <input id="tel" type="text" name="u_tel" class="username" placeholder="请输入手机号" >
    </div>
    <div class="field">
      <input type="text" name="yzm" id="yzm" class="yzm" placeholder="请输入验证码"  maxlength="">
      <a href="javascript:void(0)" class="fsyzm" id="getVer">获取验证码</a>
    </div>
    <div class="field">
      <input id="pwd" type="password" name="u_pwd" class="password" placeholder="请设置密码" >
    </div>
  </div>
  <div class="next-step">
    <button type="submit" class="submit-btn">注册</button>
  </div>
</form>

</div>
<!--container-end-->
</body>
</html>
<script>
	var countdown=60; 
	$('#getVer').on("click",function(){
		var tel = $("#tel").val()
		var reg = /^1[3,5,7,8]\d{9}$/
		var _this = $(this)
		if(tel == ""){
			alert("请填写手机号");
			return false;
		}
		if(!reg.test(tel)){
			alert("请输入正确的手机号")
			return false;
		}
		
		$.ajax({
			type:"post",
			url:"users/sendMsg",
			data:{tel:tel},
		});
//		fun(_this);
	})
//	function fun(obj){
//		if (countdown == 0) { 
//	        obj.removeAttr("disabled");    
//	        obj.val("获取验证码"); 
//	        countdown = 60; 
//	        return;
//	    } else { 
//	        obj.attr("disabled", true); 
//	        obj.val("重新发送(" + countdown + "s)"); 
//	        countdown--; 
//	    } 
//		setTimeout(function(){ 
//			fun(obj)
//		},1000);
//	}
</script>
<footer class="footer" id="footer">
  <ul class="footnav box-flex">
  <?php
  	use think\Request;
  	
  	$request = Request::instance();
	 	$controller = $request->controller();
  switch($name=$controller): case "Index": ?>
    	<li class="on"><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Build": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li class="on"><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Users": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li class="on"><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Order": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li class="on"><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; endswitch; ?>

  
  
  
	
  	
  	
    
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
