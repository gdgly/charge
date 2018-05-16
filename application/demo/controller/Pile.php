<?php
namespace app\demo\controller;

use app\demo\controller\Comment;
use think\Db;

class Pile extends Comment
{
	public function show()
	{
		$res = Db::table('pile')->alias('p')->join('charge c','p.cid = c.c_id')->where('p_status=0')->select();
		// var_dump($res);
		return view('pile/show',['res'=>$res]);
	}

	public function upl()
	{
		$p_id = $_GET['p_id'];
		$res = Db::table('pile')->where('p_id', $p_id)->update(['p_status' => '1']);

		if(!empty($res))
		{
			$this->redirect('pile/show');
		}
	}
}