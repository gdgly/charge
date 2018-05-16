<?php
namespace app\demo\controller;

use app\demo\controller\Comment;
use app\demo\model\Charge;
use app\demo\model\User;
use app\demo\model\Pile;
//use think\db;

class Index extends Comment
{
    public function index()
    {
       return $this->fetch();
    }
    
    //充电站审核
    public function examine()
    {
    	//查找未审核的充电站
    	$model = new Charge();
    	$res = $model->findone();
//  	var_dump($res);
    	
    	//查找用户
    	$model1=new User();
    	$res1 = $model1->findone();
//  	var_dump($res1);
    	return view('index/examine',['res'=>$res,'arr'=>$res1]);
    }
    
    //修改审核状态
    public function status()
    {
//  	$id = $_GET['id'];
//  	$sum = $_GET['num'];
    	$data = $_GET;
//  	var_dump($data);die;
    	$model = new Charge();
    	$res = $model->upl($data['cid']);
    	if(!empty($res))
    	{
    		$this->redirect('index/examine');
    	}
    }
    
    //接收地址坐标
    public function coordinate()
    {
    	$this->view->engine->layout(false);
    	$data=$_GET;
//  	var_dump($data);
		return view('index/coordinate',['res'=>$data]);
    }
    
    //展示已审核的充电站
    public function show()
    {
    	$model = new Charge();
    	$res = $model->show();
//  	var_dump($res);
		return view('index/show',['res'=>$res]);
    }
    
    //删除充电站
    public function del()
    {
    	$id = $_GET['id'];
//  	var_dump($id);
		$model = new Charge();
		$res = $model->delone($id);
		if($res)
		{
			$this->redirect('index/show');
		}
		else
		{
			$this->redirect('index/show');
		}
    }
}
