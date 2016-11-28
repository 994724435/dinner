<?php
	/**
	 * 
	 * @authors  lihailong
	 * @date    2015-06-10 16:17:02
	 * @version 1.0
	 */

	//微信公众平台基础接口PHP SDK （面向对象版）
    include('config.php');
	define("TOKEN","weixin");
     error_reporting(E_ALL || ~E_NOTICE);
	$wechat = new Wechat_base_api();


	if(!isset($_GET['echostr']))
	{
		//调用响应消息函数
		$wechat->responseMsg();
	}
	else
	{
		//实现网址接入，调用验证消息函数	
		$wechat->valid();
	}

	class Wechat_base_api{
		//验证消息
		public function valid(){
			if($this->checkSignature())
			{
				$echostr = $_GET["echostr"];
				echo $echostr;
				exit;
			}
			else
			{
				echo "error";
				exit;
			}
		}

		//检查签名
		private function checkSignature()
		{
			//获取微信服务器GET请求的4个参数
			$signature = $_GET['signature'];
			$timestamp = $_GET['timestamp'];
			$nonce = $_GET['nonce'];

			//定义一个数组，存储其中3个参数，分别是timestamp，nonce和token
			$tempArr = array($nonce,$timestamp,TOKEN);

			//进行排序
			sort($tempArr,SORT_STRING);

			//将数组转换成字符串

			$tmpStr = implode($tempArr);

			//进行sha1加密算法
			$tmpStr = sha1($tmpStr);

			//判断请求是否来自微信服务器，对比$tmpStr和$signature
			if($tmpStr == $signature)
			{
				return true;
			}
			else
			{
				return false;
			}
		}	

		//响应消息
		public function responseMsg(){
			//根据用户传过来的消息类型进行不同的响应
			//1、接收微信服务器POST过来的数据，XML数据包

			$postData = $GLOBALS[HTTP_RAW_POST_DATA];

			if(!$postData)
			{
				echo  "error";
				exit();
			}

			//2、解析XML数据包

		 	$object = simplexml_load_string($postData,"SimpleXMLElement",LIBXML_NOCDATA);

		 	//获取消息类型
		 	$MsgType = $object->MsgType;
		 	switch ($MsgType) {
		 		case 'event':
		 				//接收事件推送
		 				$this->receiveEvent($object);	
		 			break;	
		 		case 'text':
		 				//接收文本消息
		 				 echo $this->receiveText($object);
		 			break;
		 		case 'image':
		 		        	//接收图片消息
		 		        	echo $this->receiveImage($object);	
		 			break;
		 		case 'location':
		 		        	//接收地理位置消息
		 		        	echo $this->receiveLocation($object);	
		 			break;	
		 		case 'voice':
		 				//接收语音消息
		 				echo $this->receiveVoice($object);
		 			break; 
		 		case 'video':
		 				//接收视频消息
		 				echo $this->receiveVideo($object);
		 			break;
		 		case  'link':
		 				//接收链接消息
		 				echo $this->receiveLink($object);
		 				break;
		 		default:
		 			break;
		 	}
		}

		//接收事件推送
		private function receiveEvent($obj){
			switch ($obj->Event) {
				//关注事件
				case 'subscribe':
					//扫描带参数的二维码，用户未关注时，进行关注后的事件
					if(!empty($obj->EventKey)){
						//做相关处理
						echo $this->replyNews($obj,"请回复任意的字符，查看展览情况！");
					}
		 $FromUserName=$obj->FromUserName;
		 $url2="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$token&openid=$FromUserName&lang=zh_CN";
	     $res2= get_url($url2);
	     $FromUserName=$res2['nickname'];
         $scene_id=    $obj->EventKey;
         $event=       $obj->Event;
         $CreateTime=  $obj->CreateTime;  									
         $dataArray = array(
		 							array(
		 								"Title"=>"查看扫码详情",
		 								"Description"=>"查看扫码详情",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/zhanlan.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/19/openid/$scene_id"
		 								),
		  							array(
		 								"Title"=>"脉搏器----感知你的心灵！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/1/openid/$scene_id"
		 								),
		 							array(
		 								"Title"=>"交换机----交换你我！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy2.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/3/openid/$scene_id"
		 								),	
		 							array(
		 								"Title"=>"3G芯片----数字的发源地！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/2/openid/$scene_id"
		 								),	
					 				);
					echo $this->replyNews($obj,$dataArray);
					break;
				//取消关注事件
				case 'unsubscribe':
					break;
				//扫描带参数的二维码，用户已关注时，进行关注后的事件
				case 'SCAN':
                                if(!empty($obj->EventKey)){
					}
					                 $username=$obj->FromUserName;
									 $FromUserName=$obj->FromUserName;
                                     $scene_id=    $obj->EventKey;
                                     $event=       $obj->Event;
                                     $CreateTime=  $obj->CreateTime;   
                                         $dataArray = array(
		 							array(
		 								"Title"=>"查看扫码详情，点击了解",
		 								"Description"=>"查看扫码详情",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/zhanlan.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/$scene_id/openid/$FromUserName"
		 								),
		  							array(
		 								"Title"=>"脉搏器----感知你的心灵！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/7.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/1/openid/$FromUserName"
		 								),
		 							array(
		 								"Title"=>"三层交换机----交换你我的世界！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/jiao.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/3/openid/$FromUserName"
		 								),	
		 							array(
		 								"Title"=>"3G芯片----信息数字的发源地！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/3g.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/2/openid/$FromUserName"
		 								),	  
		 							array(
		 								"Title"=>"签到宝----专业的外勤管理软件！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/qian.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/5/openid/$FromUserName"
		 								),
		 							array(
		 								"Title"=>"快  手-----搞笑、猛物，有你爱！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/kuai.png",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/6/openid/$FromUserName"
		 								),			
					 				);
					echo $this->replyNews($obj,$dataArray);
					//做相关的处理
					break;
				//自定义菜单事件
				case 'CLICK':
					//
					switch ($obj->EventKey) {
						case 'key':

					 $username=$obj->FromUserName;
                                         $scene_id=$obj->EventKey;
                                         $dataArray = array(
		 							array(
		 								"Title"=>"欢迎关注1",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://yunkt.qiniudn.com/wxdzp_bg.jpg",
		 								"Url"=>"http://a994724435.017.wwwcnc.com/tanwei/user/index.php?xh=2"
		 								),
		  							array(
		 								"Title"=>"晋赶1",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"https://wx.qq.com/cgi-bin/mmwebwx-bin/webwxgeticon?seq=621086533&username=gh_94ffcda815ac&skey=@crypt_d061de04_614219ccb4b916b642d16bcd4b795e4f",
		 								"Url"=>"http://a994724435.017.wwwcnc.com/tanwei/user/index.php?xh=2"
		 								),
					 				);
					// echo replyText($obj,"欢迎你关注军哥带你玩转微信开发");
					echo $this->replyNews($obj,$dataArray);
         



							//echo $this->replyText($obj,"你的点击的是FAQ事件");
							break;
						default:
							echo $this->replyText($obj,"你的点击的是其他事件");
							break;
					}
					break;
			}	
		}

		//接收文本消息
		private function receiveText($obj){
			//获取文本消息的内容
			$scene_id=$obj->FromUserName;
			// $scene_id=    $obj->EventKey;
			//发送文本消息  用户openid 
		//	return $this->replyText($obj,$username);

		$dataArray = array(
		 							array(
		 								"Title"=>"重庆邮电大学2016展览会",
		 								"Description"=>"重庆邮电大学2016展览会",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/zhanlan.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/19/openid/$scene_id"
		 								),
		  							array(
		 								"Title"=>"脉搏器----感知你的心灵！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/1/openid/$scene_id"
		 								),
		 							array(
		 								"Title"=>"交换机----交换你我！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy2.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/3/openid/$scene_id"
		 								),	
		 							array(
		 								"Title"=>"3G芯片----数字的发源地！",
		 								"Description"=>"this is a test",
		 								"PicUrl"=>"http://a994724435.017.dns01.top/project/Public/index/images/cy.jpg",
		 								"Url"=>"http://a994724435.017.dns01.top/project/index.php/Index/detail/Lid/2/openid/$scene_id"
		 								),	
					 				);
					// echo replyText($obj,"欢迎你关注军哥带你玩转微信开发");
					echo $this->replyNews($obj,$dataArray);
		


		}

		//接收图片消息
		private function receiveImage($obj)
		{
			//获取图片消息的内容
			$imageArr = array(
				"PicUrl"=>$obj->PicUrl,
				"MediaId"=>$obj->MediaId
				);
			//发送图片消息
			return $this->replyImage($obj,$imageArr);
		}

		//接收地理位置消息
		private function receiveLocation($obj)
		{
			//获取地理位置消息的内容
			$locationArr = array(
					"Location_X"=>$obj->Location_X,
					"Location_Y"=>"地址位置经度：".$obj->Location_Y,
					"Label"=>$obj->Label
				);
			//回复文本消息
			return $this->replyText($obj,$locationArr['Location_Y']);	
		}

		//接收语言消息
		private function receiveVoice($obj){
			//获取语言消息内容
			$voiceArr = array(
					"MediaId"=>$obj->MediaId,
					"Format"=>$obj->Format
				);
			//回复语言消息
			return $this->replyVoice($obj,$voiceArr);
		}

		//接收视频消息
		private function receiveVideo($obj){
			//获取视频消息的内容
			$videoArr = array(
					"MediaId"=>$obj->MediaId 
				);
			//回复视频消息
			return $this->replyVideo($obj,$videoArr);			
		}

		//接收链接消息
		private function receiveLink($obj)
		{
			//接收链接消息的内容
			$linkArr = array(
					"Title"=>$obj->Title,
					"Description"=>$obj->Description,
					"Url"=>$obj->Url
				);
			//回复文本消息
			return $this->replyText($obj,"你发过来的链接地址是{$linkArr['Url']}");
		}

		//发送文本消息
		private function replyText($obj,$content){
			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[text]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						</xml>";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),$content);
		        return $resultStr;		
		}

		//发送图片消息
		private function replyImage($obj,$imageArr){
			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[image]]></MsgType>
						<Image>
						<MediaId><![CDATA[%s]]></MediaId>
						</Image>
						</xml>";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),$imageArr['MediaId']);
		        return $resultStr;			
		}

		//回复语音消息
		private function replyVoice($obj,$voiceArr)
		{
			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[voice]]></MsgType>
						<Voice>
						<MediaId><![CDATA[%s]]></MediaId>
						</Voice>
						</xml>";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),$voiceArr['MediaId']);
		        return $resultStr;		
		}

		//回复视频消息
		private function replyVideo($obj,$videoArr){
			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[video]]></MsgType>
						<Video>
						<MediaId><![CDATA[%s]]></MediaId>
						</Video> 
						</xml>";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),$videoArr['MediaId']);
		        return $resultStr;
		}

		//回复音乐消息
		private function  replyMusic($obj,$musicArr)
		{
			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[music]]></MsgType>
						<Music>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<MusicUrl><![CDATA[%s]]></MusicUrl>
						<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
						<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
						</Music>
						</xml>";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),$musicArr['Title'],$musicArr['Description'],$musicArr['MusicUrl'],$musicArr['HQMusicUrl'],$musicArr['ThumbMediaId']);
		        return $resultStr;		
		}

		//回复图文消息
		private function replyNews($obj,$newsArr){
			$itemStr = "";
			if(is_array($newsArr))
			{
				foreach($newsArr as $item)
				{
					$itemXml ="<item>
						<Title><![CDATA[%s]]></Title> 
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>";
					$itemStr .= sprintf($itemXml,$item['Title'],$item['Description'],$item['PicUrl'],$item['Url']);
				}

			}

			$replyXml = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						<Articles>
							{$itemStr}
						</Articles>
						</xml> ";
		        //返回一个进行xml数据包

			$resultStr = sprintf($replyXml,$obj->FromUserName,$obj->ToUserName,time(),count($newsArr));
		        return $resultStr;			
		}
	}