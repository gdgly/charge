<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

use app\index\controller\Common;

class Build extends Common
{
    public function index()
    {
        return $this->fetch("build");
    }
    //添加电桩
    public function buildadd()
    {
    	//获取用户id
    	$uid = cookie("u_id");
    	//接值
    	$data = $_POST;
    	$data['u_id'] = cookie("u_id");
    	//入库
    	Db::name("charge")->insert($data);
    	//获取上一条添加的ID
    	$cid = Db('charge')->getLastInsID();
    	//处理添加插孔的数据
    	$arr = array();
    	for($i=1;$i<=$data['c_sum'];$i++){
    		$arr[] = array(
    			'cid'=>$cid,
    			'a_num'=>$i,
    			'p_status'=>1
    		);
    	}
    	//批量添加
    	Db::name('pile')->insertAll($arr);
    }
    //我的电桩
    public function mypile()
    {
    	//获取用户id
    	$uid = cookie("u_id");
    	//查询该用户是否有审核通过的建桩
    	$data = Db::name("charge")->where(['u_id'=>$uid,'c_status'=>0])->select();
    	//查询该用户是否有建桩
    	$data = Db::name("charge")->where(['u_id'=>$uid])->select();
    	//判断是否有建桩信息
    	if($data)
    	{
    		return $this->fetch("mypile",['data'=>$data]);
    	}
    	else
    	{
    		return $this->redirect('build/index');die;
    	}
    }
    //查看电桩详情
    public function pilelist()
    {
    	//获取电桩id
    	$c_id = $_GET['c_id'];
//  	echo $c_id;die;
    	//查询电桩插孔
    	$data = Db::name("pile")->where(['cid'=>$c_id])->select();
    	$name = Db::name("charge")->where(['c_id'=>$c_id])->find();
    	$c_status = $name['c_status'];
//  	echo $c_status;die;
    	$name = $name['c_name'];
    	//渲染页面
    	return $this->fetch("pile_list",['data'=>$data,'name'=>$name,'c_status'=>$c_status]);
    }
    //报修
    public function repairs()
    {
    	//获取插孔id
    	$p_id = $_POST['pid'];
    	//修改插孔状态
    	Db::name('pile')->where('p_id', $p_id)->update(['p_status' => '0']);
    	//查询该充电桩是否能够正常使用
    	$data = Db::name('pile')->where('p_id', $p_id)->find();
    	//对应电桩id
    	$cid = $data['cid'];
//  	echo $cid;die;
		//查询所有插孔状态
		$d = Db::name('pile')->where('cid', $cid)->select();
		//将该电桩下所有插孔状态存入数组
    	$arr = array();
    	foreach($d as $k => $v){
    		$arr[] = $v['p_status'];
    	}
    	//判断是否有能够使用的插孔
		if(!in_array("1",$arr))
		{
			//修改电桩的状态
			Db::name('charge')->where('c_id', $cid)->update(['c_state' => '1']);
		}
    }
}
