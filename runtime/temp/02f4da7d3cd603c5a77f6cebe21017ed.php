<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:94:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/index\view\comment\index.html";i:1526471810;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\layout.html";i:1526461474;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\header.html";i:1526631270;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\footer.html";i:1526626769;}*/ ?>

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
<link href="/index/qq/css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
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
	
<!-- 代码部分 begin -->
<div class="main-im">
	<div id="open_im" class="open-im">&nbsp;</div>  
	<div class="im_main" id="im_main">
		<div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭">&nbsp;</a></div>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=2565465762&site=qq&menu=yes" target="_blank" class="im-qq qq-a" title="在线QQ客服">
			<div class="qq-container"></div>
			<div class="qq-hover-c"><img class="img-qq" src="http://demo.lanrenzhijia.com/2015/service0119/images/qq.png"></div>
			<span> QQ在线咨询</span>
		</a>
		
		
	</div>
</div>
<script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
<script>
$(function(){
	$('#close_im').bind('click',function(){
		$('#main-im').css("height","0");
		$('#im_main').hide();
		$('#open_im').show();
	});
	$('#open_im').bind('click',function(e){
		$('#main-im').css("height","272");
		$('#im_main').show();
		$(this).hide();
	});
	$('.go-top').bind('click',function(){
		$(window).scrollTop(0);
	});
	$(".weixing-container").bind('mouseenter',function(){
		$('.weixing-show').show();
	})
	$(".weixing-container").bind('mouseleave',function(){        
		$('.weixing-show').hide();
	});
});
</script>
<!-- 代码部分 end-->


	<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<title>预约回收</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
</head>

<body>
<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>预约回收</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 
  <form action="<?php echo url("comment/add"); ?>" method="post" enctype="multipart/form-data">
    <div class="add-class">
        <div class="maintenance-reservation-textarea online-evaluation-textarea">
           <textarea class="textarea" name="co_content" id="textarea" autofocus="autofocus"></textarea>
           <div class="layer"><span>充电站环境如何？服务态度好吗？欢迎你们多多评论</span></div>
        </div>
        <div class="upload-photos">
           <span id="selectedimg"></span>         
        </div>
        <input type="hidden" name="o_id" value="<?php echo $o_id; ?>"/>
        <button type="submit" class="confirm-payment">点击评估</button>
    </div>
  </form>  
</div>
<!--container-end-->

<script type="text/javascript" src="js/iosOverlay.js"></script>
<script src='js/exif.js'></script>
<script src='js/upload_img.js'></script>
 <script>
            $("#selectedimg").click(function(){
                $.selectPicture(function(base64){
                    $.ajax({
                        url:"<?php echo Url('deal_photo'); ?>",
                        type:'post',
                        dataType:'json',
                        data:{'base64':base64},
                        success:function(data){
                            if(data.status == 1){
                                $("#selectedimg").before("<img onclick='javascript:dialog(this);' src=" + data.info + " class='set_img'>");
                                $("#loading").remove();
                            }else{
                                alert(data.info);
                            }
                        }
                    })
                    return false;	
              });
            });
            // 点击删除图片
            function dialog(obj){
                if(confirm('是否确定删除该图片？')) {
                    $(obj).remove();
                }
            }
            function submit_hs(){
                // 上传图片之前整理商品图片，将图片地址放到隐藏域中
                var goodsPhoto = [];
                $('.upload-photos img').each(function(){
                    goodsPhoto.push($(this).attr('src'));
                });
                if(goodsPhoto.length > 0){
                    $('input[name="img"]').val(goodsPhoto.join(','));
                }
                
                $.ajax({
                    url:"<?php echo Url('hs_submit'); ?>",
                    type:'post',
                    dataType:'json',
                    data:$("form[name='info']").serialize(),
                    success:function(data){
                        iosOverlay({
                            text: data.info,
                            duration: 2e3
                        });
                        if(data.status == 1){
                            window.location.href="/";
                        }
                    }
                })
                return false;	
            }
        </script>
</body>
</html>


<footer class="footer" id="footer">
  <ul class="footnav box-flex">
  <?php
  	use think\Request;
  	
  	$request = Request::instance();
	 	$controller = $request->controller();
    $action = $request->action();
  switch($name=$controller): case "Index": switch($name=$action): case "index": ?>
      <li class="on" ><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
      <li ><a href="<?php echo url('index/chat'); ?>" class="hz" ><i></i><span class="full-block">互助</span></a></li>
      <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
      <li ><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
      <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
          <?php break; case "chat": ?>
            <li ><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
            <li class="on" ><a href="<?php echo url('index/chat'); ?>" class="hz" ><i></i><span class="full-block">互助</span></a></li>
            <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
            <li ><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
            <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
          <?php break; endswitch; break; case "Build": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
      <li><a href="<?php echo url('index/chat'); ?>" class="hz" ><i></i><span class="full-block">互助</span></a></li>
	    <li class="on"><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Users": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
      <li><a href="<?php echo url('index/chat'); ?>" class="hz" ><i></i><span class="full-block">互助</span></a></li>
	    <li><a href="<?php echo url('build/index'); ?>" class="foot-worker"><i></i><span class="full-block">申请建桩</span></a></li>
	    <li><a href="<?php echo url('index/order/order'); ?>" class="foot-order"><i></i><span class="full-block">订单</span></a></li>
	    <li class="on"><a href="users/index" class="my"><i></i><span class="full-block">我的</span></a></li>
    <?php break; case "Order": ?>
    	<li><a href="index.html" class="home"><i></i><span class="full-block">首页</span></a></li>
      <li><a href="<?php echo url('index/chat'); ?>" class="hz" ><i></i><span class="full-block">互助</span></a></li>
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
