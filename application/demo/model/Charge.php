<?php
namespace app\demo\model;

use think\Model;
use think\Db;

class Charge extends Model
{
	//查找未审核的充电站
	public function findone()
	{
		

		
		$res = $this->where('c_status=1')->select();
//		var_dump($res);die;
		$arr = array();
		if($res)
		{
			foreach ($res as $key => $val) 
			{
				$arr[]=$val->data;
			}
//			var_dump($arr);die;
			return $arr;
		}
		else
		{
			return $arr;
		}
	}
	
	//修改审核状态
	public function upl($id)
	{
		$res = $this->save(['c_status'  => '0'],['c_id' => $id]);
		return $res;
	}
	
	//展示全部
	public function show()
	{
		$arr = [];
		$res = $this->where('c_status=0')->select();
		if(!empty($res))
		{
			foreach ($res as $key => $val)
			{
				$arr[] = $val->data;
			}
		}
		return $arr;
	}
	
	//删除
	public function delone($id)
	{
		return $this->where("`c_id`=$id")->delete();
	}
}
