<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网址导航</title>
<style>
body {
	padding: 0;
	margin: 0;
	font: normal 12px/24px "\5FAE\8F6F\96C5\9ED1";
	color: #444;
}

table {
	width: 600px;
	border: 0;
	text-align: center;
	border-collapse: collapse;
	border-spacing: 0;
}

table th {
	background: #0090D7;
	font-weight: normal;
	line-height: 10px;
	font-size: 14px;
	color: #FFF;
}

table tr:nth-child(odd) {
	background: #F4F4F4;
}

table td:nth-child(even) {
	color: #C00;
}

table tr:hover {
	background: #73B1E0;
	color: #FFF;
}

table td, table th {
	border: 1px solid #EEE;
}
</style>
</head>
<body>
	<center>
		<?php  include 'menu.php';//导入导航栏
		header("Content-Type:text/html;charset=utf-8");
		//1、导入配置文件
		require ("dbconfig.php");
		
		//2、连接MySql、选择数据库
		$link = @mysql_connect(HOST,USER,PASS)or die("数据库连接失败");
		mysql_select_db(DBNAME,$link);
		mysql_query("set character set 'utf8'");//读库
		mysql_query("set names 'utf8'");//写库
		
		//3、获取要修改信息的id号，并拼装查看sql语句，执行查询，获取要修改的信息
		$sql="select * from mytest where id={$_GET['id']}";
		$result = mysql_query($sql,$link);

		//4、判断是否获取到了要修改的信息
		if($result && mysql_num_rows($result)>0){
			while ($content = mysql_fetch_assoc($result)){
				if($content['source']='test'){
					$source="测试环境";
				}elseif ($content['source']='release'){
					$source="生产环境";
				}elseif ($content['source']='other'){
					$source="其他相关";
				}
				
			}
		}else {
			die("没有找到要修改的信息!");
		}
?>
		<h3>编辑</h3>
		<form action="action.php?action=update" method="post">
		<input type="hidden" name="id" value="<?php echo $content['id'];?>"/>
			<table border="0">
				<tr>
					<td align="right">环境：</td>
					<td align="left">
						<form>
							<select name="source">
								<option value="test">测试环境</option>
								<option value="release">生产环境</option>
								<option value="other">其他相关</option>
							</select>
						</form>
					</td>
					<td align="left"><input type="text"  name="source" value="<?php echo $content['source'];?>"/>*修改时环境不必修改</td>
				</tr>
				<tr>
					<td align="right">标题：</td>
					<td align="left"><input type="text" size="70" name="title" value="<?php echo $content['title'];?>"/></td>
				</tr>
					<td align="right">编辑人：</td>
					<td align="left"><input type="text" size="70" name="author" value="<?php echo $content['author'];?>" /></td>
				</tr>
				<tr>
					<td align="right">关键字：</td>
					<td align="left"><input type="text" size="70" name="keywords" value="<?php echo $content['keywords'];?>"/></td>
				</tr>
				<tr>
					<td align="right">备注：</td>
					<td align="left"><input type="text" size="70" name="mark" value="<?php echo $content['mark'];?>"/></td>
				</tr>
				<tr>
					<td align="right">网址：</td>
					<td align="left" ><input type="text" size="70" name="url" value="<?php echo $content['url'];?>"/></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
					 <input type="submit" value="提交" />
						&nbsp;&nbsp; <input type="submit" value="返回"  src="index.php"/></td>
				</tr>
			</table>
		</form>
		</center>
</body>
</html>