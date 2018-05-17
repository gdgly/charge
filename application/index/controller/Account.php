<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\UserMsg;
use app\index\model\Bills;
use app\index\model\Cards;
use app\index\controller\Common;
use think\Request;

class Account extends Common
{
		
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
				$arr['actime'] = time();
				$arr['money'] = '+'.$data['money'];
				$arr['u_id'] = $u_id;
				$arr['way'] = 1;
				$bill = new Bills();
				$bill->billAdd($arr);
			}
			return $this->redirect('balance');
		}
		$cards = new Cards();
		$data = $cards->selCard($u_id);
		if(empty($data)){
			$ac = substr($_SERVER['PATH_TRANSLATED'],strrpos($_SERVER['PATH_TRANSLATED'],'\\')+1);
			return $this->redirect('cardAdd',['path'=>$ac]);
		}
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
			if($u_money[0]<$data['money']){
        		echo "<script>alert('填写正确提现金额');location.href='forward';</script>";die;
			}
			$res = $usermsg->reduce($u_id,$money);
			if($res){
				$arr['actime'] = time();
				$arr['money'] = '-'.$data['money'];
				$arr['u_id'] = $u_id;
				$arr['way'] = 2;
				$bill = new Bills();
				$bill->billAdd($arr);
			}
			return $this->redirect('balance');
		}
		
		$cards = new Cards();
		$data = $cards->selCard($u_id);
		if(empty($data)){
			$ac = substr($_SERVER['PATH_TRANSLATED'],strrpos($_SERVER['PATH_TRANSLATED'],'\\')+1);
			return $this->redirect('cardAdd',['path'=>$ac]);
		}
		return $this->fetch('forward',['data'=>$data]);
	}
	//账单明细
	public function billShow()
	{
		$u_id = cookie('u_id');
		$bill = new Bills();
		$data = $bill->selBill($u_id);
		$this->assign('data',$data);
		return $this->fetch();
	}
	
//	绑定银行卡
	public function cardAdd()
	{
		$u_id = cookie('u_id');
		$ac = input('path');
		if(Request::instance()->isPost()){
			$data = $_POST;
			$ac = $data['ac'];
			unset($data['ac']);
			$cards = new Cards();
			if($data['card_status'] == 1){
				$res = $cards->selCard($u_id);
				if($res){
					$cards->cardSav(['card_status'=>0],['u_id'=>$u_id,'card_status'=>1]);
				}
			}
			
			$data['u_id'] = $u_id;
			$cards->addCard($data);

			if($ac == "recharge"){
				return $this->redirect('account/recharge');die;
			}else if($ac == "forward"){
				return $this->redirect('account/forward');die;
			}else{
				return $this->redirect('users/index');
			}
			
		}
		$this->assign('ac',$ac);
		return $this->fetch('card_add');
	}
}

