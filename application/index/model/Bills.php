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
}
