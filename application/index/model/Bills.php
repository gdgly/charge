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

	//	账单展示
<<<<<<< HEAD

=======
>>>>>>> cd43faac8c27fd527d6f2a87f840267d8fdfd9d3
	public function selBill($u_id)
	{
		return self::where('u_id',$u_id)->paginate(10);
	}
}
