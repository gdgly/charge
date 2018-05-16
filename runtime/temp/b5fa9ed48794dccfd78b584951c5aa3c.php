<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"E:\phpHuanJing\WWW\charge\charge\public/../application/demo\view\login\index.html";i:1526285560;}*/ ?>
<base href="/demo/login/" />
<!DOCTYPE html>
<html>
<head>
<title>charge</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="App Loction Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!--webfonts-->
<!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->
<!--//webfonts-->
</head>
<body>
	<h1>充电站</h1>
		<div class="app-location">
			<h2>Welcome to Locaticus</h2>
			<div class="line"><span></span></div>
			<div class="location"><img src="images/location.png" class="img-responsive" alt="" /></div>
			<form action="<?php echo url('demo/login/login'); ?>" method="post">
				<input type="text" name="a_name" class="text" value="" placeholder="管理员名">
				<input type="password" name="a_pwd" value="" placeholder="密码">
				<div class="submit"><input type="submit" value="登录"></div>
				<div class="clear"></div>
			</form>
		</div>
	<!--start-copyright-->
   		<div class="copy-right">
				
		</div>
	<!--//end-copyright-->
</body>
</html>