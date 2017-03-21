<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta charset="UTF-8">

<title>网址导航~详情</title>

</head>


<body>

			<?php
			// 1、导入配置文件
			//require ("dbconfig.php");
			
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
				echo "<tr><h3 align='left'>其他信息</h3></tr>";
				echo "<tr><td align='right'>测试负责人 &nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['people']}</td></tr>";
				echo "<tr><td align='right'>测试时间&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['testtime']}</td></tr>";
				echo "<tr><td align='right'>上线时间&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['releasetime']}</td></tr>";
				echo "<tr><td align='right'>工作量&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['works']}</td></tr>";
				echo "<tr><td align='right'>终端/平台&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['source']}</td></tr>";
				echo "<tr><td align='right'>版本号&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'>{$row['version']}</td></tr>";
				echo "<tr><td align='right'>附件下载&nbsp;&nbsp;&nbsp;&nbsp;</td><td align='left'><a href='doDownload.php?filename={$row['filename']}'>下载</a></td></tr>";
				echo "</table>";
			}
			//5、释放结果集
			mysql_free_result($result);
			mysql_close($link);
				
			?>
		
</body>
</html>

</body>

</html>