<?php
namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Request;
use think\Cookie;
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

    //在充电桩进行评论
    public function chat()
    {
      $chat_model = model('Chat');
      if(request()->get())
      {
          
          $cookie_id = cookie("u_id");
          if(empty($cookie_id))
          {
            return 4;//没有登录
          }
          else
          {
        
          $data = request()->get();

          $array = array(
          'c_content'  =>$data['content'],
          'c_time'     =>time(),
          'u_id'       =>$cookie_id,
          'p_id'       =>isset($data['p_id'])?$data['p_id']:0, 
          );
        
          }

            $arr = $chat_model->adddata($array);
            $us_model = model('UserMsg');
            if(!empty($arr))
            {
              $c_data = $us_model->showone($cookie_id);

              $n_data = array_merge($array,$c_data);
              $arr_n = array(
                'c_id'=>$arr,
                );
              $a_data = array_merge($n_data,$arr_n);
                return $a_data;//成功
            }
            else
            {
                return 2;//失败
            }
        }
        else
        {
          $cookie =  cookie("u_id");
          $data = $chat_model->showall();
      
          $n_data = $this->digui($data);
          // var_dump($n_data);die;
          $this->assign('data',$n_data);
          $this->assign('u_id',$cookie);
          return $this->fetch('chat');
        }
        
    }
    //删除评论
    public function dchat()
    {
        if(request()->get())
        {
            $data = request()->get();
            $chat_model = model('Chat'); 
            $delete = array(
              'c_id'=>$data['where'],
              'p_id'=>$data['where']
              );
            $one_c = $chat_model->del_c($delete);
            if($one_c)
            {
              return 1;
            }
            else
            {
              return 2;
            }
        }
        else
        {
          return 4;//请选择一条数据
        }

    }

   function digui($arr,$path=0,$f=0){
        static $data=array();
        foreach ($arr as $k => $v) {
            if($v['p_id']==$path){
                $v['f']=$f;   
                $data[]=$v;
                $this->digui($arr,$v['c_id'],$f+1);
            }

        }
        return $data;
     }
}
