<?php if (!defined('THINK_PATH')) exit();?>﻿


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/index.css" />
	<script type="text/javascript">
		/** // 删除菜品项
		function removeSorder(node) {
			var gid = node.lang;
			window.location.href = "/wirelessplatform/sorder.html?method=removeSorder&gid="+gid;
		}
		
		// 修改菜品项数量
		function alterSorder(node) {
			var snumber = node.value;
			var gid = node.lang;
			window.location.href = "/wirelessplatform/sorder.html?method=alterSorder&gid="+gid+"&snumber="+snumber;
		}
		*/
		// 下单
		function genernateOrder() {
			window.location.href = "clientOrderList.html";
		}
	</script>
</head>

<body style="text-align: center">
	<div id="all">
		<div id="menu">
			<!-- 餐车div -->
			<div id="count">
				<table align="center" width="100%">
					<tr height="40">
				 		<td align="center" width="20%">菜名</td>
				 		<td align="center" width="20%">单价</td>
				 		<td align="center" width="20%">数量</td>
				 		<td align="center" width="20%">小计</td>
				 		<td align="center" width="20%">操作</td>
				 	</tr>
				 	<?php if(is_array($result)): foreach($result as $key=>$v): ?><tr height="60">
					 		<td align="center" width="20%"><?php echo ($v["foodName"]); ?></td>
					 		<td align="center" width="20%">￥<?php echo ($v["price"]); ?></td>
					 		<td align="center" width="20%">1</td>
					 		<td align="center" width="20%"><?php echo ($v["price"]); ?></td>
					 		<td align="center" width="20%">
					 		 <form action="" method="post">
					 			<input type="hidden" name="deleteId" value="<?php echo ($v["id"]); ?>">
					 			<input type="submit" value="删除" class="btn_next"/>
					 		</form>	
					 		</td>
				 	</tr><?php endforeach; endif; ?>	
					<tr>
						<td colspan="6" align="right">总计:
							<span style="font-size:36px;">&yen;&nbsp;<?php echo ($sum); ?></span>
							<label
								id="counter" style="font-size:36px"></label>
						</td>
					</tr>
					<tr>
						<td colspan="6" style="margin-left: 100px; text-align: center;"align="right">
						<form method="post" action="">
						    <?php if(is_array($result)): foreach($result as $key=>$v): ?><input type="hidden" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>"><?php endforeach; endif; ?>	
							     <input type="hidden" name="name1" value="li">
								 <input type="submit" value="下单" class="btn_next"/>
							</form>		
						</td>
					</tr>
				</table>
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