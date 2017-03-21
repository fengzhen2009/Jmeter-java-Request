<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body {
	padding: 0;
	margin: 0;
	font: normal 12px/24px "\5FAE\8F6F\96C5\9ED1";
	color: #444;
}

table {
	width: 90%;
	height: 80%;
	border: 0;
	margin: 30px auto 0;
	text-align: center;
	border-collapse: collapse;
	border-spacing: 0;
}

table th {
	background: #0090D7;
	font-weight: normal;
	line-height: 30px;
	font-size: 14px;
	color: #FFF;
}

table tr:nth-child(odd) {
	background: #F4F4F4;
}

table td:nth-child(even) {
	
}

table tr:hover {
	background: #73B1E0;
	color: #FFF;
}

table td, table th {
	border: 1px solid #EEE;
}

.abc {
	text-decoration: none;
}

.careful {
	color: #C00;
}

.black {
	color: #000000;
}
</style>
<meta charset="UTF-8">

<title>网址导航</title>
<script type="text/javascript">
	function dodel(id){
			if(confirm("确定要删除吗？")){
					window.location="action2.php?action=del&id="+id;
				}
		}
</script>
</head>


<body>
	<center>
		<h3>
			<span class="careful">上线记录平台</span>

		</h3>
		<table border="0">
			<tr>
				<th>序号</th>
				<th>项目名称</th>
				<th>功能描述</th>
				<th>版本号</th>
				<th>上线时间</th>
				<th>附件</th>
				<th>操作</th>
			</tr>
			<?php
			// 1、导入配置文件
			require ("dbconfig.php");
			
			// 2、连接MySql，先择数据库
			$link = @mysql_connect ( HOST, USER, PASS ) or die ( "数据库连接失败" );
			mysql_select_db ( DBNAME, $link );
			mysql_query ( "set character set 'utf8'" ); // 读库
			mysql_query ( "set names 'utf8'" ); // 写库
			                                 
			// 3、执行查询，并返回结果集
			$sql = "select * from record order by addtime desc";
			$result = mysql_query ( $sql, $link );
			
			$i = 0;
			// 4、解析结果集,并遍历输出
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$i ++;
				echo "<tr>";
				echo "<td align='left'>$i</td>";				
				echo "<td align='left'><a href='details.php?id={$row['id']}' class='abc black'>{$row['project']}</a></td>";
				echo "<td align='left'>{$row['descrip']}</td>";
				echo "<td align='left'>{$row['version']}</td>";
				echo "<td align='left'>{$row['releasetime']}</td>";
				echo "<td align='left'><a href='doDownload.php?filename={$row['filename']}'>下载附件</a></td>";
				echo "<td>
						<a href='javascript:dodel({$row['id']})' class='careful'>删除  </a> &nbsp;&nbsp;
						<a href='recordEdit.php?id={$row['id']}' class='careful'>修改</a></td>";
				echo "</tr>";
			}
			// 5、释放结果集
			mysql_free_result ( $result );
			mysql_close ( $link );
			
			?>
		</table>
	</center>
</body>
</html>