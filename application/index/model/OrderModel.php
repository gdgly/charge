<?php
namespace app\index\model;
use think\Model;
use think\Db;

class OrderModel extends Model
{
	public function showord($uid)
	{
		return Db::table('order')->join('charge','order.cid=charge.c_id')->order('uid desc')->where('uid',$uid)->select();
	}
	public function findord($o_id)
	{
		return Db::table('order')->where('o_id',$o_id)->find();
	}
	
	public function onderOne($u_id)
	{
		return Db::table('order')->where('uid',$u_id)->where('o_status',1)->find();
	}
	public function updstatus($o_id)
	{
		return Db::table('order')->where('o_id',$o_id)->setField('o_status',3);
	}
	public function addbills($arr)
	{
		return Db::table('bills')->insert($arr);
	}
	
}
