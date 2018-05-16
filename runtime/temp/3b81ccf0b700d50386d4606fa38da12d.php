<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\wamp\wamp\www\mouth12\charge\public/../application/index\view\now\charging.html";i:1526378008;s:73:"D:\wamp\wamp\www\mouth12\charge\application\index\view\layout\layout.html";i:1526378008;s:73:"D:\wamp\wamp\www\mouth12\charge\application\index\view\layout\header.html";i:1526378008;s:73:"D:\wamp\wamp\www\mouth12\charge\application\index\view\layout\footer.html";i:1526378008;}*/ ?>

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
<h1>正在充电...</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 


		<div class="pro-top">
    	<span class="pro-font"><span id="dian"><?php echo $quantity; ?>%</span> <br /><span class="pro-space">当前电量</span></span>
    	<img src="/index/images/213.gif" alt="" class="pro-imgs" />
    	<div class="pro-div1">
    		<h4 style="float: left;display: inline-block;"><?php echo $mon; ?>元</h4>
    		<h4 style="float: left;display: inline-block;margin-left: 110px;" id="timer"><?php echo $str; ?></h4>
    		<h4 style="float: left;display: inline-block;margin-left: 110px;"><?php echo $data['money']; ?>元</h4>
    	</div>
    	<div class="pro-div2">
    		<h4 style="float: left;display: inline-block;">账户余额</h4>
    		<h4 style="float: left;display: inline-block;margin-left: 120px;">剩余时长</h4>
    		<h4 style="float: left;display: inline-block;margin-left: 135px;">预计费用</h4>
    	</div>

    	
    </div>	
    	

		<a href="<?php echo url('index/now/end'); ?>?o_id=<?php echo $o_id; ?>" class="pro-payment">结束充电</a>
		<!--<a href="#" class="pro-pay">充值</a>-->

</div>
<!--container-end-->
<SCRIPT type="text/javascript">
            
            var maxtime = "<?php echo $sur_time; ?>"; //一个小时，按秒计算，自己调整!   
			
            function CountDown() {
//          	dians();
                if (maxtime >= 0) {
                    h = Math.floor((maxtime % (3600*24)) / 3600);

                    // $h = floor(($time % (3600*24)) / 3600);
                    minutes = Math.floor(((maxtime % (3600*24)) % 3600) / 60);

                    // minutes = Math.floor(maxtime / 60);
                    seconds = Math.floor(maxtime % 60);
                    msg = h+":"+ minutes + ":" + seconds;
                    document.all["timer"].innerHTML = msg;
                    
                    if (maxtime == 5 * 60)alert("还剩5分钟"); --maxtime;
                } else{
                    clearInterval(timer);
                    alert("时间到，结束!");
                    location.href="<?php echo url('index/now/end'); ?>?o_id=<?php echo $o_id; ?>";
                }
            }
            timer = setInterval("CountDown()", 1000); 
            
            dian = "<?php echo $quantity; ?>";
            function dians(){
            	document.all["dian"].innerHTML = dian+"%";
            	++dian;
            	if	(dian == 100)
            	{
            		clearInterval(tim);
            	}
            }
            tim = setInterval("dians()", 60000); 
            
        </SCRIPT>
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
