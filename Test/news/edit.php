<html>
<head>
<title>���Ź���ϵͳ</title>
</head>
<body>
	<center>
		<?php  include 'menu.php';//���뵼����
	
		//1�����������ļ�
		require ("dbconfig.php");
		
		//2������MySql��ѡ�����ݿ�
		$link = @mysql_connect(HOST,USER,PASS)or die("���ݿ�����ʧ��");
		mysql_select_db(DBNAME,$link);
		
		//3����ȡҪ�޸���Ϣ��id�ţ���ƴװ�鿴sql��䣬ִ�в�ѯ����ȡҪ�޸ĵ���Ϣ
		$sql="select * from news where id={$_GET['id']}";
		$result = mysql_query($sql,$link);
		
		//4���ж��Ƿ��ȡ����Ҫ�޸ĵ���Ϣ
		if($result && mysql_num_rows($result)>0){
			$news = mysql_fetch_assoc($result);
		}else {
			die("û���ҵ�Ҫ�޸ĵ���Ϣ!");
		}

?>
		<h3>�༭����</h3>
		<form action="action.php?action=update" method="post">
		<input type="hidden" name="id" value="<?php echo $news['id'];?>"/>
			<table width="300" border="1">
				<tr>
					<td align="right">���⣺</td>
					<td><input type="text" name="title" value="<?php echo $news['title'];?>"/></td>
				</tr>
				<tr>
					<td align="right">�ؼ��֣�</td>
					<td><input type="text" name="keywords" value="<?php echo $news['keywords'];?>" /></td>
				</tr>
				<tr>
					<td align="right">���ߣ�</td>
					<td><input type="text" name="author" value="<?php echo $news['author'];?>"/></td>
				</tr>
				<tr>
					<td align="right" valign="top">���ݣ�</td>
					<td><textarea cols="25" rows="5" name="content"> <?php echo $news['content'];?></textarea></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
					<input type="submit" value="�༭" /> &nbsp;&nbsp;
					<input type="reset" value="����" />
					</td>
				</tr>
			</table>
		</form>
		</center>
</body>
</html>