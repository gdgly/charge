<?php 
//命名空间
namespace app\index\model;
//引入model类
use think\Model;
//引用数据库
use think\Db;

class Charge  extends  Model
{
	 //设置表
	 protected $table = 'charge';
	
	 //查询charge表里的所有数据
	 public function showAll()
	 {
	 	return Db('charge')->select();
	 }

	 //根据id查询
	 public function showOne($where,$id = "")
	 {
	 	if(empty($id))
	 	{
	 		return Db('charge')->where($where.' = '.$id)->select();
	 	}
	 	else
	 	{
	 		return Db('charge')->where($where.' = '.$id)->select();
	 	}
	 }
	 
	 public function showyi($c_id)
	 {
	 	return Db::table('charge')->where('c_id',$c_id)->find();

	 }
	

}


