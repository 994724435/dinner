<?php if (!defined('THINK_PATH')) exit();?>﻿
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- 包含公共的JSP代码片段 -->
	
<title>无线点餐平台</title>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="__ROOT__/Public/index/js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Public/index/js/page_common.js"></script>
<link href="__ROOT__/Public/index/css/common_style_blue.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/index_1.css" />
	<link href="__ROOT__/Public/index/css/index.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/dis_message.css" />
</head>
<body style="text-align: center">
	<div id="all">
		<!--左边菜品详细信息 -->
		<div id="menu1">
			<div class="menu2" style="text-align:center;">
				<img src="__ROOT__/Public/index/images/order_detials_bg.png" />
			</div>
			<div class="menu3">
				<div class="menu3_left">
					<img src="__ROOT__<?php echo ($res["Lbig_img"]); ?>"
						style="width:270px; height:290px;" />
				</div>
				<div class="menu3_right">
					<p>菜名:<?php echo ($res["Lname"]); ?></p>
					<p>价格:&nbsp;&nbsp;&yen;&nbsp;<?php echo ($res["Lnum"]); ?></p>
					<p>简介:<?php echo ($res["Ldis"]); ?></p>
				</div>
			</div>
			<div class="menu4">
				
				<a href="__ROOT__/index.php/Index/clientOrderList?id=<?php echo ($res["Lid"]); ?>&name=<?php echo ($res["Lname"]); ?>&Lnum=<?php echo ($res["Lnum"]); ?>" style="background:url(__ROOT__/Public/index/images/img/order_left_corner_bg.png);">加入购物车</a>
				<a href="" onclick="javascript:history.go(-1);" style="background:url(__ROOT__/Public/index/images/img/order_right_corner_bg.png);">返回</a>
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