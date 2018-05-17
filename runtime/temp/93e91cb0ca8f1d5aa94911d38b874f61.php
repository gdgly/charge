<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/demo\view\index\coordinate.html";i:1526548030;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=z9xwYu6bFfvR9CQQibUSmph8PM8cid2u"></script>
	<title>添加动画标注点</title>
</head>
<body>
	<a href="javascript:history.go(-1)">返回</a>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(<?php echo $res['c_x']; ?>, <?php echo $res['c_y']; ?>);
	map.centerAndZoom(point, 15);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);               // 将标注添加到地图中
	marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
	
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
	

</script>
