<?php
namespace app\index\model;

use think\Model;

class User extends Model
{
//	用户注册
	public function userAdd($data)
	{
		self::data($data);
		self::save();
		return self::getLastInsID();
	}
	
//	验证用户唯一
	public function checkUser($u_tel)
	{
	    return self::where('u_tel',$u_tel)->find();
	}
	
//	用户登录
	public function userLogin($data)
	{
		return self::where($data)->find();
	}
	
//	判断密码
	public function checkPwd($data)
	{
		return self::where($data)->find();
	}
	
//	修改密码
	public function pwdSave($data)
	{
//		return $data;
		return self::save(['u_pwd'=>$data['u_pwd']],['u_id'=>$data['u_id']]);
	}

//	查询手机号
	public function selTel($u_id)
	{
		return self::where('u_id',$u_id)->value('u_tel');
	}
}






