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
		$data['co_img']= $this->upload();
//		var_dump($data);exit;
		unset($data['o_id']);
		$res = Db::table('comment')->insert($data);
//		var_dump($res);
		if(!empty($res))
		{
			return $this->redirect('users/index');
		}
	}
	
	public function upload(){
	    // 获取表单上传文件
	    $files = request()->file('img');
	    foreach($files as $file){
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
		            // 成功上传后 获取上传信息
	            // 输出 jpg
	//         echo $info->getExtension(); 
	            // 输出 42a79759f284b767dfcb2a0197904287.jpg
	            return $info->getFilename(); 
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }    
	    }
	}
}
