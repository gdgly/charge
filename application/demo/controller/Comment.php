<?php
namespace app\demo\controller;

use think\Controller;
use think\Cookie;

class Comment extends Controller
{
    public function __construct()
    {
        //继承父类构造函数
        parent::__construct();
        $id = Cookie::get('a_id');

        if(!$id)
        {
        	$this->error('请先登录！','login/index');
        }

    }
}
