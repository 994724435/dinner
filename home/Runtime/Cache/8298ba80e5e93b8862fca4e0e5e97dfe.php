<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<!-- 包含公共的JSP代码片段 -->
	
<title>无线点餐平台</title>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="__ROOT__/Public/index/js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Public/index/js/page_common.js"></script>
<link href="__ROOT__/Public/index/css/common_style_blue.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/index_1.css" />
<link href="__ROOT__/Public/index/css/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.username{margin-top: 50px;}
	.login{margin-top: 100px;}
</style>
</head>
<body style="text-align: center">
	<div id="all">
		<div id="menu">
			<!-- 显示菜品的div -->
			<div id="top">
				<div class="login">
					<form action="" method="post"> 
					<div class="username">用 户 名  ：<input type="text" name="Name"></div>
					<div class="username">密&nbsp;&nbsp;码 ：<input type="password" name="pwd"></div>
					<!-- <div class="username">确认密码 ：<input type="text" name="pwd1"></div> -->
					<div class="username"><input type="submit" value="提交"></div>
						</form>
				</div>
			</div>
			
			<!-- 底部分页导航条div -->
			<div id="foot">
				
					
					
						<span
							style="float:left; line-height:53PX; margin-left:-50px; font-weight:bold; ">
							<span style="font-weight:bold">&lt;&lt;</span>
						</span>
					
				
				<div id="btn">
					<ul>
						<!-- 参看 百度, 谷歌是 左 5 右 4 -->
						
							<li><a
								href="#">1</a></li>
						
					</ul>
				</div>
						<span style="float:right; line-height:53px; margin-right:10px;  ">
							<span style="font-weight:bold">&gt;&gt;</span>
						</span>
					
				
			</div>
			
		</div>

		<!-- 右边菜系列表，菜品搜索框  -->
		﻿<div id="dish_class">
			<div id="dish_top">
				<ul>
				<li class="dish_num" style="background: none;"></li>
					<li>
					<?php  if($is_login){ echo "<a href='__ROOT__/index.php/Index/log'>
							<img src='__ROOT__/Public/index/images/call2.gif' />
						</a>"; } ?>
						
					</li>

				<!-- 	<li>
						<a href='#'>
							登 录
						</a>
					</li> -->

				</ul>
			</div>

			<div id="dish_2">
				<ul>
					
						<li>
							<a href="__ROOT__/index.php/Index/detail/name/粤菜">粤菜</a>
						</li>
					
						<li>
							<a href="__ROOT__/index.php/Index/detail/name/川菜">川菜</a>
						</li>
					
						<li>
							<a href="__ROOT__/index.php/Index/detail/name/湘菜">湘菜</a>
						</li>
					
						<li>
							<a href="__ROOT__/index.php/Index/detail/name/东北菜">东北菜</a>
						</li>
					
				</ul>
			</div>
			<div id="dish_3">
				<!-- 搜索菜品表单 $name  -->
				<form action="#" method="post">
					<table width="166px">
					<?php  if($is_login==0){ echo "<tr>
							<td>
								<a href='__ROOT__/index.php/User/login'>
									<img src='__ROOT__/Public/index/images/look.gif' />
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href='__ROOT__/index.php/User/register'>
									<img src='__ROOT__/Public/index/images/look2.gif' />
								</a>
							</td>
						</tr>"; } ?>
					<?php  if($is_login){ echo "
				        <tr>
						<td style='color: red;text-align: center;'><a href='__ROOT__/index.php/Index/user' style='text-decoration: none;'><h3>我的下单</h3></a></td>
						</tr>
						<tr>
							
							<td>
								<a href='__ROOT__/index.php/User/login'>
									<img src='__ROOT__/Public/index/images/out.gif' />
								</a>
							</td>
						</tr>"; } ?>						
					</table>
				</form>
			</div>
		</div>
		
	</div>
</body>
</html>