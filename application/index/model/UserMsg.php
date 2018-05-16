<?php
namespace app\index\model;
use think\Db;
use think\Model;

class UserMsg extends Model
{
//	用户信息
	public function myMsg($u_id)
	{
		return self::where('u_id',$u_id)->find();
	}
//	减金额
	public function reduce($uid,$mon)
	{
		return Db::table('user_msg')->where('u_id', $uid)->setDec('u_money',$mon);
	}
//	加金额
	public function moneyInc($uid,$mon)
	{
		return self::where('u_id', $uid)->setInc('u_money',$mon);
	}
	
	public function selmsg($uid)
	{
		return Db::table('user_msg')->where('u_id', $uid)->find();
	}
	public function upwd($uid,$pwd)
	{
		return Db::table('user_msg')->where('u_id',$uid)->setField('m_pwd',$pwd);
	}
	public function findpwd($uid,$pwd)
	{
		return Db::table('user_msg')->where('u_id',$uid)->where('m_pwd',$pwd)->find();
	}

//	修改信息
	public function upMsg($data,$field=''){
		return self::save($data,$field);
	}
	
//	判断用户信息
	public function checkMsg($data,$field="")
	{
		return self::where($data)->column($field);
	}
	
	
}



