<?php

/**
 * 后台管理
 */

class AdminAction extends Action{
	
	// 所有方法调用之前，先执行
	public function _initialize(){
		if(!$_SESSION['name']){
			$this->success("还没有登录",__APP__."/Login/login");
		}
		$this->assign('name',$_SESSION['name']);
	}
	
	// 删除记录
	public function replyDelete(){
	   $replyObj =M('Reply');
	   $result   = $replyObj->where(array('id'=>$_GET['id']))->delete();
	   if($result){
	      $this->success("删除成功",__APP__.'/Admin/replydone'); 
	   }else{
	      $this->error("删除失败",__APP__.'/Admin/replydone'); 
	   }
	}
	// 处理
	public function replyDo(){
	    $replyObj =M('Reply');
	    $reslut   =$replyObj->where(array('id'=>$_GET['id']))->save(array('isshow'=>0));
	    if($reslut){
	        $this->success("处理成功",__APP__.'/Admin/reply'); 
	    }else{
	        $this->success("您已经处理",__APP__.'/Admin/reply'); 
	    }
	    
	}
	
	// 联合查询 记录
	public function reply(){
	    $reply =M('Reply');
	    $result = $reply->where(array('isshow'=>1))->join('list ON reply.Lid=list.Lid')->select();
		$this->assign('result',$result);
	    $this->display();
	}
	
	public function replydone(){
	    $reply =M('Reply');
	    $result = $reply->where(array('isshow'=>0))->join('list ON reply.Lid=list.Lid')->select();
		$this->assign('result',$result);
	    $this->display();
	}
	
	public function num(){	
		$userobj =M('User');	
		$list    = $userobj->select();
		$total	=count($list);
		$UsernumObj =M('user_num');
		$user_num   =$UsernumObj->select();
		echo  count($user_num)-9;
		array_splice($user_num,0,1);  
		if(count($user_num)>7){  //8,9   
			 $len =count($user_num)-7;
			 for ($i=0;$i<$len;$i++){
			     array_splice($user_num,$i,1);
			 }		     
		}
		
//		 print_r($user_num); die;  //todo 
		$num='';
		foreach($user_num as $k=>$v){
		     $num = $num.','.$user_num[$k]['num'];
		}
		$num_array =explode(',', $num);	
		unset($num_array[0]);
	   // todu
//		print_r($num_array);die;	
		$num1 =implode(",", $num_array);
//	    print_r($expression)

	
		$this->assign('date',$user_num);
		$this->assign('num',$num1);
		$this->display();
		
	}
	
	public function sex(){
		$userobj =M('User');	
		$map['sex']  = array('neq',1);
		$nan    = $userobj->where(array('sex'=>1))->select();
		$gil    =$userobj->where($map)->select();
//		print_r($nan);die;
		$this->assign('nan',count($nan));
		$this->assign('gil',count($gil));
		$this->display();
		
	}
	public function city(){
		$userobj =M('User');	
		$cq    = count($userobj->where(array('province'=>'重庆'))->select());
		$sc    = count($userobj->where(array('province'=>'四川'))->select());
		$this->assign('cq',$cq);
		$this->assign('sc',$sc);
		$this->display();
		
	}
	// public function userinfo()
	// 	{
	// 		//获取微信端的用户列表 open_id
	// 		$userobj =M('User');	
	// 		$info=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxc5d3f404fe2f97b2&secret=2097ca8ce1ddbe01134577281fc0def8');
	// 		$access_token =json_decode($info)->access_token;
	// 	    $user =file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token=$access_token");
	// 		$josn = json_decode($user);
	// 		$openid =$josn->data->openid;
					
	// 		foreach($openid as $k=>$v){
	// 			 $userinfo[$k] =file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid[$k]");
	// 			 $userinfo[$k] =json_decode($userinfo[$k]);
	// 		}
	// 		//录入数据库
	// 		foreach($userinfo as $key=>$val){
	// 			$data[$key]['open_id'] = $userinfo[$key]->openid;
	// 			$data[$key]['nickname'] = $userinfo[$key]->nickname;
	// 			$data[$key]['sex'] = $userinfo[$key]->sex;
	// 			$data[$key]['province'] = $userinfo[$key]->province;
	// 			$data[$key]['headimgurl'] = $userinfo[$key]->headimgurl;
	// 			$data[$key]['subscribe_time'] = $userinfo[$key]->subscribe_time;
	// 		}
			
	// 		//有就更新  无就添加
	// 		foreach($data as $k1=>$v1){
	// 			$res = $userobj->where(array('open_id'=>$data[$k1]['open_id']))->select();
	// 			if($res[0]['id']){				
	// 				$result = $userobj->where(array('open_id'=>$data[$k1]['open_id']))->save($data[$k1]);
	// 			}else{
	// 				$result =$userobj->add($data[$k1]);
	// 			}
	// 		}
	// 		$user_result = $userobj->select();

	// 		$this->assign('user',$user_result);
	// 		$this->display();
			
	// 	}
	// 后台主页(默认，显示管理员列表)
	public function main(){
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
	
	// 添加图书
	public function addBooks(){
		$this->display();
	}
	
	// 处理添加
	public function addBooksDo(){
		$data['Ladmin'] = $_POST['Ladmin'];
		$data['Lname'] = $_POST['Lname'];
		$data['Lnum'] = $_POST['Lnum'];
		$data['Ladmin'] = $_POST['Ladmin'];
		$data['Lplace'] = 0;
		$data['Ltype'] = $_POST['Ltype'];
		$data['Ltime'] = date('Y-m-d',time());
		$data['Ldis'] = $_POST['Ldis'];
		$data['Ldi'] = $_POST['Ldi'];
		$data['Lvideo'] = $_POST['Lvideo'];		
		import('ORG.Net.UploadFile');// 加载文件上传类
		import('ORG.Util.Image');
		
		$upload = new UploadFile();
		
		// 图片上传
		$upload->maxSize  = 3145728 ;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath =  './Public/Uploads/';
		
		
		// 缩略图
		$upload->thumb=true;
		$upload->thumbMaxWidth="50,500";
		$upload->thumbMaxHeight="50,500";
		$upload->thumbPrefix="s1_,s2_";
		$upload->thumbPath="./Public/Uploads/s/";
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{
			$info =  $upload->getUploadFileInfo();
			$big_img = $info[0]['savepath'].$info[0]['savename'];
			$big_img = substr($big_img,1);			
			$data['Lbig_img'] = $big_img;
			$small_img   	  = $info[0]['savepath']."s/s1_".$info[0]['savename'];
			$data['Lsmall_img'] = substr($small_img,1);
//		    print_r($data);die;
			// 图片加水印
//			$Image = new Image();
//			$small_img2 = $info[0]['savepath']."s/s2_".$info[0]['savename'];
//			$Image->water($small_img2,'./Public/logo.png');//缩略图2
//			$Image->water($big_img,'./Public/logo.png');//原图
		
		}
		
		$product = M("list");
		
		$re = $product->add($data);
		if($re){
//			echo 123;
			$this->success("添加成功",__APP__."/Admin/booksList");
		}else{
			echo $product->getLastSql();die();
		}		
		
	}
	
	// 展览列表
	public function booksList(){
		$product = M("list");
		$re = $product->where(array('Lplace'=>0))->select();			
		$this->assign("re",$re);
		$this->display();
	}
	// 展览列表
	public function booksdown(){
		$product = M("list");
		$re = $product->where(array('Lplace'=>1))->select();			
		$this->assign("re",$re);
		$this->display();
	}	

	//修改展览品数据提交
	public function EditList(){
		$Lid	= $_GET['Lid'];
		$product = M("list");
		$result = $product->where(array("Lid"=>$Lid))->select();
		$re		=$result[0];
		$this->assign("re",$re);
		$this->display();
	}
	
	//修改展览品数据
	public function EditListDo(){
		
		$Lid		  =$_POST['Lid'];
		$data['Lname']=$_POST['Lname'];
		$data['Lnum'] =$_POST['Lnum'];
		$data['Ladmin']=$_POST['Ladmin'];
		$data['Lplace']= 0 ;
		$data['Ltime']=date("Y-m-d",time());
		$data['Ltype']=$_POST['Ltype'];
		$data['Ldi']  =$_POST['Ldi'];
		$data['Ldis']=$_POST['Ldis'];
		$data['Lvideo']=$_POST['Lvideo'];
		import('ORG.Net.UploadFile');// 加载文件上传类
		import('ORG.Util.Image');// 图片操作类
		
		$upload = new UploadFile();// 实例化上传类
		
		// 图片上传
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		
		
		// 缩略图
		$upload->thumb=true;//缩略图开启
		$upload->thumbMaxWidth="50,500";//设置缩略图的宽度，多个用逗号分隔（两张缩略图）
		$upload->thumbMaxHeight="50,500";
		$upload->thumbPrefix="s1_,s2_";//设置名称前缀,默认是thumb_
		$upload->thumbPath="./Public/Uploads/s/";//指定缩略图存放目录
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$big_img = $info[0]['savepath'].$info[0]['savename'];
			
			$data['Lbig_img'] = $big_img;
			$data['Lsmall_img'] = $info[0]['savepath']."s/s1_".$info[0]['savename'];
		
			// 图片加水印
//			$Image = new Image();
//			// 给图片添加logo水印
//			$small_img2 = $info[0]['savepath']."s/s2_".$info[0]['savename'];
//			$Image->water($small_img2,'./Public/logo.png');//缩略图2
//			$Image->water($big_img,'./Public/logo.png');//原图
		
		}
		
		
			$product = M("list");
			
			$result= $product->where(array('Lid'=>$Lid))->save($data);
			
			if($result){				
				$this->success('修改成功','booksList');
			}else{
				echo $product->getLastSql();die();
			}
	}
	
	
	// 删除列表里的展览物品
	public function productDelete(){
		$Lid  = $_GET['Lid'];
		$productObj =M('List');
		$result 	=$productObj->where(array('Lid'=>$Lid))->delete();
		if($result){
			echo "<script type='text/javascript'>alert('删除成功');
			location.href='".__ROOT__."/admin.php/Admin/booksList';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除成功');
			location.href='".__ROOT__."/admin.php/Admin/booksList';</script>";	
			//echo $product->getLastSql();die();  //带参数时跳转的URL有问题
		}
		
	}
	
	
	
	//下架
	public function productDown(){
		$Lid  = $_GET['Lid'];
		$productObj =M('List');
		$result 	=$productObj->where(array('Lid'=>$Lid))->save(array('Lplace'=>1));
		if($result){
			echo "<script type='text/javascript'>
			location.href='".__ROOT__."/admin.php/Admin/booksList';</script>";
		}else{
			echo "<script type='text/javascript'>alert('下架失败');
			location.href='".__ROOT__."/admin.php/Admin/booksList';</script>";	
			//echo $product->getLastSql();die();  //带参数时跳转的URL有问题
		}
	}
	
		// 展览列表
	public function productup(){
		$Lid  = $_GET['Lid'];
		$productObj =M('List');
		$result 	=$productObj->where(array('Lid'=>$Lid))->save(array('Lplace'=>0));		
		if($result){
			echo "<script type='text/javascript'>
			location.href='".__ROOT__."/admin.php/Admin/booksdown';</script>";
		}else{
			echo "<script type='text/javascript'>alert('上架失败');
			location.href='".__ROOT__."/admin.php/Admin/booksdown';</script>";	
			//echo $product->getLastSql();die();  //带参数时跳转的URL有问题
		}
	}	
	
	public function userinfo(){
		$log = M('log');
		$result = $log->select();
		$sum =0;
		foreach ($result as $key => $value) {
			$sum = $sum + $value['price'];
		}
		$this->assign("re",$result);
		$this->assign("sum",$sum);
		$this->display();
	}
	
	public function today(){
		$log = M('log');
		$date = date("Y-m-d",time());

		// $where['name']=array('like','111cn%');
		$map['addtime'] = array('like',$date."%");
		$result = $log->where($map)->select();
		$sum =0;
		foreach ($result as $key => $value) {
			$sum = $sum + $value['price'];
		}
		$this->assign("re",$result);
		$this->assign("sum",$sum);
		$this->display();
	}
	
	
}