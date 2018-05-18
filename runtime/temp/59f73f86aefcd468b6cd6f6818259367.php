<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/index\view\index\index.html";i:1526461474;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\layout.html";i:1526461474;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\header.html";i:1526626741;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\footer.html";i:1526626769;}*/ ?>

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

	﻿
<base href="/index/" />
<!--header-end-->
<header class="header" id="header">
<a href="javascript:history.go(-1)" target=_self class="back">充电桩</a>

</header>

<!--container-end-->
                    <style type="text/css">
                    body{font-size:10px;} 

                    body, html {width: 100%;height: 96%;margin:0;font-family:"微软雅黑";}
                    #allmap{width:100%;height:80%;}
                    p{margin-left:5px; font-size:14px;}
                    </style>
                    <div style="margin-top:60px;" id="allmap" >

                    </div>
                    <div id="r-result"></div>
                    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=fdekcE0GUm4Rfwsb9ZXGEiRTSXevABoG"></script>
                    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
                    <script src='/index/js/jquery.min.js' ></script>
                    <script>
                    // 百度地图API功能
                    var map = new BMap.Map("allmap");    // 创建Map实例
                    map.centerAndZoom(new BMap.Point(116.404, 39.915), 10);  // 初始化地图,设置中心点坐标和地图级别
                    //添加地图类型控件
                    map.addControl(new BMap.MapTypeControl({
                      mapTypes:[
                              BMAP_NORMAL_MAP,
                              BMAP_HYBRID_MAP
                          ]}));   
                    map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
                    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩

                        var geocoder= new BMap.Geocoder(); 

                        map.addEventListener("click",function(e){ //给地图添加点击事件
                                      
                              geocoder.getLocation(e.point,function(rs){
                              // console.log(rs.addressComponents.city); //城市
                              // alert(rs.addressComponents.district); //区县
                              // alert(rs.addressComponents.street); //街道
                                 // alert(rs.address); //地址描述(string)
                                  var output = "从天安门到"+rs.addressComponents.district+rs.addressComponents.street+"驾车需要";
                                  var searchComplete = function (results){
                                    if (transit.getStatus() != BMAP_STATUS_SUCCESS){
                                      return ;
                                    }
                                    var plan = results.getPlan(0);
                                    output += plan.getDuration(true) + "\n";                //获取时间
                                    output += "总路程为：" ;
                                    output += plan.getDistance(true) + "\n";             //获取距离
                                  }
                                  var transit = new BMap.DrivingRoute(map, {renderOptions: {map: map},
                                    onSearchComplete: searchComplete,
                                    onPolylinesSet: function(){        
                                      setTimeout(function(){alert(output)},"1000");
                                  }});
                                  transit.search("天安门",rs.addressComponents.district+rs.addressComponents.street);
                                      

                                  //玛丽走路
                                  var myP1 = new BMap.Point(116.404, 39.915);    //起点
                                  var myP2 = new BMap.Point(e.point.lng,e.point.lat);    //终点
                                  var myIcon = new BMap.Icon("http://lbsyun.baidu.com/jsdemo/img/Mario.png", new BMap.Size(32, 70), {    //小车图片
                                        //offset: new BMap.Size(0, -5),    //相当于CSS精灵
                                        imageOffset: new BMap.Size(0, 0)    //图片的偏移量。为了是图片底部中心对准坐标点。
                                        });
                                      var driving2 = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});    //驾车实例
                                      driving2.search(myP1, myP2);    //显示一条公交线路

                                      window.run = function (){
                                        var driving = new BMap.DrivingRoute(map);    //驾车实例
                                        driving.search(myP1, myP2);
                                        driving.setSearchCompleteCallback(function(){
                                          var pts = driving.getResults().getPlan(0).getRoute(0).getPath();    //通过驾车实例，获得一系列点的数组
                                          var paths = pts.length;    //获得有几个点

                                          var carMk = new BMap.Marker(pts[0],{icon:myIcon});
                                          map.addOverlay(carMk);
                                          i=0;
                                          function resetMkPoint(i){
                                            carMk.setPosition(pts[i]);
                                            if(i < paths){
                                              setTimeout(function(){
                                                i++;
                                                resetMkPoint(i);
                                              },100);
                                            }
                                          }
                                          setTimeout(function(){
                                            resetMkPoint(5);
                                          },100)

                                        });
                                      }

                                      setTimeout(function(){
                                        run();
                                      },1500);
                       
 
                               });

                       });
                      
                    

                    //定位北京天安门
                    var mapType1 = new BMap.MapTypeControl({mapTypes: [BMAP_NORMAL_MAP,BMAP_HYBRID_MAP]});
                    var mapType2 = new BMap.MapTypeControl({anchor: BMAP_ANCHOR_TOP_LEFT});

                    var overView = new BMap.OverviewMapControl();
                    var overViewOpen = new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT});
                    //添加地图类型和缩略图
                    function add_control(){
                      map.addControl(mapType1);          //2D图，卫星图
                      map.addControl(mapType2);          //左上角，默认地图控件
                      map.setCurrentCity("北京");        //由于有3D图，需要设置城市哦
                      map.addControl(overView);          //添加默认缩略地图控件
                      map.addControl(overViewOpen);      //右下角，打开
                    }
                    //移除地图类型和缩略图
                    function delete_control(){
                      map.removeControl(mapType1);   //移除2D图，卫星图
                      map.removeControl(mapType2);
                      map.removeControl(overView);
                      map.removeControl(overViewOpen);
                    }
                    
                    // 百度地图API功能 展示当前的电桩 
                  // var data_info = [[116.417854,39.921988,"地址：北京市东城区王府井大街88号乐天银泰百货八层"],
                  //                  [116.406605,39.921585,"地址：北京市东城区东华门大街"],
                  //                  [116.412222,39.912345,"地址：北京市东城区东华门大街"]
                  //                 ];
                  "<?php  foreach($ch_data as $k => $v){   if($v['c_state'] == 0){ ?>"
                  var marker = new BMap.Marker(new BMap.Point("<?php echo $v['c_x'];  ?>","<?php echo $v['c_y'];  ?>"));

                  var opts = {
                        width : 250,     // 信息窗口宽度
                        height: 80,     // 信息窗口高度
                        title : "<span style='color:black;' ></span>" , // 信息窗口标题
                        enableMessage:true//设置允许信息窗发送短息
                         };
         
                      var content = "充电桩站名：<span style='font-weight:bold'  ><?php echo $v['c_name'];  ?></span><br><?php echo $v['c_site'];  ?><a href='<?php echo url('index/now/index'); ?>?c_id="+"<?php echo $v['c_id']?>"+"' ><span style='color:black;' ></span> <span style='color:red;float:right' >>>详情</span></a><br><img  src='/index/images/status_lv.png' style='width:5%;height=5%;'  >当前充电桩：可用"; 
                      map.centerAndZoom(marker,25);
                      map.addOverlay(marker); 
                      addClickHandler(content,marker);
                      marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

                      "<?php  }else{   ?>"
                       var marker = new BMap.Marker(new BMap.Point("<?php echo $v['c_x'];  ?>","<?php echo $v['c_y'];  ?>"));

                  var opts = {
                        width : 250,     // 信息窗口宽度
                        height: 80,     // 信息窗口高度
                        title : "<span style='color:black;' ></span>" , // 信息窗口标题
                        enableMessage:true//设置允许信息窗发送短息
                         };
         
                      var content = "充电桩站名：<span style='font-weight:bold'  ><?php echo $v['c_name'];  ?></span><br><?php echo $v['c_site'];  ?><a href='<?php echo url('index/ch_details'); ?>?c_id="+"<?php echo $v['c_id']?>"+"' ><span style='color:black;' ></span> <span style='color:red;float:right' ></span></a><br><?php  if($v['c_state'] == 1){ ?><img  src='/index/images/bky.png' style='width:5%;height=5%;'  >当前充电桩：不可用<?php }else if($v['c_state'] == 2){ ?><img  src='/index/images/gz.png' style='width:5%;height=5%;'  >当前充电桩：故障 <?php } ?>"; 
                      map.centerAndZoom(marker,25);
                      map.addOverlay(marker); 
                      addClickHandler(content,marker);
                      // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画


                      "<?php } } ?>"
                      function addClickHandler(content,marker){
                        marker.addEventListener("mouseover",function(e){
                          openInfo(content,e)}
                        );
                      }
                      function openInfo(content,e){
                        var p = e.target;
                        var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                        var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象 
                        map.openInfoWindow(infoWindow,point); //开启信息窗口
                      }

                      

                    //缩放地图
                    map.centerAndZoom(new BMap.Point(116.404, 39.915), 16);
                    // 添加带有定位的导航控件
                    var navigationControl = new BMap.NavigationControl({
                      // 靠左上角位置
                      anchor: BMAP_ANCHOR_TOP_LEFT,
                      // LARGE类型
                      type: BMAP_NAVIGATION_CONTROL_LARGE,
                      // 启用显示定位
                      enableGeolocation: true
                    });
                    map.addControl(navigationControl);
                    // 添加定位控件
                    var geolocationControl = new BMap.GeolocationControl();
                    geolocationControl.addEventListener("locationSuccess", function(e){
                      // 定位成功事件
                      var address = '';
                      address += e.addressComponent.province;
                      address += e.addressComponent.city;
                      address += e.addressComponent.district;
                      address += e.addressComponent.street;
                      address += e.addressComponent.streetNumber;
                      alert("当前定位地址为：" + address);
                    });
                    geolocationControl.addEventListener("locationError",function(e){
                      // 定位失败事件
                      alert(e.message);
                    });
                    map.addControl(geolocationControl);


                    //跳动的动画
                    // 百度地图API功能
                    var pt = new BMap.Point(116.404, 39.915);
                    var myIcon = new BMap.Icon("http://lbsyun.baidu.com/jsdemo/img/fox.gif", new BMap.Size(200,150));
                    var marker2 = new BMap.Marker(pt,{icon:myIcon});  // 创建标注
                    map.addOverlay(marker2);              // 将标注添加到地图中
                    // marker2.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

                   </script>
                 
                  

<!--footer-->


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
