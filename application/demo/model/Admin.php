<?php
namespace app\demo\model;

use think\Model;


class Admin extends Model
{
	//管理员登录
	public function findd($data)
	{
		// $user =new Admin;
		$res = $this->find();
//		 var_dump($res);die;
		
		// var_dump($arr);die;
		if(!empty($res))
		{
			$arr = $res->data;
			return $arr;
		}
		else
		{
			return false;
		}
		// var_dump($arr);
	}
	
	//修改管理员密码
	public function upl($data)
	{
		$res = $this->save(['a_pwd'=>$data['a_pwd']],['a_id'=>$data['a_id'],'a_pwd'=>$data['pwd']]);
//		var_dump($res);
		return $res;
		
	}
}