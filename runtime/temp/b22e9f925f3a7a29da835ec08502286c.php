<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"D:\phpStudy\PHPTutorial\WWW\month12\charge\public/../application/index\view\index\chat.html";i:1526603529;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\layout.html";i:1526461474;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\header.html";i:1526461474;s:84:"D:\phpStudy\PHPTutorial\WWW\month12\charge\application\index\view\layout\footer.html";i:1526538286;}*/ ?>

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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/index/chat/css/bootstrap.css">
<style>
	.container{
		width: 80%;
		margin-left: 10%;
	}
	.commentbox{
		width: 900px;
		margin: 20px auto;
	}
	.mytextarea {
	    width: 100%;
	    overflow: auto;
	    word-break: break-all;
	    height: 100px;
	    color: #000;
	    font-size: 1em;
	    resize: none;
	}
	.comment-list{
		width: 900px;
		margin: 20px auto;
		clear: both;
		padding-top: 20px;
	}
	.comment-list .comment-info{
		position: relative;
		margin-bottom: 20px;
		margin-bottom: 20px;
		border-bottom: 1px solid #ccc;
	}
	.comment-list .comment-info header{
		width: 10%;
		position: absolute;
	}

	.comment-list .comment-info header img{
		width: 100%;
		border-radius: 50%;
		padding: 5px;
	}
	.comment-list .comment-info .comment-right{
		padding:5px 0px 5px 11%; 
	}
	.comment-list .comment-info .comment-right h3{
		margin: 5px 0px;
	}
	.comment-list .comment-info .comment-right .comment-content-header{
		height: 25px;
	}
	.comment-list .comment-info .comment-right .comment-content-header span,.comment-list .comment-info .comment-right .comment-content-footer span{
		padding-right: 2em;
		color: #aaa;
	}
	.comment-list .comment-info .comment-right .comment-content-header span,.comment-list .comment-info .comment-right .comment-content-footer span.reply-btn,.send,.reply-list-btn{
		cursor: pointer;
	}
	.comment-list .comment-info .comment-right .reply-list {
		border-left: 3px solid #ccc;
		padding-left: 7px;
	}
	.comment-list .comment-info .comment-right .reply-list .reply{
		border-bottom: 1px dashed #ccc;
	}
	.comment-list .comment-info .comment-right .reply-list .reply div span{
		padding-left: 10px;
	}
	.comment-list .comment-info .comment-right .reply-list .reply p span{
		padding-right: 2em;
		color: #aaa;
	}
</style>

</head>
<body>

<header class="header" id="header">
<a href="javascript:history.go(-2)" target=_self class="back">返回</a>
<h1>互助</h1>
</header>

<script src="/index/chat/demos/googlegg.js"></script>

<div class="container" style="margin-top: 100px;position:absolute; height:400px; overflow:auto" >
	<div class="commentbox" >
		<textarea cols="80" rows="50" placeholder="说出你的问题，快让大家帮助你把。。。。" style="border:1px #145b7d solid;"  class="mytextarea" id="content"></textarea>
		<div class="btn btn-info pull-right" id="comment">评论</div>
	</div>
	
	<?php   foreach($data as $k =>$v){  
			if($v['f'] == 0){
	?>
	<div class="comment-list" style="height:20px;width:90%;margin-top: 100px;" >
		<header><?php if($v['u_img'] !=""){ ?><img src="<?php echo $v['u_img']; ?>" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ><?php  }else{   ?>  <img src="/index/chat/images/0.png" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  > <?php }  ?></header>
			<div class="comment-right">
				<h5>发表人：<?php echo $v['u_tel'];  ?></h5>
				<div class="comment-content-header" style="margin-left: 30px;"  ><span style='float:left;' ><i class="glyphicon glyphicon-time"></i>&nbsp&nbsp<?php echo date("Y-m-d H:i:s",$v['c_time']); ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span  wh="1"    style='float:left;margin-left: 300px;'  w_id='<?php   echo $v["c_id"];  ?>'  class='showall' p_id ='<?php  echo $v["p_id"];  ?>'  p_where='<?php echo $v["c_id"]  ?>'  >
			<?php $a=""; foreach($data  as $ke => $val){  if($v['c_id'] == $val['p_id']){ $a = "1"; } } if($a==1){ ?>
			<img src="/index/chat/images/xx.jpg"   alt="" style="width: 20px;height: 20px;" > <?php  } ?>   </span></div>
				<p class="content" style="margin-left: 30px;font-size:20px;">说：<?php echo $v['c_content'];  ?></p>
				<div class="comment-content-footer">
					<div class="row">
						<div class="col-md-2" style='float: right;margin-right:200px; '   ><span  class="del" where='<?php echo $v["c_id"];  ?>' ><?php  $u_id; if($v['u_id'] == $u_id){  ?> 删除 <?php } ?> &nbsp&nbsp&nbsp</span><span class="reply-btn one-btn"  > 回复</span></div><br>
						<div style="float:right;margin-right: 200px;display: none" class='textqu' >  <input type="text" name="fabao" class="fabao"  style="border: 1px  	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class='send' pid="<?php echo $v['c_id'];  ?>" pn ="<?php echo $v['u_tel']; ?>" w_id='<?php   echo $v["c_id"];  ?>' >&nbsp&nbsp发表&nbsp&nbsp</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>
					</div>
				</div>
			</div>
		</div>
	<?php }else if($v['f'] == 1){  ?>
	<div class="comment-list  <?php echo $v['p_id']  ?>  two" style="height:10px;width:90%;margin-left:100px;margin-top: 100px;display: none;"  two-id = '<?php echo $v["c_id"] ?>'	
	 >
		<header><?php if($v['u_img'] !=""){ ?><img src="<?php echo $v['u_img']; ?>" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ><?php  }else{   ?>  <img src="/index/chat/images/0.png" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  > <?php }  ?></header>
			<div class="comment-right">
				<h5>发表人：<?php echo $v['u_tel'];  ?>&nbsp&nbsp@&nbsp<?php foreach($data  as $ke => $val){  if($v['p_id']== $val['c_id']){echo $val['u_tel'];}   } ?></span></h5>
				<div class="comment-content-header" style="margin-left: 30px;"><span  style='float:left;' ><i class="glyphicon glyphicon-time"></i>&nbsp<?php echo date("Y-m-d H:i:s",$v['c_time']); ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span   style='float:left;margin-left: 300px; '  w_id='<?php  echo $v["p_id"];  ?>' p_id ='<?php  echo $v["p_id"];  ?>' class='showall'  p_where='<?php echo $v["c_id"]  ?>'  >
			<?php $a=""; foreach($data  as $ke => $val){  if($v['c_id'] == $val['p_id']){ $a = "1"; } } if($a==1){ ?>
			<img src="/index/chat/images/xx.jpg"   alt="" style="width: 20px;height: 20px;" > <?php  } ?>   </span></div>
				<p class="content" style="margin-left: 30px;font-size:20px;">说：<?php echo $v['c_content'];  ?></p>
				<div class="comment-content-footer">
					<div class="row">
						<div class="col-md-2" style='float: right;margin-right:200px;' ><span where='<?php echo $v["c_id"];  ?>'  class="del" ><?php  $u_id; if($v['u_id'] == $u_id){  ?> 删除 <?php } ?> &nbsp&nbsp&nbsp</span><span class="reply-btn one-btn" p_id='<?php if($v["f"] == 0 ){   echo $v["c_id"]; } ?>'>回复</span></div>
						<br>
						<div style="float:right;margin-right: 200px;display: none"  class='textqu'>  <input type="text" name="fabao"  class="fabao"   style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class='two-send' pid="<?php echo $v['c_id'];  ?>" pn ="<?php echo $v['u_tel']; ?>" w_id='<?php  echo $v["p_id"];  ?>'  >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>
					
					</div>
				</div>
			</div>
		</div>
	<?php }else if($v['f'] == 2){  ?>
	<div class="comment-list  <?php echo $v['p_id']  ?>" style="height:10px;width:90%;margin-left:150px;margin-top: 100px;display: none;"  therr-id = '<?php echo $v["c_id"] ?>' >
		<header><?php if($v['u_img'] !=""){ ?><img src="<?php echo $v['u_img']; ?>" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ><?php  }else{   ?>  <img src="/index/chat/images/0.png" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  > <?php }  ?></header>
			<div class="comment-right">
				<h5>发表人：<?php echo $v['u_tel'];  ?>&nbsp&nbsp@&nbsp<?php foreach($data  as $ke => $val){  if($v['p_id']== $val['c_id']){echo $val['u_tel'];}   } ?></span></h5>
				<div class="comment-content-header" style="margin-left: 30px;"><span style='float:left;'><i class="glyphicon glyphicon-time"></i>&nbsp<?php echo date("Y-m-d H:i:s",$v['c_time']); ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span  where="3" style='float:left;margin-left: 300px; '  w_id='<?php  foreach($data  as $ke => $val ){ if($val["c_id"] == $v["p_id"] ){   echo $val["p_id"]; } } ?>' p_id ='<?php  echo $v["p_id"];  ?>' class='showall'  p_where='<?php echo $v["c_id"]  ?>'  >
			<?php $a=""; foreach($data  as $ke => $val){  if($v['c_id'] == $val['p_id']){ $a = "1"; } } if($a==1){ ?>
			<img src="/index/chat/images/xx.jpg"   alt="" style="width: 20px;height: 20px;" > <?php  } ?>   </span></div>
				<p class="content" style="margin-left: 30px;font-size:20px;">说：<?php echo $v['c_content'];  ?></p>
				<div class="comment-content-footer">
					<div class="row">
						<div class="col-md-2" style='float: right;margin-right:200px;' ><span class='del' where='<?php echo $v["c_id"];  ?>'><?php  $u_id; if($v['u_id'] == $u_id){  ?> 删除 <?php } ?> &nbsp&nbsp&nbsp</span><span class="reply-btn one-btn" p_id='<?php if($v["f"] == 0 ){   echo $v["c_id"]; } ?>' ></span></div>
						<br>
						<div style="float:right;margin-right: 200px;display: none" class='textqu'  >  <input type="text" name="fabao"  class="fabao"   style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class='therr-send' pid="<?php echo $v['c_id'];  ?>" pn="<?php echo $v['u_tel']; ?>" w_id='<?php  foreach($data  as $ke => $val ){ if($val["c_id"] == $v["p_id"] ){   echo $val["p_id"]; } } ?>' >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>
					</div>
				</div>
			</div>
		</div>
<?php }else if($v['f'] == 3){  ?>
	<div class="comment-list  <?php echo $v['p_id']  ?>   " style="height:10px;width:90%;margin-left:200px;margin-top: 100px;display: none;"
	 >
		<header><?php if($v['u_img'] !=""){ ?><img src="<?php echo $v['u_img']; ?>" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ><?php  }else{   ?>  <img src="/index/chat/images/0.png" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  > <?php }  ?></header>
			<div class="comment-right">
				<h5>发表人：<?php echo $v['u_tel'];  ?>&nbsp&nbsp@&nbsp<?php foreach($data  as $ke => $val){  if($v['p_id']== $val['c_id']){echo $val['u_tel'];}   } ?></span></h5>
				<div class="comment-content-header" style="margin-left: 30px;"><span style='float:left;'><i class="glyphicon glyphicon-time"></i>&nbsp<?php echo date("Y-m-d H:i:s",$v['c_time']); ?></span></div>
				<p class="content" style="margin-left: 30px;font-size:20px;">说：<?php echo $v['c_content'];  ?></p>
				<div class="comment-content-footer">
					<div class="row">
						<div class="col-md-2" style='float: right;margin-right:200px;' ><span  class='del' where='<?php echo $v["c_id"];  ?>'><?php  $u_id; if($v['u_id'] == $u_id){  ?> 删除 <?php } ?> &nbsp&nbsp&nbsp</span><span class="reply-btn one-btn"></span></div>
						<br>
						<div style="float:right;margin-right: 200px;display: none"  class='textqu' >  <input type="text" name="fabao"  class="fabao"  style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class='four-send' pid="<?php echo $v['c_id'];  ?>" pn="<?php echo $v['u_tel']; ?>"  >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>
					</div>
				</div>
			</div>
		</div>
	<?php } } ?>

</div>

<script type="text/javascript" src="/index/chat/js/jquery.min.js"></script>
<script type="text/javascript" src="/index/chat/js/jquery.comment.js" ></script>
<script type="text/javascript" src="/index/chat/js/bootstrap.min.js"></script>
<script type="text/javascript">

	
	$(document).on('click','.showall',function(){
		p_id = $(this).attr("p_where")
		w_id =$(this).attr('w_id');
		$("."+p_id+"").css("display",'block');
		$("."+p_id+"").addClass(w_id);
})
		$(document).on('click','.quxiao',function(){
			$(this).prev().prev().val("")
			$(this).parent().parent().children("span:first-child").show()
			$(this).parent().css('display','none')


			wh = $(this).parent().parent().parent().prev().prev().children().next().attr("wh");
			if(wh == 1)
			{
				$(this).parent().parent().parent().prev().prev().children().next().html("")
				$(this).parent().parent().children().children("span:first-child").html("删除&nbsp&nbsp&nbsp")
			}
		})
		$(document).on('click','.showall',function(){
			p_id = $(this).attr("p_where")
			w_id =$(this).attr('w_id');
			$("."+p_id+"").css("display",'block');
			$("."+p_id+"").addClass(w_id);

			$(this).parent().next().next().children().children().children("span:first-child").html("")
			div = ""
			div +='<img src="/index/chat/images/dk.jpg"   alt="" style="width: 20px;height: 20px;" >'
			$(this).html(div)
			$(this).attr("class","noshow");
		})


	$(document).on('click','.noshow',function(){
		p_id = $(this).attr("p_where")
		cookie = "<?php echo $u_id;  ?>"
		wh    = $(this).attr("wh");
		w_id =$(this).attr('w_id');
		if(wh == 1)
		{
			$("."+w_id+"").css("display",'none');
			$(this).attr("class","showall");
			div = ""
			div +='<img src="/index/chat/images/xx.jpg"   alt="" style="width: 20px;height: 20px;" >'
			$(".textqu").css("display","none")
			$(this).html(div)
			if(cookie != "")
			{
				$(this).parent().next().next().children().children().children("span:first-child").html("删除&nbsp&nbsp&nbsp")
			}
			
		}
		else
		{
		$("."+p_id+"").css("display",'none');
			if(cookie != "")
			{
				$(this).parent().next().next().children().children().children("span:first-child").html("删除&nbsp&nbsp&nbsp")
			}
		div = ""
		div +='<img src="/index/chat/images/xx.jpg"   alt="" style="width: 20px;height: 20px;" >'
		$(this).html(div)
		$(".textqu").css("display","none")
		$(this).attr("class","showall");
		}
	})

	$(document).on('click','.del',function(){
		where =  $(this).attr('where');
		_this = $(this)
		$.ajax({
			type:"get",
			data:{where:where},
			url:"<?php echo url('Index/dchat'); ?>",
			success:function(e)
			{
				if(e == 1)
				{
					_this.parent().parent().parent().parent().parent().remove()
				}
			}

		})
	})


	$(document).on('click','.one-btn',function(){
		if($(".fabao").blur())
		{
			$(".textqu").css('display','none');
		}
		cookie = "<?php echo $u_id;  ?>"
		if(cookie == "")
		{
			location.href='<?php echo url("Users/index"); ?>';
			return false;
		}
		$(this).parent().next().next().css('display','block');

		$("input[name=fabao]").focus();
		
		//查找邮箱图标位置
		p_id    = 	  $(this).parent().parent().parent().prev().prev().children().next().attr("p_where")

		w_id    = $(this).parent().parent().parent().prev().prev().children().next().attr("p_where")
		
			$("."+p_id+"").css("display",'block');
			$("."+p_id+"").addClass(w_id);

			$(this).prev().html("")
			div = ""
			div +='<img src="/index/chat/images/dk.jpg"   alt="" style="width: 20px;height: 20px;" >'
			$(this).parent().parent().parent().prev().prev().children().next().html(div)
			$(this).parent().parent().parent().prev().prev().children().next().attr("class","noshow");
	
		// $(this).parent().parent().parent().parent().parent().append(text)
	})


	$(document).on('click','.send',function(){
		aa = $(this).attr("w_id")
		 var mydate = new Date();
		 y= mydate.getFullYear()
		 m = mydate.getMonth()+1
		 if(m<=9)
		 {
		 	m= "0"+m
		 }
		 d = mydate.getDate();
		 if(d<=9)
		 {
		 	d = "0"+d
		 }	
		 h = mydate.getHours()
		 if(h<=9)
		 {
		 	h = "0"+h
		 }
		 mm = mydate.getMinutes()
		 if(mm<=9)
		 {
		 	mm = "0"+mm
		 }
		 s = mydate.getSeconds()
		 if(s<=9)
		 {
		 	s = "0"+s
		 }
		 day = y+"-"+m+"-"+d+"   "+h+":"+mm+":"+s;

		_this = $(this)

		pid = $(this).attr("pid")
		p_where = $(this).attr("p_where")
		content = $(this).prev().val()

		var pn  = $(this).attr('pn')
		cookie = "<?php echo $u_id;  ?>"
		$.ajax({
			type:'get',
			dataType:'json',
			data:{content:content,p_id:pid},
			url:'<?php echo url("index/chat"); ?>',
			success:function(e)
			{
					
				if(e == 4)
				{	// 先登录
					location.href='<?php echo url("Users/index"); ?>';
				}
				else if(e == 2)
				{
					alert("评论失败")
				}
				else
				{
					if(cookie == e.u_id)
					{
						del = "删除"
					}
					else
					{
						del = ""
					}
					if(e.u_img != "")
					{
						img = e.u_img
					}
					else
					{
						img = '/index/chat/images/0.png';
					}

					text ='<div class="comment-list '+aa+' '+pid+'"  style="height: 20px;width:90%;margin-left:100px;margin-top:100px;">'
					text +='<header> <img src="'+img+'" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ></header>'
					text +='<div class="comment-right">'
					text +='<h5>发表人：'+e.u_tel+'&nbsp&nbsp@&nbsp'+pn+'</h5>'
					text +='<div class="comment-content-header" style="margin-left: 30px;" ><span style="float:left;"><i class="glyphicon glyphicon-time"></i>&nbsp&nbsp'+day+'</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="float:left;margin-left: 300px;"  w_id='+e.c_id+' p_id='+aa+' class="showall"  p_where='+e.c_id+'  ></span></div>'
					text +='<p class="content"  style="margin-left: 30px;font-size:20px;">说：'+content+'</p>'
					text +='<div class="comment-content-footer">'
					text +='<div class="row">'
					text +='<div class="col-md-2" style="float: right;margin-right:200px;" ><span class="del" where='+e.c_id+' >'+del+'&nbsp&nbsp&nbsp</span><span class="reply-btn one-btn">回复</span></div><br><div style="float:right;margin-right: 200px;display: none"  class="textqu"  >  <input type="text"  class="fabao"  name="fabao"  style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class="two-send" pid="'+e.c_id+'"  pn='+pn+' w_id='+aa+' >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					divv =""
					divv += ""
					 _this.parent().parent().parent().parent().parent().after(text)
					 // _this.parent().parent().parent().parent().parent().prev().children().children().("span:first-child").append(divv)
					 _this.prev().val("")
					 _this.parent().css('display','none')
				}
			}
		});
	})
	$(document).on('click','.two-send',function(){
		aa = $(this).attr("w_id")
		 var mydate = new Date();
		 y= mydate.getFullYear()
		 m = mydate.getMonth()
		 if(m<=9)
		 {
		 	m= "0"+m
		 }
		 d = mydate.getDate();
		 if(d<=9)
		 {
		 	d = "0"+d
		 }	
		 h = mydate.getHours()
		 if(h<=9)
		 {
		 	h = "0"+h
		 }
		 mm = mydate.getMinutes()
		 if(mm<=9)
		 {
		 	mm = "0"+mm
		 }
		 s = mydate.getSeconds()
		 if(s<=9)
		 {
		 	s = "0"+s
		 }
		 day = y+"-"+m+"-"+d+"   "+h+":"+mm+":"+s;

		_this = $(this)

		pid = $(this).attr("pid")

		content = $(this).prev().val()

		pn = $(this).attr('pn')

		cookie = "<?php echo $u_id;  ?>"
		$.ajax({
			type:'get',
			dataType:'json',
			data:{content:content,p_id:pid},
			url:'<?php echo url("index/chat"); ?>',
			success:function(e)
			{
				
					if(e == 4)
				{	// 先登录
					location.href='<?php echo url("Users/index"); ?>';
				}
				else if(e == 2)
				{
					alert("评论失败")
				}
				else
				{
					if(cookie == e.u_id)
					{
						del = "删除"
					}
					else
					{
						del = ""
					}

					if(e.u_img != "")
					{
						img = e.u_img
					}
					else
					{
						img = '/index/chat/images/0.png';
					}
					text ='<div class="comment-list '+aa+' '+pid+'"  style="height: 20px;width:90%;margin-left:150px;margin-top:100px;">'
					text +='<header><img src="'+img+'" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ></header>'
					text +='<div class="comment-right">'
					text +='<h5>发表人：'+e.u_tel+'&nbsp&nbsp@&nbsp'+pn+'</h5>'
					text +='<div class="comment-content-header" style="margin-left: 30px;" ><span style="float:left;"><i class="glyphicon glyphicon-time"></i>&nbsp&nbsp'+day+'</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="float:left;margin-left: 300px;"  w_id='+e.c_id+' p_id='+aa+' class="showall"  p_where='+e.c_id+'  ></span></div>'
					text +='<p class="content"  style="margin-left: 30px;font-size:20px;">说：'+content+'</p>'
					text +='<div class="comment-content-footer">'
					text +='<div class="row">'
					text +='<div class="col-md-2" style="float: right;margin-right:200px;" ><span  class="del" where='+e.c_id+'>'+del+'&nbsp&nbsp&nbsp</span><span class="reply-btn one-btn"></span></div><br><div style="float:right;margin-right: 200px;display: none" class="textqu"  >  <input type="text"  class="fabao"  name="fabao"  style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class="therr-send" pid="'+e.c_id+'" w_id='+aa+'  pn='+pn+' >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					 _this.parent().parent().parent().parent().parent().after(text)
					 _this.prev().val("")
					 _this.parent().css('display','none')
				}
			}
		});
	})
	$(document).on('click','.therr-send',function(){
		aa = $(this).attr("w_id")
		 var mydate = new Date();
		 y= mydate.getFullYear()
		 m = mydate.getMonth()
		 if(m<=9)
		 {
		 	m= "0"+m
		 }
		 d = mydate.getDate();
		 if(d<=9)
		 {
		 	d = "0"+d
		 }	
		 h = mydate.getHours()
		 if(h<=9)
		 {
		 	h = "0"+h
		 }
		 mm = mydate.getMinutes()
		 if(mm<=9)
		 {
		 	mm = "0"+mm
		 }
		 s = mydate.getSeconds()
		 if(s<=9)
		 {
		 	s = "0"+s
		 }
		 day = y+"-"+m+"-"+d+"   "+h+":"+mm+":"+s;

		_this = $(this)

		pid = $(this).attr("pid")

		content = $(this).prev().val()

		pn = $(this).attr('pn')

		cookie = "<?php echo $u_id;  ?>"
		$.ajax({
			type:'get',
			dataType:'json',
			data:{content:content,p_id:pid},
			url:'<?php echo url("index/chat"); ?>',
			success:function(e)
			{
					
					if(e == 4)
				{	// 先登录
					location.href='<?php echo url("Users/index"); ?>';
				}
				else if(e == 2)
				{
					alert("评论失败")
				}
				else
				{
					if(cookie == e.u_id)
					{
						del = "删除"
					}
					else
					{
						del = ""
					}

					if(e.u_img != "")
					{
						img = e.u_img
					}
					else
					{
						img = '/index/chat/images/0.png';
					}
					text ='<div class="comment-list '+aa+' '+pid+'"  style="height: 20px;width:90%;margin-left:200px;margin-top:100px;">'
					text +='<header><img src="'+img+'" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ></header>'
					text +='<div class="comment-right">'
					text +='<h5>发表人：'+e.u_tel+'&nbsp&nbsp@&nbsp'+pn+'</h5>'
					text +='<div class="comment-content-header" style="margin-left: 30px;" ><span style="float:left;"><i class="glyphicon glyphicon-time"></i>&nbsp&nbsp'+day+'</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="float:left;margin-left: 300px;"  w_id='+e.c_id+' p_id='+aa+' class="showall"  p_where='+e.c_id+'  ></span></div>'
					text +='<p class="content"  style="margin-left: 30px;font-size:20px;">说：'+content+'</p>'
					text +='<div class="comment-content-footer">'
					text +='<div class="row">'
					text +='<div class="col-md-2" style="float: right;margin-right:200px;" ><span  class="del" where='+e.c_id+' >'+del+'&nbsp&nbsp&nbsp</span><span class="reply-btn one-btn"></span></div><br><div style="float:right;margin-right: 200px;display: none" class="textqu"  > <input type="text"  class="fabao"  name="fabao"  style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class="four-send" pid="'+e.c_id+'" w_id='+aa+'   pn='+pn+' >&nbsp&nbsp发表</button></div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					 _this.parent().parent().parent().parent().parent().after(text)
					 _this.prev().val("")
					 _this.parent().css('display','none')
				}
			}
		});
	})




	$("#comment").click(function(){
		//获取当前时间
		var mydate = new Date();
		 y= mydate.getFullYear()
		 m = mydate.getMonth()
		 if(m<=9)
		 {
		 	m= "0"+m
		 }
		 d = mydate.getDate();
		 if(d<=9)
		 {
		 	d = "0"+d
		 }	
		 h = mydate.getHours()
		 if(h<=9)
		 {
		 	h = "0"+h
		 }
		 mm = mydate.getMinutes()
		 if(mm<=9)
		 {
		 	mm = "0"+mm
		 }
		 s = mydate.getSeconds()
		 if(s<=9)
		 {
		 	s = "0"+s
		 }
		 day = y+"-"+m+"-"+d+"   "+h+":"+mm+":"+s;
		 
		_this = $(this)
		a_this = $
		cookie = "<?php echo $u_id;  ?>"
		//获取内容
		var content = $(this).prev().val();
		$.ajax({
			type:'get',
			dataType:'json',
			data:{content:content},
			url:'<?php echo url("index/chat"); ?>',
			success:function(e)
			{
				if(e == 4)
				{	// 先登录
					location.href='<?php echo url("Users/index"); ?>';
				}
				else if(e == 2)
				{
					alert("评论失败")
				}
				else
				{
					if(cookie == e.u_id)
					{
						del = "删除"
					}
					else
					{
						del = ""
					}
					if(e.u_img != "")
					{
						img = e.u_img
					}
					else
					{
						img = '/index/chat/images/0.png';
					}
					text ='<div class="comment-list"  style="height: 20px;width:90%; margin-top:100px;">'
					text +='<header><img src="'+img+'" alt="" style="height:40px;width:40px;float: left;margin-top: 4px;"  ></header>'
					text +='<div class="comment-right">'
					text +='<h5>发表人：'+e.u_tel+'</h5>'
					text +='<div class="comment-content-header" style="margin-left: 30px;" ><span style="float:left;" ><i class="glyphicon glyphicon-time"></i>&nbsp&nbsp'+day+'</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span  wh="1"    style="float:left;margin-left: 300px;" wh="1" w_id="'+e.c_id+'"  class="showall"   p_where="'+e.c_id+'"  ></span></div>'
					text +='<p class="content"  style="margin-left: 30px;font-size:20px;">说：'+content+'</p>'
					text +='<div class="comment-content-footer">'
					text +='<div class="row">'
					text +='<div class="col-md-2" style="float: right;margin-right:200px" ><span  class="del" where='+e.c_id+' >'+del+'&nbsp&nbsp&nbsp</span><span class="reply-btn one-btn"   >回复</span></div><br><div style="float:right;margin-right: 200px;display: none" class="textqu"  >  <input type="text"  class="fabao"  name="fabao"  style="border: 1px 	#C4C4C4 solid;width: 300px;" placeholder="快说些吧。。" ><button class="send" pid="'+e.c_id+'" w_id="'+e.c_id+'" pn="'+e.u_tel+'"  >&nbsp&nbsp发表</button><button class="quxiao" >&nbsp&nbsp取消&nbsp&nbsp</button></div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					text +='</div>'
					 _this.parent().after(text)
					 a_this('#content').val("")

				}
				
			}
		});
	})
	
</script>


</div>
	
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
