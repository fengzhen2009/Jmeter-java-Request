<html>
<head>
<title>���Ź���ϵͳ</title>
</head>
<body>
	<center>
		<?php  include 'menu.php';//���뵼����?>
		<h3>��������</h3>
		<form action="action.php?action=add" method="post">
			<table width="300" border="1">
				<tr>
					<td align="right">���⣺</td>
					<td><input type="text" name="title" /></td>
				</tr>
				<tr>
					<td align="right">�ؼ��֣�</td>
					<td><input type="text" name="keywords" /></td>
				</tr>
				<tr>
					<td align="right">���ߣ�</td>
					<td><input type="text" name="author" /></td>
				</tr>
				<tr>
					<td align="right" valign="top">���ݣ�</td>
					<td><textarea cols="25" rows="5" name="content" ></textarea></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
					<input type="submit" value="���" /> &nbsp;&nbsp;
					<input type="reset" value="����" />
					</td>
				</tr>
			</table>
		</form>
		</center>
</body>
</html>