<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\UserMsg;
use app\index\model\Cards;
use app\index\model\Bills;
use think\Request;

use app\index\controller\Common;

class Integral extends Common
{
	public function index()
	{
		//获取用户id
		$u_id = cookie("u_id");
		$data = Db::table('user_msg')->where('u_id',$u_id)->find();
		$sum = $data['m_num'];
		return $this->fetch("integral",['sum'=>$sum]);
	}
	//积分兑换
	public function convert()
	{
		//获取用户id
		$uid = cookie("u_id");
		//处理数据
		$data = Db::table('user_msg')->where('u_id',$uid)->find();
		Db::table('user_msg')->where('u_id',$uid)->setField('m_num',$data['m_num']-100);
		Db::table('user_msg')->where('u_id',$uid)->setField('u_money',$data['u_money']+1);
	}
	
//	余额
	public function balance()
	{
		$u_id = cookie('u_id');
		$usermsg = new UserMsg();
		$money = $usermsg->checkMsg(['u_id'=>$u_id],'u_money');
		return $this->fetch('balance',['money'=>$money[0]]);
	}
	
//	充值
	public function recharge()
	{
		$u_id = cookie('u_id');
		
		if(Request::instance()->isPost()){
			$data = $_POST;
			$money = $data['money'];
			$usermsg = new UserMsg();
			$res = $usermsg->moneyInc($u_id,$money);
//			添加记录
			if($res){
				$data['actime'] = time();
				$data['money'] = '+'.$data['money'];
				$bill = new Bills();
				$bill->billAdd($data);
			}
			return $this->redirect('integral/balance');
		}
		$cards = new Cards();
		$data = $cards->selCard($u_id);
		return $this->fetch('recharge',['data'=>$data]);
	}
	
//	提现
	public function forward()
	{
		$u_id = cookie('u_id');
		if(Request::instance()->isPost()){
			
			
			$data = $_POST;
			$money = $data['money'];
			$usermsg = new UserMsg();
			$u_money = $usermsg->checkMsg(['u_id'=>$u_id],'u_money');
//			var_dump($u_money);die;
			if($u_money[0]<$data['money']){
        		echo "<script>alert('填写正确提现金额');location.href='forward';</script>";die;
			}
			$res = $usermsg->reduce($u_id,$money);
			if($res){
				$data['actime'] = time();
				$data['money'] = '-'.$data['money'];
				$bill = new Bills();
				$bill->billAdd($data);
			}
			return $this->redirect('integral/balance');
		}
		
		$cards = new Cards();
		$data = $cards->selCard($u_id);
		return $this->fetch('forward',['data'=>$data]);
	}
}
