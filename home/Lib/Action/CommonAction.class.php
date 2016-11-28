<?php
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
	public function _initialize(){
		session_start();
		if(session('user_id')){  // 登录
			$this->assign('is_login','1');
			$this->assign('name',session('user_name'));
		}else{					 // 未登录
			$this->assign('is_login','0');
		}	
	}
}