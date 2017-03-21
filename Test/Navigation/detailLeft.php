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
	echo "<tr><h3 align='left'>项目名称</h3></tr>";
	echo "<tr><p align='left'>{$row['project']}</p></tr>";
	echo "<tr><h3 align='left'>功能描述</h3></tr>";
	echo "<tr><p align='left'>{$row['descrip']}</p></tr>";
	echo "<tr><h3 align='left'>上线问题反馈</h3></tr>";
	echo "<tr><p align='left'>{$row['feedback']}</p></tr>";
	echo "<tr><h3 align='left'>备注</h3></tr>";
	echo "<tr><p align='left'>{$row['remark']}</p></tr>";
}
//5、释放结果集
mysql_free_result($result);
mysql_close($link);

?>
</body>
</html>

</body>

</html>