<?php
namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Request;
use think\Cookie;
use think\Db;
class Comment extends Controller
{
	public function index()
	{
		$request = Request::instance();
		
//		$o_id = $request->get("o_id");
		$o_id =1;

		return view('comment/index',['o_id'=>$o_id]);
	}
	
	public function add()
	{
		$data = $_POST;
//		var_dump($data);
		$o_id = $data['o_id'];
		$arr = Db::table('order')->where('o_id',$o_id)->find();
//		var_dump($arr);die;
		$data['u_id'] = $arr['uid'];
		$data['p_id'] = $arr['pid'];
		$data['now_time'] = time();
		// $data['co_img']= $this->upload();
		$data['img'] = request()->file('img');
		if(!empty($data['img']))
		{
			$data['co_img']= $this->upload();
		}
		else
		{
			$data['co_img']='';
		}
		// var_dump($data);exit;
		unset($data['o_id']);
		unset($data['img']);
		// var_dump($data);die;
		$res = Db::table('comment')->insert($data);
//		var_dump($res);
		if(!empty($res))
		{
			return $this->redirect('comment/show');
		}
	}
	
	public function show()
	{
		$res = Db::table('comment')->alias('co')->join('pile p','co.p_id = p.p_id')->join('charge c','p.cid = c.c_id')->join('user_msg u','co.u_id=u.u_id')->order('co.co_id','desc')->select();
//		var_dump($res);die;
		return view('comment/show',['res'=>$res]);
	}
	
	public function upload(){
	    // 获取表单上传文件
	     // 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('img');
    
    // 移动到框架应用根目录/public/uploads/ 目录下
    $info = $file[0]->move(ROOT_PATH . 'public' . DS . 'uploads');
//  var_dump($info);die;
    if($info){
        // 成功上传后 获取上传信息
        // 输出 jpg
//      echo $info->getExtension();
        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
       return $info->getSaveName();
       // 输出 42a79759f284b767dfcb2a0197904287.jpg
//      echo $info->getFilename(); 
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }

	}
}
