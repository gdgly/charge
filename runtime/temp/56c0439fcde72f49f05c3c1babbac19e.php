<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"E:\phpHuanJing\WWW\charge\charge\public/../application/index\view\order\order.html";i:1526539012;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\layout.html";i:1526539012;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\header.html";i:1526539012;s:74:"E:\phpHuanJing\WWW\charge\charge\application\index\view\layout\footer.html";i:1526539012;}*/ ?>

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<title>我的订单</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
<!--支付密码-->
<link rel="stylesheet" type="text/css" href="pay/css/zhifu.css">
<script type="text/javascript" src="pay/js/jquery.min.js"></script>
</head>

<body>
<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>我的订单</h1>
</header>
<!--header-end-->

<div class="container" id="container"> 

<!--我的订单选项卡-->
<div id="my-order" class="my-order all_orders"> 
  
    <!--栏目-->
    <ul id="all_orders">
     <ul class="order_nav">
        <li class="current"><a>全部订单</a></li>
        <li><a>已完成</a></li>
        <li><a>待付款</a></li>
        <li><a>订单进行中</a></li>
    </ul>
    </ul>
    <!--栏目-->
    
    <!--内容-->
    <div id="menu_con">
    
      <!--全部订单开始-->
      <section class="tag" style="display:block">
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
        <div class="my-order-item">
          <div class="my-order-item-tit clearfix">
          <h3>订单号：<?php echo $vo['o_number']; ?></h3>
          <span class="my-order-wait-zf">
          	
          	<?php switch($vo['o_status']): case "1": ?>订单进行中<?php break; case "2": ?>待支付<?php break; case "3": ?>交易完成<?php break; default: ?>default
          	<?php endswitch; ?>
          	/<?php echo $vo['money']; ?>元
          </span>
          </div>
          <div class="my-order-item-txt">
            <div class="my-order-time"><?php echo date('Y-m-d H:i:s',$vo['start_time']); ?>--<?php echo date('Y-m-d H:i:s',$vo['end_time']); ?></div>
            <div class="my-order-address"><?php echo $vo['c_site']; ?></div>
            
          </div>
          <div class="my-order-item-btn">
            <div class="pos-r">
              <?php switch($vo['o_status']): case "1": ?><span class="my-order-item-jindu"><a href="order-schedule1.html">查看进度</a></span><?php break; case "2": ?><span class="my-order-item-red"><a href="javascript:void(0)" class="ljzf_but" o_id="<?php echo $vo['o_id']; ?>" money="<?php echo $vo['money']; ?>">立即支付</a></span><?php break; case "3": ?><span class="my-order-item-red"><a href="<?php echo url('index/comment/index'); ?>">立即评价</a></span><?php break; default: ?>default
          	<?php endswitch; ?>
            </div>  
          </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </section>
      <!--全部订单结束-->
      
      <!--已完成开始-->
      <section class="tag" style="display:none">
      	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if($vo['o_status'] == 3): ?>
        <div class="my-order-item">
          <div class="my-order-item-tit clearfix">
          <h3>订单号：<?php echo $vo['o_number']; ?></h3>
          <span class="my-order-over">交易完成/<?php echo $vo['money']; ?>元</span>
          </div>
          <div class="my-order-item-txt">
            <div class="my-order-time"><?php echo date('Y-m-d H:i:s',$vo['start_time']); ?>--<?php echo date('Y-m-d H:i:s',$vo['end_time']); ?></div>
            <div class="my-order-address"><?php echo $vo['c_site']; ?></div>
          </div>
          <div class="my-order-item-btn">
            <div class="pos-r">
              <span class="my-order-item-red"><a href="<?php echo url('index/comment/index'); ?>">立即评价</a></span>
            </div>
          </div>
        </div> 
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </section>
      <!--已完成结束
      
      <!--待付款开始-->
      <section class="tag" style="display:none">
      	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if($vo['o_status'] == 2): ?>
        <div class="my-order-item">
          <div class="my-order-item-tit clearfix">
          <h3>订单号：<?php echo $vo['o_number']; ?></h3>
          <span class="my-order-wait-zf">待支付/<?php echo $vo['money']; ?>元</span>
          </div>
          <div class="my-order-item-txt">
            <div class="my-order-time"><?php echo date('Y-m-d H:i:s',$vo['start_time']); ?>--<?php echo date('Y-m-d H:i:s',$vo['end_time']); ?></div>
            <div class="my-order-address"><?php echo $vo['c_site']; ?></div>
          </div>
          <div class="my-order-item-btn">
            <div class="pos-r">
              <span class="my-order-item-red"><a href="javascript:void(0)" class="ljzf_but" o_id="<?php echo $vo['o_id']; ?>" money="<?php echo $vo['money']; ?>">立即支付</a></span>
            </div>
          </div>
        </div>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </section>
      <!--待付款结束-->
      
      <!--订单进行中-->
      <section class="tag" style="display:none">
      	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if($vo['o_status'] == 1): ?>
        <div class="my-order-item">
          <div class="my-order-item-tit clearfix">
          <h3>订单号：<?php echo $vo['o_number']; ?></h3>
          <span class="my-order-wait-pj">订单进行中/<?php echo $vo['money']; ?>元</span>
          </div>
          <div class="my-order-item-txt">
            <div class="my-order-time"><?php echo date('Y-m-d H:i:s',$vo['start_time']); ?>--<?php echo date('Y-m-d H:i:s',$vo['end_time']); ?></div>
            <div class="my-order-address"><?php echo $vo['c_site']; ?></div>
          </div>
          <div class="my-order-item-btn">
            <div class="pos-r">
              <span class="my-order-item-jindu"><a href="order-schedule1.html">查看进度</a></span>
            </div>  
          </div>
        </div>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </section>
      <!--订单进行中结束-->
    </div>
    <!--内容-->
    
</div>
<!--浮动-->
<div class="ftc_wzsf">
        <div class="srzfmm_box">
            <div class="qsrzfmm_bt clear_wl">
                <img src="pay/images/xx_03.jpg" class="tx close fl">
                <!--<img src="pay/images/jftc_03.png" class="tx fl">-->
                <span class="fl"></span></div>
            <div class="zfmmxx_shop">
                <div class="mz">请输入支付密码</div>
                <div class="zhifu_price"></div></div>
                <a href="javascript:void(0)" class="blank_yh"><span class="fl ml5">余额</span></a>
            <ul class="mm_box">
                <li></li><li></li><li></li><li></li><li></li><li></li>
            </ul>
        </div>
        <div class="numb_box">
            <div class="xiaq_tb">
                <img src="images/jftc_14.jpg" height="10"></div>
            <ul class="nub_ggg">
                <li><a href="javascript:void(0);" class="zf_num">1</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">2</a></li>
                <li><a href="javascript:void(0);" class="zf_num">3</a></li>
                <li><a href="javascript:void(0);" class="zf_num">4</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">5</a></li>
                <li><a href="javascript:void(0);" class="zf_num">6</a></li>
                <li><a href="javascript:void(0);" class="zf_num">7</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">8</a></li>
                <li><a href="javascript:void(0);" class="zf_num">9</a></li>
                <li><a href="javascript:void(0);" class="zf_empty">清空</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">0</a></li>
                <li><a href="javascript:void(0);" class="zf_del">删除</a></li>
            </ul>
        </div>
        <div class="hbbj"></div>
    </div>


<script>
var tabs=function(){
    function tag(name,elem){
        return (elem||document).getElementsByTagName(name);
    }
    //获得相应ID的元素
    function id(name){
        return document.getElementById(name);
    }
    function first(elem){
        elem=elem.firstChild;
        return elem&&elem.nodeType==1? elem:next(elem);
    }
    function next(elem){
        do{
            elem=elem.nextSibling;  
        }while(
            elem&&elem.nodeType!=1  
        )
        return elem;
    }
    return {
        set:function(elemId,tabId){
            var elem=tag("li",id(elemId));
            var tabs=tag("section",id(tabId));
            var listNum=elem.length;
            var tabNum=tabs.length;
            for(var i=0;i<listNum;i++){
                    elem[i].onclick=(function(i){
                        return function(){
                            for(var j=0;j<tabNum;j++){
                                if(i==j){
                                    tabs[j].style.display="block";
                                    //alert(elem[j].firstChild);
                                    elem[j].firstChild.className="selected";
                                }
                                else{
                                    tabs[j].style.display="none";
                                    elem[j].firstChild.className="";
                                }
                            }
                        }
                    })(i)
            }
        }
    }
}();
tabs.set("nav","menu_con");//执行
</script> 
<script language="JavaScript">
 $(document).ready(function(){
	
  $('.all_orders ul li').click(function(){
            var index = $('.all_orders ul li').index(this);
            $(this).addClass('current').siblings('li').removeClass('current');
            $('.all_orders .wait_pay:eq('+index+')').show().siblings('.wait_pay').hide();
        })
  //出现浮动层
		$(".ljzf_but").click(function(){
			$(".footer").hide();
      o_id = $(this).attr('o_id')
      var money = $(this).attr('money')
      $(".zhifu_price").html('￥'+money)
			$(".ftc_wzsf").show();
		});
		//关闭浮动
		$(".close").click(function(){
			$(".ftc_wzsf").hide();
			$(".mm_box li").removeClass("mmdd");
			$(".mm_box li").attr("data","");
			i = 0;
			window.location.reload();
		});
			//数字显示隐藏
		$(".xiaq_tb").click(function(){
			$(".numb_box").slideUp(500);
		});
		$(".mm_box").click(function(){
			$(".numb_box").slideDown(500);
		});
			//----
		var i = 0;
		$(".nub_ggg li .zf_num").click(function(){
				
			if(i<6){
				$(".mm_box li").eq(i).addClass("mmdd");
				$(".mm_box li").eq(i).attr("data",$(this).text());
				i++
				if (i==6) {
				  setTimeout(function(){
					var data = "";

						$(".mm_box li").each(function(){
						data += $(this).attr("data");
					});
              // alert(o_id)
//               alert(data)
							$.ajax({
                url: "<?php echo url('index/order/reduce'); ?>",
                type: 'POST',
                data: {o_id:o_id,pwd:data},
              })
              .done(function(msg) {
              	if(msg=='3'){
              		alert('您没有支付密码！')
              		location.href="<?php echo url('index/users/userMsg'); ?>"
              	}else if(msg=='1'){
              		alert('支付成功')
              		$(".ftc_wzsf").hide();
									$(".mm_box li").removeClass("mmdd");
									$(".mm_box li").attr("data","");
									i = 0;
									window.location.reload();
              	}else if(msg=='4'){
              		alert('支付失败')
              		$(".ftc_wzsf").hide();
									$(".mm_box li").removeClass("mmdd");
									$(".mm_box li").attr("data","");
									i = 0;
									window.location.reload();
              	}else if(msg=='2'){
              		alert('支付失败，密码错误！');
              		$(".ftc_wzsf").hide();
									$(".mm_box li").removeClass("mmdd");
									$(".mm_box li").attr("data","");
									i = 0;
									window.location.reload();
              	}else if(msg=='5'){
              		alert('请先充值！余额不够支付');
              		location.href="<?php echo url('index/integral/recharge'); ?>"
              	}
                console.log("success");
              })
              .fail(function(msg) {
                console.log("error");
              })
              .always(function(msg) {
                console.log("complete");
              });
              
				  },100);
				};
			} 
		});
			
		$(".nub_ggg li .zf_del").click(function(){
			if(i>0){
				i--
				$(".mm_box li").eq(i).removeClass("mmdd");
				$(".mm_box li").eq(i).attr("data","");
			}
		});
	
		$(".nub_ggg li .zf_empty").click(function(){
			$(".mm_box li").removeClass("mmdd");
			$(".mm_box li").attr("data","");
			i = 0;
		});
  });
</script>
<!--我的订单选项卡结束-->

</div>
<!--container-end-->



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
