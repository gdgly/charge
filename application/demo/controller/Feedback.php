<?php
namespace app\demo\controller;

use app\demo\controller\Comment;
use app\demo\model\Opinion;
use app\demo\model\User;
use think\Db;

class Feedback extends Comment
{
	//展示反馈的问题
	public function show()
	{
		$res = Db::table('opinion')->order('o_id','desc')->select();
		$arr = Db::table('user')->select();
//		var_dump($arr);
		if(!empty($res))
		{
			foreach($res as $key => $val)
			{
				foreach ($arr as $k=>$v)
				{
					if($val['u_id']==$v['u_id'])
					{
						$res[$key]['user'] = $v;
					}
				}
			}
		}
		
		return view('feedback/show',['res'=>$res]);
	}
	
}
