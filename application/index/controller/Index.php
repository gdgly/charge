<?php
namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Request;
class Index extends Controller
{
    public function index()
    { 
      //实例化charge表model
      $ch_model =  Model('Charge');
      //查询所有数据方法是showAll(),根据条件查询需要传查询的条件
      $c_status = "c_status";//查询的字段
      $c_where  = "0";
      $ch_data  = $ch_model->showOne($c_status,$c_where);
      
      $this->assign('ch_data',$ch_data);
        return $this->fetch('index');
    }
    //充电桩详情
    public function ch_details()
    { 
      //获取cookie值判断当前用户是否登录
      $cookie_id = cookie('u_id');
      //判断当前用户是否登录 
      if(!empty($cookie_id)){ 
          //判断当前的是否是get提交
          if(request()->get())
          {
            $ch_id = request()->get();
            var_dump($ch_id);
          }
          else
          {
            echo  "请选择桩位";
          }
       }
       else
       {
          //如果没有登录跳到登录页面
         $this->redirect('Users/index');die;
       }
    }
}
