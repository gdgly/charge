<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/index\view\now\now.html";i:1526389033;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\layout.html";i:1526379708;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\header.html";i:1526379708;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\footer.html";i:1526379708;}*/ ?>

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
<h1>准备充电</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 

<div class="add-class">
  <form action="<?php echo url('index/now/charging'); ?>" method="post">
    <ul>
    	<h4 class="now-name"><?php echo $charge['a_num']; ?>号桩</h4>
    	<h4 class="now-status">可用</h4>
      <li><label>插座类型</label><space id="type">
      		
			<?php if($charge['c_type'] == 0): ?>标准
			<?php else: ?> 特斯拉
			<?php endif; ?>
      </space></li>
      <li><label>电池检测</label><space id="type">24V/4A</space></li>
      <li><label>计费方式</label><space id="type"><?php echo $charge['c_money']; ?>/分钟</space></li>
      
    </ul>
    <ul>
    	<li><space>充电时长</space></li>
    	
			<?php foreach($dur as $vo): if($vo['d_name'] == '0'): ?> 
					<li><input type="radio" name="time" class="type" value="<?php echo $vo['d_name']; ?>" b_name='<?php echo $vo['d_name']; ?>' d_id="<?php echo $vo['d_id']; ?>"/><label>充满</label><space class="add-space <?php echo $vo['d_id']; ?>"></space></li>
				<?php else: ?> 
					<li><input type="radio" name="time" class="type" value="<?php echo $vo['d_name']; ?>" d_id="<?php echo $vo['d_id']; ?>"/><label><?php echo $vo['d_name']; ?>小时</label><space class="add-space <?php echo $vo['d_id']; ?>"></space></li>
				<?php endif; endforeach; ?>
    </ul>
    <ul>
    	<li><space>自定义</space></li>
    	<li><input id="amount" type="number" name="time" class="type amount" placeholder="请输入所需时间" value=""><space>小时</space><space class="add-space ti"></space></li>
    </ul>
    <ul>
    	<!--<li><space>已优惠</space><label>0.5元</label></li>-->
    	<li><space>预计费用</space><label style="color: red;">￥<?php echo $money; ?></label></li>
    </ul>
    <!--电量-->
    <input type="hidden" value="<?php echo $quan; ?>" name="pur"/>
    <!--金额-->
    <input type="hidden" value="<?php echo $money; ?>" name="money"/>
    <!--桩号-->
    <input type="hidden" value="<?php echo $p_id; ?>" name="pid"/>
    <!--站点id-->
    <input type="hidden" value="<?php echo $charge['c_id']; ?>" name="cid" />
    <!--实际时间-->
    <input type="hidden" value="<?php echo $time; ?>" name="pay_time" />
    <input type="submit" style="display: none;" class="confirm-payment" value="开始充电">
  </form>  
</div>

</div>
<!--container-end-->
<script src="/jquery-2.1.4.min.js"></script>
<script>
	$(function(){
		//电池电量
			quan = "<?php echo $quan; ?>";
//			alert(quan)
			//计算出的时间
			t = "<?php echo $t; ?>";
			
			//所需时间
			time = "<?php echo $time; ?>";
		$(".type").click(function(){
			$(".confirm-payment").show();
			$(".amount").attr('disabled','disabled');
			var d_id = $(this).attr("d_id")
			var val = $(this).val();
			var b_name = $(this).attr('b_name');
			
//			alert(val)
			if(b_name=='0'){
				$("."+d_id).text(t)
				$(".amount").val("")
			}else{
				$(".amount").val("")

				var num = b_name*3600
				if(num>time){
					alert("时间大于您所充满的时间！请重新选择")
					$(".confirm-payment").hide();
//					window.location.reload();
				}else{
					$(".confirm-payment").show();
				}
				$(".add-space").empty()
			}
		})
		$(".amount").blur(function(){
			var val = $(this).val()
			var num = val*3600
//			alert(time)
				if(num>time){
					$(".ti").text("时间大于您所充满的时间！请重新选择");
					$(".confirm-payment").hide();
//					window.location.reload();
				}else{
					$(".ti").empty();
					$(".confirm-payment").show();
				}
		})
	})
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
