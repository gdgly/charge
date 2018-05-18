<?php
	
namespace app\index\model;
use think\Db;
use think\Model;

class Cards extends Model
{	
	public function selCard($u_id)
	{
		$res = self::where('u_id',$u_id)->select();
		if(!empty($res)){
			$data = [];
			foreach($res as $v){
				$data[] = $v->data;
			}
			return $data;
		}
		return $res;
	}
	//修改银行卡状态
	public function cardSav($data,$where=''){
		return self::save($data,$where);
	}
	
	public function addCard($data)
	{
		return self::insert($data);
	}
}
