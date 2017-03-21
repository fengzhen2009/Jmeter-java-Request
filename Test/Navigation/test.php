<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta charset="UTF-8">

<title>网址导航~详情</title>
<style type="text/css">
html,body,#div{

	heigth:100%;
	margin:5px;
	padding:5px;
	background:#d9d9d9;
	 }
#div1 {

	width: 100%;
	height: 10%;
	float:top;
	background: #295fb8;
}

#div2 {
margin:5px;
	padding:5px;
	width: 68%;
	height: 100%;
	float: left;
	background:#f7f0f0
}

#div3 {
margin:5px;
	padding:5px;
	width: 28%;
	height:100%;
	background: #f7f0f0;
	float: right;
}
</style>
</head>


<body>
		<div>
			<div id="div1">
				<tr>
					<h2>详情</h2>

				</tr>

			</div>

			<div id="div2">
				<?php
			// 1、导入配置文件
			require ("dbconfig.php");
			
			// 2、连接MySql，先择数据库
			$link = @mysql_connect ( HOST, USER, PASS ) or die ( "数据库连接失败" );
			mysql_select_db ( DBNAME, $link );
			mysql_query("set character set 'utf8'");//读库
			mysql_query("set names 'utf8'");//写库
			
			// 3、执行查询，并返回结果集
			$sql = "select * from record where id={$_GET['id']}";
			$result = mysql_query ( $sql, $link );
			
			// 4、解析结果集,并遍历输出
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				echo "<tr><h2 align='left'>项目名称</h2></tr>";
				echo "<tr><p align='left'>{$row['project']}</p></tr>";
				echo "<tr><h2 align='left'>功能描述</h2></tr>";
				echo "<tr><p align='left'>{$row['descrip']}</p></tr>";
				echo "<tr><h2 align='left'>上线问题反馈</h2></tr>";
				echo "<tr><p align='left'>{$row['feedback']}</p></tr>";
				echo "<tr><h2 align='left'>备注</h2></tr>";
				echo "<tr><p align='left'>{$row['remark']}</p></tr>";
			}
			//5、释放结果集
			mysql_free_result($result);
			mysql_close($link);
				
			?>
			</div>
			
			<div id="div3">
			<?php
			// 1、导入配置文件
			require ("dbconfig.php");
			
			// 2、连接MySql，先择数据库
			$link = @mysql_connect ( HOST, USER, PASS ) or die ( "数据库连接失败" );
			mysql_select_db ( DBNAME, $link );
			mysql_query("set character set 'utf8'");//读库
			mysql_query("set names 'utf8'");//写库
			
			// 3、执行查询，并返回结果集
			$sql = "select * from record where id={$_GET['id']}";
			$result = mysql_query ( $sql, $link );
			
			// 4、解析结果集,并遍历输出
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				echo "<table>";
				echo "<tr><h2 align='left'>其他信息</h2></tr>";
				echo "<tr><td align='right'>测试负责人  </td><td align='left'>{$row['people']}</td></tr>";
				//echo "<tr><td align='right'>测试时间  </td><td align='left'>{$row['testtime']}</td></tr>";
				//echo "<tr><td align='right'>上线时间  </td><td align='left'>{$row['releasetime']}</td></tr>";
				//echo "<tr><td align='right'>工作量  </td><td align='left'>{$row['works']}</td></tr>";
				//echo "<tr><td align='right'>终端/平台  </td><td align='left'>{$row['source']}</td></tr>";
				//echo "<tr><td align='right'>版本号  </td><td align='left'>{$row['version']}</td></tr>";
				//echo "<tr><td align='right'>对应测试包  </td><td align='left'>{$row['file']}</td></tr>";
				echo "</table>";
			}
			//5、释放结果集
			mysql_free_result($result);
			mysql_close($link);
				
			?>
			</div>
			
		</div>
</body>
</html>

</body>

</html>