<?php
namespace app\demo\controller;

use think\Controller;
use app\demo\model\Admin;
use think\Cookie;
/**	
 * 后台登录
 * **/
class Login extends Controller
{
	//首页
    public function index()
    {
       $this->view->engine->layout(false);
       return $this->fetch();
    }
    
    //管理员登录
    public function login()
    {
    	$data = $_POST;
    	$data['a_pwd'] = md5($data['a_pwd']);
//  	var_dump($data);die;
    	$model = new Admin();
//  	var_dump($model);die;
    	$res = $model->findd($data);
//  	var_dump($res);die;
    	if($res)
    	{
    		Cookie::set('a_id',$res['a_id'],3600);
    		$this->redirect('index/index');
    	}
    	else
    	{
    		$this->redirect('login/index');
    	}
    	
    }
    
    //管理员修改密码
    public function upload()
    {
    	$id = Cookie::get('a_id');
//  	var_dump($id);
		return view('login/upload',['id'=>$id]);
    }
    
    //管理员密码修改
    public function upload_to()
    {
    	$data=$_POST;
//  	var_dump($data);
		$data['pwd']=md5($data['pwd']);
		$data['a_pwd']=md5($data['a_pwd']);
		$model = new Admin();
		$res = $model->upl($data);
		if($res!=0)
		{
			Cookie::clear('a_id');
        	return view('login/index');
		}
		else
		{
			$this->error('修改失败 请输入正确的原密码','index/index');
		}
    }
    
    //管理员退出
    public function loginout()
    {
    	Cookie::clear('a_id');
        return view('login/index');
    }
}