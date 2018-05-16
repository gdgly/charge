<?php
	
namespace app\index\model;
use think\Db;
use think\Model;

class Bills extends Model
{
	public function billAdd($data,$field='')
	{
		return self::save($data,$field);
	}
<<<<<<< HEAD
	//	账单展示
=======
>>>>>>> ae56fe63fcc0cbf408ef4580945bcea086f61adf
	public function selBill($u_id)
	{
		return self::where('u_id',$u_id)->paginate(10);
	}
}
