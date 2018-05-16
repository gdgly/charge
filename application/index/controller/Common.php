<?php
namespace app\index\controller;

use think\Controller;

use think\Cookie;

class Common extends Controller
{
	public function __construct(){
		parent::__construct();
		
		$u_id = Cookie::get("u_id"); 
		
		if(empty($u_id)){
			$this->redirect('Users/index');
		}
	}
}

?>