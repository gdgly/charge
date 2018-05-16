<?php
namespace app\demo\model;

use think\Model;

class User extends Model
{
	//查询全部用户的id
	public function findone()
	{
		$arr = [];
		$res = $this->select();
		if(!empty($res))
		{
			foreach ($res as $key => $val)
			{
				$arr[] = $val->data;
			}
		}
//		$arr = [];
//		foreach($data as $key=>$val)
//		{
//			$res = $this->where('u_id',$val)->find();
////			var_dump($res);die;
//			if(!empty($res))
//			{
//				$arr[]=$res->data;
//			}
//			
//		}
		return $arr;
	}
	
}
