<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\www\wamp\www\charge\public/../application/index\view\users\up_pwd.html";i:1526255552;s:64:"D:\www\wamp\www\charge\application\index\view\layout\layout.html";i:1526255302;s:64:"D:\www\wamp\www\charge\application\index\view\layout\header.html";i:1526295737;s:64:"D:\www\wamp\www\charge\application\index\view\layout\footer.html";i:1526255302;}*/ ?>

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
<title>修改密码</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script src="js/common.js"></script>
</head>

<body>

<form action="users/upPwd" method="post">
<header class="header header-save" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">返回</a>
<h1>修改密码</h1>
<button type="submit" id="sub">保存</button>
</header>
<!--header-end-->

<div class="container" id="container"> 

<div class="modify">
   原密码:<input type="password" name="old_pwd" class="username" value="" required><a href="javascript:" class="clear-close" id="clear-close" onclick="javascript:document.getElementById('username').value='';document.getElementById('username').focus();" value="clear"></a>
 新密码:<input type="password" id="newPwd" name="new_pwd" class="username" value="" required><a href="javascript:" class="clear-close" id="clear-close" onclick="javascript:document.getElementById('username').value='';document.getElementById('username').focus();" value="clear"></a>
 确认新密码:<input type="password" id="cPwd" name="check_pwd" class="username" value="" required><a href="javascript:" class="clear-close" id="clear-close" onclick="javascript:document.getElementById('username').value='';document.getElementById('username').focus();" value="clear"></a>
</div>

</div>
<!--container-end-->
</form>
</body>
</html>
<script>
	$("#sub").click(function(){
		if($("#newPwd").val()!=$('#cPwd').val()){
			alert('请重新确认密码')
			$('#cPwd').val("")
			return false
		}
	})
</script>


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
