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
	
}
