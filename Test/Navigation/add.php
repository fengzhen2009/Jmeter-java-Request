<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻管理系统</title>
<style>
body {
	padding: 0;
	margin: 0;
	font: normal 12px/24px "\5FAE\8F6F\96C5\9ED1";
	color: #444;
}

table {
	width: 800px;
	border: 0;
	margin: 100px auto 0;
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
		<?php  include 'menu.php';//导入导航栏?>
		<h3>添加内容</h3>
		<form action="action.php?action=add" method="post">
			<table width="600" border="0">
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
				</tr>
				<tr>
					<td align="right">标题：</td>
					<td align="left"><input type="text" size="70" name="title" /></td>
				</tr>
				<tr>
				
				
				<tr>
					<td align="right">编辑人：</td>
					<td align="left"><input type="text" size="70" name="author" /></td>
				</tr>
				<tr>
					<td align="right">关键字：</td>
					<td align="left"><input type="text" size="70" name="keywords" /></td>
				</tr>
				<tr>
					<td align="right">备注：</td>
					<td align="left"><input type="text" size="70" name="mark" /></td>
				</tr>
				<tr>
				<tr>
					<td align="right">网址：</td>
					<td align="left"><input type="text" size="70" name="url" /></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
					 <input type="submit" value="添加" />
						&nbsp;&nbsp; <input type="reset" value="重置" /></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>