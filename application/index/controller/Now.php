<?php
namespace app\index\controller;
use think\Controller;

use app\index\controller\Common;
use app\index\model\OrderModel;

use app\index\model\Pilemodel;//获取充电桩
use app\index\model\Charge;//获取充电桩
use think\Cookie;

class Now extends Common
{
	//展示充电站的充电口
	public function index()
	{
		$request = request();
		
		$c_id = $request->get('c_id');
		
		$model = new Pilemodel();
		$data = $model->showpile($c_id);
		
		$model_c = new Charge();
		$charge = $model_c->showyi($c_id);
//		var_dump($charge);exit;
	
		$u_id = Cookie::get("u_id");
		$model_o = new OrderModel();
		$order = $model_o->onderOne($u_id);
		$findstatus = $model_o->findstatus($u_id);
//		var_dump($findstatus);exit;
		if(!empty($findstatus))
		{
			echo "<script>alert('有未支付订单，请先支付');location.href='http://www.charge.com/index/order/order.html';</script>";die;
		}
		if(!empty($order)){

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

			echo "<script>alert('正在充电中···');location.href='http://www.charge.com/index/now/charging.html?pay_time=".$order['dur_time']."&money=".$money."&pur=".$pur."&time=".$time."&pid=".$order['pid']."&cid=".$order['cid']."'</script>";
			exit;
		}
		
		return view("index",['data'=>$data,'charge'=>$charge]);
	}
	
	
	//充电选择页面 
	public function now()
	{
		$request = request();
		
		$p_id = $request->get("p_id");
		//查询桩信息 站信息
		$model = new Pilemodel();
		$charge = $model->findpile($p_id);
		//查询充电时长类型\n
		
		$model->uppile($charge['p_id']);
		
		$model = new Pilemodel();
		$dur = $model->showdur();
		//随机电量
		if(empty(Cookie::get('quan'.$p_id)))
		{
			$quantity = rand(1,50);
//			var_dump($quantity);
			Cookie::set('quan'.$p_id,$quantity);
		}
		//计算所需的时间
		$quan = Cookie::get('quan'.$p_id);
//		var_dump($quan);die;
		$q = 100-intval($quan);
		$time = $q*60;
			$d = floor($time / (3600*24));
			$h = floor(($time % (3600*24)) / 3600);
			$m = floor((($time % (3600*24)) % 3600) / 60);
			if($d>'0'){
				$t = $d.'天'.$h.'小时'.$m.'分钟';
			}else{
				if($h!='0'){
					$t = $h.'小时'.$m.'分钟';
				}else{
					$t = $m.'分钟';
				}
			}
//		var_dump($quan);die;
		$m = $time/60;
		$money = $charge['c_money']*$m;
		
		$this->assign('quan',$quan);
		$this->assign('money',$money);
		$this->assign('time',$time);
		$this->assign('t',$t);
		$this->assign('dur',$dur);
		$this->assign('p_id',$p_id);
		$this->assign('charge',$charge);
		return $this->fetch();
	}
	public function charging()
	{	
		$uid = Cookie::get("u_id");
		//账户余额
		$user = model('UserMsg');
		$u = $user->selmsg($uid);
//		var_dump($u);exit;
		//接值
		$request = request();
		if($request->isPost()){
			$data = $request->post();			
		}else{
			$data = $request->get();
		}
		
//		var_dump($data);exit;
		
		if($data['time']=='0')
		{
			//需要的时间
			$need_time = $data['pay_time'];
		}else{
			$t = $data['time'];
			$need_time = $t*3600;
		}

		$quantity = Cookie::get('quan'.$data['pid']);
		
		$order = model('pilemodel');
		
		$ord = $order->showord($uid);
		if(empty($ord)){	
			//添加order表
			$arr =array(
				'cid'=>$data['cid'],
				'pid'=>$data['pid'],
				'start_time'=>time(),
				'uid'=>1,
				'o_number'=>time(),
				'o_status'=>1,
				'dur_time'=>$need_time,
			);

			$order = model('pilemodel');
			$o_id = $order->addord($arr);
		}
		$orde = $order->showord($uid);
//		var_dump($orde);exit;
		$start_time = $orde['start_time'];
		//当前时间
		//剩余的时间
		$sur_time = $need_time-(time()-$start_time);
		//计算电量
		$quantity = 100-floor($sur_time/60);
		//时间计算
		$h = floor(($sur_time % (3600*24)) / 3600);

	    $minutes = floor((($sur_time % (3600*24)) % 3600) / 60);
	
	    $seconds = floor($sur_time % 60);

		$str = $h.':'.$minutes.':'.$seconds;
		$this->assign('o_id',$orde['o_id']);
		$this->assign('sur_time',$sur_time);
		$this->assign('str',$str);
		$this->assign('quantity',$quantity);
		$this->assign('data',$data);
		$this->assign('mon',$u['u_money']);
		
		return $this->fetch();
	}
	public function end()
	{
		$uid = Cookie::get('u_id');
		//实例化model
		$order = model('pilemodel');
		//接到前台带来的订单id
		$o_id = $_GET['o_id'];
		//查询当前订单的桩号
		$end = $order->findord($o_id);
		
		//根据桩号 删除当前桩的cookie
		
		Cookie::delete('quan'.$end['pid']);
		
		//查询站表 获取价格等信息
		$money = $order->showcharge($o_id);
		//拼接修改的数组
		$arr = array(
//			'money'=>$money['c_money'],
			'end_time'=>time(),
			'o_status'=>2
		);
		
		$no = $order->findord($o_id);
		
		if(empty($no['end_time'])){
			$ord = $order->updord($arr,$o_id);
		}

		//执行修改订单 结束
		//查询订单表修改后的信息
		$o = $order->findord($o_id);

		
		$model_p = new  Pilemodel();
		
		$model_p->updatepile($o['pid']);
		
		//计算出所充电的时长
		$time = $o['end_time']-$o['start_time'];
			$d = floor($time / (3600*24));
			$h = floor(($time % (3600*24)) / 3600);
			$m = floor((($time % (3600*24)) % 3600) / 60);
			if($d>'0'){
				$t = $d.'天'.$h.'小时'.$m.'分钟';
			}else{
				if($h!='0'){
					$t = $h.'小时'.$m.'分钟';
				}else{
					$t = $m.'分钟';
				}
			}
			//计算充电时长所花的钱
		$o['sum_money']=$mon=round(($o['end_time']-$o['start_time'])/60*$money['c_money'],2);
		$o['sum_time']=$t;

		if(empty($o['money']))
		{
			$user = model('UserMsg');
			$res = $user->reduce($uid,$mon);
			$ar=array(
				'money'=>$mon
			);
			$red = $order->updord($ar,$o_id);
		}
		//将所有信息放入数组传入前台
		$this->assign('o',$o);
		return $this->fetch();
	}
}
