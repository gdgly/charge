<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\wamp\www\charge\public/../application/index\view\users\index.html";i:1526436638;s:60:"D:\wamp\www\charge\application\index\view\layout\layout.html";i:1526436638;s:60:"D:\wamp\www\charge\application\index\view\layout\header.html";i:1526436638;s:60:"D:\wamp\www\charge\application\index\view\layout\footer.html";i:1526436638;}*/ ?>

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

	
<div class="container" id="container"> 
<div class="my-face">
  <div class="my-face-con">
    <div class="my-face-pic">
    	<?php if($data['u_img']==""){?>
    		<a href="users/myImg"><img src="images/my-face-pic.jpg"></a>
    	<?php }else{?>
    		<a href="users/myImg"><img src="<?php echo $data['u_img']; ?>"></a>
    	<?php }?>
    </div>
    <p><a href="users/myNick" style="color: black;"><?php echo $data['u_nick']; ?></a></p>
  </div>
</div>

<div class="personal-list">
     <ul>
       <li><a class="my-icon-wddd" href="<?php echo url('index/order/order'); ?>">我的订单</a></li>
       <li><a class="my-icon-grzl" href="users/userMsg">个人资料</a></li>
     </ul>
      <ul>
      	<li><a class="my-icon-kfzx" href="<?php echo url('build/mypile'); ?>">我的电桩</a></li>
       <li><a class="my-icon-yhq" href="integral/balance">我的账户</a></li>
       <li><a class="my-icon-wdjf" href="integral/index">我的积分</a></li>
        <li><a class="my-icon-gsjj" href="users/loginout">退出登录</a></li>
     	</ul>
  </div>


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
