<?php
namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Request;
use think\Cookie;
class Index extends Controller
{
	//首页
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
                    //将数据返回到前台
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
          //调取递归
          $n_data = $this->digui($data);

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
            $showall = $chat_model->showChat();
            $n_del =array();
            $n_one = array();
            $n_two =array();
            $n_t =array();
            foreach ($showall as $k => $v) {
                 if($v['p_id'] == $data['where'])
                 {
                     $n_del[] = $n_one[] =$v['c_id'];
                 }

                if(!empty($n_one))
                {
                      foreach ($n_one as $ke => $va) 
                      {
                            if($v['p_id'] == $va)
                            {
                               $n_del[] =  $n_two[] = $v['c_id'];
                            }
                      }
                 }

                 if(!empty($n_two))
                 {
                        foreach($n_two as $kk => $vv )
                        {
                              if($vv ==$v['p_id'] )
                              {

                                  $n_del[] = $v['c_id'];
                              }
                        }
                 }
            }

            if(empty($n_del))
            {
                //单条进行删除
                $n_delete = array(
                  'c_id'=>$data['where'],
                  );
                $arr = $chat_model->delOne($n_delete);
                if($arr)
                {
                  return 1;//成功
                }
                else
                {
                  return 2;//失败
                }

            }
            else
            {   //多条进行循环删除
                $n_n_del = '';
                foreach ($n_del as $k => $v) {
                    $n_n_del .=", ".$v;
                }
                $n_delete = $data['where'].$n_n_del;
                $arr = $chat_model->delAll($n_delete);
                if($arr)
                {
                  return 1;//成功
                }
                else
                {
                  return 2;//失败
                }
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
