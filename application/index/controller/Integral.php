<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\UserMsg;
use app\index\model\Cards;
use app\index\model\Bills;
use think\Request;
use think\Cookie;

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
		
		$remainder = $data['m_num']%100;
		
		$num = $data['m_num']-$remainder;
		
		$money = $num/100;
		
		$arr = array(
			'm_num'=>$data['m_num']-$num,
			'u_money'=>$data['u_money']+$money,
		);
		Db::table('user_msg')->where('u_id',$uid)->setField($arr);
		$data = array(
			'money'=>$money,
			'actime'=>time(),
			'way'=>4,
			'u_id'=>Cookie::get('u_id'), 
		);
		$model = new Bills();
		$model->billAdd($data);
	}
	
}
