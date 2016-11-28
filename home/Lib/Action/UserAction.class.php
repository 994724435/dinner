<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action{	

	public function login(){
		session('user_id',null);
		session('user_name',null);
		if($_POST['Name']){
			$user = M('user');
			$result =$user->where(array('name'=>$_POST['Name'],'pwd'=>$_POST['pwd']))->select();
			if($result[0]['id']){
				session_start();
				session('user_id',$result[0]['id']);
				session('user_name',$result[0]['name']);
				echo "<script type='text/javascript'>
			location.href='".__ROOT__."/index.php/Index/detail';</script>";
			}else{
				echo "<script>alert('用户名或密码错误！');</script>";
			}
		}
		$this->display();
	}
	
	public function register(){
		if($_POST['Name']){
			if($_POST['pwd']!=$_POST['pwd1']){
				echo "<script>alert('两次密码不一致！');</script>";
				$this->display();exit();
			}
			$user = M('user');
			$result =$user->where(array('name'=>$_POST['Name']))->select();
			if($result[0]['id']){
				echo "<script>alert('用户名已存在！');</script>";
				$this->display();exit();
			}else{
				session_start();
				$data['name'] = $_POST['Name'];
				$data['pwd']  = $_POST['pwd'];	
				$user_add = $user->add($data);
				if($user_add){
					session('user_id',$user_add);
					session('user_name',$_POST['Name']);
					echo "<script type='text/javascript'>
			location.href='".__ROOT__."/index.php/Index/detail';</script>";
					exit;
				}else{
				echo "<script type='text/javascript'>alert('注册失败！');
			location.href='".__ROOT__."/index.php/Index/detail';</script>";
				}
			}
		}
		$this->display();
	}
	
	
	public function four(){
		$userobj =M('user');
		$prize =$userobj->field('prize')->where(array('open_id'=>session('open_id')))->select();
		if($prize[0]['prize']){
			//你已经抽奖了
			echo "<script>alert('你已经抽过奖了');window.location.href='/project/index.php/Index/AllList';</script>";exit;
		}else{
		    $result =$userobj->where(array('open_id'=>session('open_id')))->save(array('prize'=>"谢谢参与"));
		}
		$this->display();
	}
    
	// 显示系统常量
	public function systemList() {
		session('open_id','ddadfasfasdfaf');  //设置session
		print_r(session('open_id'));
		header ( "content-type:text/html;charset=utf-8" );
	
		$str1 = "网站根目录地址：__ROOT__ :******************" . __ROOT__ . "<br>";
		$str2 = "当前项目（入口文件）地址：__APP__ :******************" . __APP__ . "<br>";
		$str3 = "当前模块的URL地址 ：__URL__ :******************" . __URL__ . "<br>";
		$str4 = "当前操作的URL地址  ：__ACTION__ :******************" . __ACTION__ . "<br>";
		$str5 = "当前URL地址   ：__SELF__ :******************" . __SELF__ . "<br>";
		$str6 = "当前项目名     ：APP_NAME :******************" . APP_NAME . "<br>";
		$str7 = "当前项目路径     ：APP_PATH :******************" . APP_PATH . "<br>";
		$str8 = "系统框架路径    ：THINK_PATH :******************" . THINK_PATH . "<br>";
	
		echo $str1 . $str2 . $str3 . $str4 . $str5 . $str6 . $str7 . $str8 . $str9;
	
	}
}