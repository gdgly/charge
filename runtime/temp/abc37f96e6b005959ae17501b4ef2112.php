<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"E:\phpHuanJing\WWW\charge\charge\public/../application/index\view\integral\balance.html";i:1526365349;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\layout.html";i:1526285560;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\header.html";i:1526365349;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\footer.html";i:1526365349;}*/ ?>

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

	<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>我的账户</h1>
<a href="account_details.html" style="padding-right: 20px;"><span>账户明细</span></a>
</header>

<div class="container" id="container">
	<center>
		<div class="balance" style="font-size: 16px;">
	        <img src="images/account_img.jpg" style="width: 200px;height: 150px;margin-top: 50px;">
	        <span>我的账户</span>
	        <p>
	        	<span >¥<?php echo $money; ?></span>
	        </p>
	    </div>
		<a href="integral/recharge" class="submit-btn">充值</a>
		<a href="integral/forward" class="submit-btn">提现</a>
	</center>
    
</div>

<footer class="footer" id="footer">
  <ul class="footnav box-flex">
  <?php
  	use think\Request;
  	
  	$request = Request::instance();
	 	$controller = $request->controller();
  switch($name=$controller): case "Index": ?>
    	<li class="on"><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="my-order.html" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Build": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li class="on"><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="my-order.html" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Users": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="my-order.html" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li class="on"><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
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
