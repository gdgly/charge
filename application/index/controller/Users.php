<?php
namespace app\index\controller;

use think\Controller;
use think\View;
use app\index\model\User;
use app\index\model\UserMsg;
use think\Request;
use think\Cookie;

class Users extends Controller
{
	
//	用户详情
	public function index()
	{
//		判断用户是否登录
		$u_id = cookie('u_id');

		if(!$u_id){	
			$view = new View();
			return $this->redirect('users/log');
		}
		$usermsg = new UserMsg();
		$data = $usermsg->myMsg($u_id);
		if(empty($data)){
			$user = new User();
			$data['u_nick'] = $user->selTel($u_id);
			$data['u_img'] = '';
		}
		if(empty($data['u_nick'])){
			$user = new User();
			$data['u_nick'] = $user->selTel($u_id);
		}
		
		$this->assign("data",$data);
		
		return $this->fetch('users/index');
	}
	
//	注册页
	public function reg()
	{
		return $this->fetch();
	}
//	登录页
	public function log()
	{
		return $this->fetch();
	}
//	用户注册
    public function register()
    {
        $data = $_POST;
//      判断验证码是否存在
        $s_ver = session($data['u_tel']);
        if($s_ver){
//      	删除验证码
        	session($data['u_tel'],null);
//      	判断验证码是否正确
        	if($s_ver == $data['yzm']){
        	    unset($data['yzm']); 
        		$data['u_pwd'] = md5($data['u_pwd']);
        		
        		$user = new User();
//      		验证手机号唯一
        		if($user->checkUser($data['u_tel'])){
        			echo "<script>alert(手机号已注册)</script>";die;
        		}
        		
        		$u_id = $user->userAdd($data);
        		if($u_id){
        			cookie('u_id',$u_id);
        			return $this->redirect('users/index');
        		}else{
        			return $this->redirect('users/index');
        		}
        		
        	}else{
        		echo "<script>alert('验证码错误');location.href='index';</script>";die;
        	}
        }else{
        	echo "<script>alert('请确认手机号');location.href='index';</script>";die;
        }
    }
    
//  发送短信验证码
    public function sendMsg()
    {
    	$tel = $_POST['tel'];
    	$ver = rand(100000,999999);
    	$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
		$smsConf = array(
//		3090220e3f5ec6fe37e030299b2f44f8
    		'key'   => '79bc8c83c0c9e1e62ddbe48fa0ad48fa', //您申请的APPKEY
    		'mobile'    => $tel, //接受短信的用户手机号码
    		'tpl_id'    => '58485', //您申请的短信模板ID，根据实际情况修改
    		'tpl_value' =>"#code#=".$ver //您设置的模板变量，根据实际情况修改
		);
		
		$content = $this->juhecurl($sendUrl,$smsConf,1); //请求发送短信
		if($content){
			session($tel,$ver);
			echo json_encode(['suc'=>1]);
			die;
		}else{
			echo json_encode(['suc'=>2]);die;
		}
    }
    
    public function juhecurl($url,$params=false,$ispost=0){
	    $httpInfo = array();
	    $ch = curl_init();
	    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
	    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
	    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
	    if( $ispost )
	    {
	        curl_setopt( $ch , CURLOPT_POST , true );
	        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
	        curl_setopt( $ch , CURLOPT_URL , $url );
	    }
	    else
	    {
	        if($params){
	            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
	        }else{
	            curl_setopt( $ch , CURLOPT_URL , $url);
	        }
	    }
	    $response = curl_exec( $ch );
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
	    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
	    curl_close( $ch );
	    return $response;
	}
    
//  用户登录
    public function login()
    {
        $data = $_POST;
        $data['u_pwd'] = md5($data['u_pwd']);
        $user = new User();
        $res = $user->userLogin($data);
        if($res){
        	cookie('u_id',$res['u_id'],3600*24*30);
        	return $this->redirect('index/index');
        }else{
        	return $this->redirect('log');
        }
    }
    
//  用户信息
	public function userMsg()
	{
		$u_id = cookie('u_id');
		$usermsg = new UserMsg();
		$data = $usermsg->myMsg($u_id);
		if(empty($data)){
			$user = new User();
			$data['u_nick'] = $user->selTel($u_id);
			$data['u_img'] = '';
		}
		$this->assign('data',$data);
	    return $this->fetch("userMsg");
	}
	
//	昵称管理
	public function myNick()
	{
		$usermsg = new UserMsg();
		$u_id = cookie('u_id');
//		判断传值方式
		if (Request::instance()->isPost()){
			
			$nick = $_POST['u_nick'];
			$nick = trim(substr($nick,strrpos($nick,":")+1));
			
			if(!$usermsg->checkMsg(['u_id'=>$u_id])){
				$data = ['u_nick'=>$nick,'u_id'=>$u_id];
				$usermsg->upMsg($data);
			}
			$res = $usermsg->upMsg(['u_nick'=>$nick],['u_id'=>$u_id]);
			return $this->userMsg();
			
		}else{
			$data = $usermsg->checkMsg(['u_id'=>$u_id],'u_nick');
			
			if(empty($data[0])){
				$user = new User();
				$data[0] = $user->selTel($u_id);
			}
			$this->assign('data',$data[0]);
			return $this->fetch();
		}
	}
	
	//	头像管理
	public function myImg()
	{
		$u_id = cookie('u_id');
		$usermsg = new UserMsg();
		if (Request::instance()->isPost()){
			$path = $this->upload('face');
//			str_replace('/',"\\",$path);
//			echo $path;die;
//			if(!file_exists($path)){
//				echo "<script>alert('".$path."');location.href='myImg';</script>";die;
//			}
			$data = $usermsg->myMsg($u_id);
//			删除原图
			if($data['u_img']){
				unlink('.'.$data['u_img']);
			}else if(empty($data)){
				$usermsg->upMsg(['u_img'=>$path,'u_id'=>$u_id]);
			}
			$usermsg->upMsg(['u_img'=>$path],['u_id'=>$u_id]);
			
			return $this->redirect('index');
		}
		
		$data = $usermsg->myMsg($u_id);
//		var_dump($data['u_img']);die;
		$this->assign('img',$data['u_img']);
		return $this->fetch();
	}
	
//	修改登录密码
	public function upPwd()
	{
		
		if (Request::instance()->isPost()){
			$u_id = cookie('u_id');
			$old_pwd = $_POST['old_pwd'];
			$new_pwd = $_POST['new_pwd'];
			$check_pwd = $_POST['check_pwd'];
//			判断两次密码
			if($new_pwd!=$check_pwd){
				echo "<script>alert('两次新密码不同');location.href='upPwd';</script>";die;
			}
//			判断原密码
			$user = new User();
			$data = ['u_id'=>$u_id,'u_pwd'=>md5($old_pwd)];
			if(!$user->checkPwd($data)){
				echo "<script>alert('原密码不正确');location.href='upPwd';</script>";die;
			}
			$arr = ['u_id'=>$u_id,'u_pwd'=>md5($new_pwd)];
			
			$user->pwdSave($arr);
			return $this->redirect("users/index");die;
			
		}
		return $this->fetch();
	}
	//支付密码
	public function payPwd()
	{
		$uid = Cookie::get('u_id');
		$user = model('UserMsg');
		if(request()->isPost())
		{
			$data = $_POST;
			if(isset($data['old_pwd']))
			{
				if($data['m_pwd']!=$data['check_pwd'])
				{
					echo "<script>alert('两次新密码不同');location.href='upPwd';</script>";die;
				}
				$p = $user->findpwd($uid,md5($data['old_pwd']));
				if(empty($p))
				{
					echo "<script>alert('您的原始密码输入错误');location.href='payPwd';</script>";die;
				}
				$m_pwd = md5($data['m_pwd']);
				$res = $user->upwd($uid,$m_pwd);
				$this->redirect("users/index");die;
			}else{
//				echo strlen($data['m_pwd']);die;
				if(strlen($data['m_pwd'])!=6)
				{
					echo "<script>alert('密码长度6位');location.href='payPwd';</script>";die;
				}
				$m_pwd = md5($data['m_pwd']);
				$res = $user->upwd($uid,$m_pwd);
				$this->redirect("users/index");die;
			}
			
		}else{
			$userpwd = $user->selmsg($uid);
	//		var_dump($userpwd);die;
			if(empty($userpwd['m_pwd'])){
				$status = array(
					'status'=>2
				);
			}else{
				$status = array(
					'status'=>1
				);
			}
			$this->assign('status',$status);
			return $this->fetch();
		}
		
		
	}
	
	public function upload($file_name){
    	// 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file($file_name);
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	    if($info){
	        // 成功上传后 获取上传信息
	        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	        return '/uploads/'.$info->getSaveName(); 
	    }else{
	        // 上传失败获取错误信息
	        return $file->getError();
	    }
	}
	
	//用户退出登录
	public function loginout()
	{
		Cookie::delete('u_id');
        return $this->redirect("users/log");
	}


}	




