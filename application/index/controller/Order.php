<?php
namespace app\index\controller;
use think\Controller;
use think\model;
use think\Cookie;

class Order extends Controller
{
	public function order()
	{	
		$uid = Cookie::get('u_id');
		$order = model('OrderModel');
		//查询订单
		$data = $order->showord($uid);
//		var_dump($data);die;
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	public function reduce()
	{
		$uid = Cookie::get('u_id');
		$o_id = $_POST['o_id'];
		$pwd = md5($_POST['pwd']);
//		var_dump($pwd);die;
		$user = model('UserMsg');
		$order = model('OrderModel');
		
		$fpwd = $user->selmsg($uid);
		if($fpwd['m_pwd']=='')
		{
			//没有支付密码
			echo 3;die;
		}
		if($fpwd['m_pwd']==$pwd){
			//查询订单的钱
			$ord = $order->findord($o_id);
			$money = $ord['money'];
			//减余额
			if($fpwd['u_money']>$money)
			{
				$res = $user->reduce($uid,$money);
					if($res)
					{
					//添加账单
					$bil = array(
						'money'=>'-'.$money,
						'actime'=>time(),
						'way'=>1,
						'u_id'=>$uid
					);
					$bills = $order->addbills($bil);
					$upds = $order->updstatus($o_id);
					if($upds){
						//支付成功
						echo 1;
					}else{
						//支付失败
						echo 4;
					}
				}
			}else{
				//余额不足
				echo 5;
			}
		
//			print_r($res);die;
			
		}else{
			//支付失败 密码错误
			echo 2;
		}
		
		
	}
	
	
}


//$user = model('UserMsg');
//$res = $user->reduce($uid,$mon);