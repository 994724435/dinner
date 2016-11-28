<?php

/**
 * 后台管理
 */

class UserAction extends Action{
	
	// 所有方法调用之前，先执行
	public function _initialize(){
		if(!$_SESSION['name']){
			$this->success("还没有登录",__APP__."/Login/login");
		}
		$this->assign('name',$_SESSION['name']);
	}
	
	// 后台主页(默认，显示管理员列表)
	public function ulist(){
		echo 1;die;
		$admin  =M('admin');
		$re = $admin->select();
		
		// 性别转换
		foreach ($re as $k=>$v){
			if($re[$k]['sex'] == 1){
				$re[$k]['sex'] = '男';
			}else if($re[$k]['sex'] == 2){
				$re[$k]['sex'] = '女';
			}else{
				$re[$k]['sex'] = '保密';
			}
		}
		//var_dump($re);die();
		$this->assign("re",$re);
		$this->assign('name',$_SESSION['name']);
		
		$this->display();
	}
	
	
	
		
	}
	
	
	
	
	
	
	
	
	
	
	
