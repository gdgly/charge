<?php
namespace app\index\model;

use think\Model;

use think\Db;

class Pilemodel extends Model
{
	public function showpile($c_id)
	{
		$arr = Db::table('pile')->where('cid',$c_id)->select();
		return $arr;
	}
	
	//两表查询桩 站信息
	public function findpile($p_id)
	{
		return Db::table('pile')->where('p_id',$p_id)->join('charge','pile.cid=charge.c_id')->find();
	}
	//查询充电类型
	public function showdur()
	{
		return Db::table('duration')->select();
	}
	public function addord($arr)
	{
		Db::table('order')->insert($arr);
		return Db::table('order')->getLastInsId();
	}
	public function selord($uid)
	{
		return Db::table('order')->where('uid',$uid)->find();
	}
	public function showord($uid)
	{
		return Db::table('order')->where('uid',$uid)->where('o_status',1)->find();
	}
	public function showcharge($o_id)
	{
		$cid = Db::table('order')->where('o_id',$o_id)->find();
		return Db::table('charge')->where('c_id',$cid['cid'])->find();
	}
	public function updord($arr,$o_id)
	{
		return Db::table('order')->where('o_id',$o_id)->update($arr);
	}
	public function findord($o_id)
	{
		return Db::table('order')->where('o_id',$o_id)->find();
	}
	
	public function uppile($p_id)
	{
		Db::table('pile')->where('p_id', $p_id)->update(['p_status' => 0]);
	}
	
	public function updatepile($p_id)
	{
		Db::table('pile')->where('p_id', $p_id)->update(['p_status' => 1]);
	}
	
}


