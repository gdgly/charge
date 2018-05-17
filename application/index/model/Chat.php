<?php 
//命名空间
namespace app\index\model;
//引入model类
use think\Model;
//引用数据库
use think\Db;

class chat  extends  Model
{
	 //设置表
	 protected $table = 'chat';

	 public function adddata($data)
	 {
	 	$this->data=$data;
	    $this->save();
	 	return  Db('chat')->getLastInsID();
	 }

	 public function showall()
	 {
	 	return Db('chat')->alias('c')->join('user u','c.u_id = u.u_id','left')->join('user_msg um','c.u_id = um.u_id','left')->field('c.u_id,c.c_id,c.c_content,c.c_time,c.p_id,u.u_tel,um.u_img')->order('c.c_id desc')->select(); 
	 }

	 public function del_c($id)
	 {
	 	return Db('chat')->delete($id);
	 }

}