<?php
namespace app\index\controller;
use think\Controller;
use think\model;
use think\Cookie;

use app\index\model\Charge; 
use app\index\model\Bills;

use app\index\controller\Common;
use think\Db;

class Order extends Common
{
	public function order()
	{	
		$uid = Cookie::get('u_id');
		$order = model('OrderModel');
		$data = $order->showord($uid);
		
		$arr = array();
		foreach($data as $key=>$val){
			if($val['o_status'] == 1){
				$arr = $this->going($data[$key]);
			}
		}
//		echo "<pre>";
//		print_r($arr);exit;
		//查询订单
		$this->assign('data',$data);
		$this->assign('arr',$arr);
		return $this->fetch();
	}
	
	public function going($order = "")
	{
		
		if(!empty($order)){
			$model_c = new Charge();
			$charge = $model_c->showyi($order['cid']);
			
			$money = round($order['dur_time']/60*$charge['c_money']);
			
			if($order['dur_time']/3600 == 1){
				$time = 1;
			}else if($order['dur_time']/3600 == 2){
				$time = 2;
			}else if($order['dur_time']/3600 == 3){
				$time = 3;
			}else{
				$time = 0;
			}
			
			$pur = Cookie::get('quan'.$order['pid']);

			$arr = array(
				'pay_time'=>$order['dur_time'],
				'money'=>$money,
				'pur'=>$pur,
				'time'=>$time,
				'pid'=>$order['pid'],
				'cid'=>$order['cid'],
			);
			return $arr;
		}
	}	
	
	public function reduce()
	{
		$uid = Cookie::get('u_id');
		$o_id = $_POST['o_id'];
		$pwd = md5($_POST['pwd']);

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
						'money'=>'+'.$money,
						'actime'=>time(),
						'way'=>3,
						'u_id'=>$uid
					);
					$order->addbills($bil);
					$upds = $order->updstatus($o_id);
					if($upds){
						$model = new Bills();
						$model_c = new Charge();
						
						$ass = $model_c->showyi($ord['cid']);
						
						$bil = array(
							'money'=>'-'.$money,
							'actime'=>time(),
							'way'=>5,
							'u_id'=>$ass['u_id'],
						);
						$order->addbills($bil);	
						
						Db::table('user_msg')->where('u_id', $ass['u_id'])->setInc('u_money',$money);

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

