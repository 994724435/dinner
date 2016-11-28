<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction{
	public function user(){
		if(!session('user_id')){  // 登录
			echo "<script type='text/javascript'>alert('请先登录！');
			location.href='".__ROOT__."/index.php/User/login';</script>";exit();
		}
		$log = M('log');
		$result = $log->where(array('user_id'=>session('user_id'),'isxiadan'=>1))->select();
		$sum =0;
		foreach ($result as $key => $value) {
			$sum = $sum +$result[$key]['price'];
		}
		$this->assign('result',$result);

		$this->assign('sum',$sum);
		$this->display();
	}

	public function log(){
		if(!session('user_id')){  // 登录
			echo "<script type='text/javascript'>alert('请先登录！');
			location.href='".__ROOT__."/index.php/User/login';</script>";exit();
		}
		$log = M('log');
		if($_POST['deleteId']){
			$result_delete = $log->where(array('id'=>$_POST['deleteId']))->delete();
			if($result_delete){
				echo "<script type='text/javascript'>
			location.href='".__ROOT__."/index.php/Index/log';</script>";exit();
			}else{
				echo "<script type='text/javascript'>alert('删除失败！');
			location.href='".__ROOT__."/index.php/Index/log';</script>";exit();
			}
		}
		if($_POST['name1']){
			$log = M('log');
			$bool =0 ;
			foreach ($_POST as $k => $v) {
				if(is_numeric( $v)){
					$log->where(array('id'=>$v))->save(array('isxiadan'=>1));
					$bool =1 ;
				}
			}
			if ($bool) {
			echo "<script type='text/javascript'>
			location.href='".__ROOT__."/index.php/Index/user';</script>";exit();
			}else{
				echo "<script type='text/javascript'>alert('订单为空！');
			location.href='".__ROOT__."/index.php/Index/log';</script>";exit();
			}
		}
		$result = $log->where(array('user_id'=>session('user_id'),'isxiadan'=>0))->select();
		$sum =0;
		foreach ($result as $key => $value) {
			$sum = $sum +$result[$key]['price'];
		}
		$this->assign('result',$result);

		$this->assign('sum',$sum);
		$this->display();
	}

	public function clientOrderList(){
		if(!session('user_id')){  // 登录
			echo "<script type='text/javascript'>alert('请先登录！');
			location.href='".__ROOT__."/index.php/User/login';</script>";exit();
		}
		$list = M('list');
		$result =$list->where(array('Lid'=>$_GET['id']))->select();
		$this->assign('res',$result[0]);
		if($_GET['id']&&$_GET['name']){
			$data['foodId'] = $_GET['id']; 
			$data['foodName'] = $_GET['name'];
			$data['price'] = $_GET['Lnum'];
			$data['addtime'] = date("Y-m-d H:i:s");
			$data['user_id'] = session('user_id');
			$data['user_name'] = session('user_name');
			$data['num']   = 1;
			$log = M('log');
			$data_add = $log->add($data);
			if($data_add){
				echo "<script type='text/javascript'>
			location.href='".__ROOT__."/index.php/Index/log';</script>";exit();
			}else{
				echo "<script type='text/javascript'>alert('加入失败！');
			location.href='".__ROOT__."/index.php/Index/log';</script>";exit();
			}
		}
		$this->display();
	}

	public function foodDetail(){
		$list = M('list');
		$result =$list->where(array('Lid'=>$_GET['id']))->select();
		$this->assign('res',$result[0]);
		$this->display();
	}

	public function detail(){
		$name=isset($_GET['name']) ? $_GET['name'] : "粤菜" ;
		$list = M('list');
		$result =$list->where(array('Ltype'=>$name))->select();
		$this->assign('result',$result);
		$this->display();
	}
    public function index(){
		$this->display();
    }
	
    //列表
    public function userlog(){
		if(!session('user_id')){
			 echo "<script>alert('请先登录！');</script>";exit;
		}
    	$log=M('log');
		$result =$log->where(array('user_id'=>session('user_id')))->select(); 	
    	$this->assign("result",$result);
    	$this->display();
    }
	
    // 删除日志
	public function deletelog(){
		$log=M('log');
		$result =$log->where(array('id'=>$_GET['id']))->delete(); 
		if($result){
			echo "<script type='text/javascript'>
			location.href='".__ROOT__."/admin.php/Home/userlog';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');
			location.href='".__ROOT__."/admin.php/Home/userlog';</script>";
		}
	}

	// 添加日志
	public function addlog(){
		$log=M('log');
		$result =$log->where(array('id'=>$_GET['id']))->delete(); 
		if($result){
			echo "<script type='text/javascript'>
			location.href='".__ROOT__."/admin.php/Home/userlog';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');
			location.href='".__ROOT__."/admin.php/Home/userlog';</script>";
		}
	}
	
    public function signin(){
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