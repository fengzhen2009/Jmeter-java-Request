<html>
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
		$sql="select * from record where id={$_GET['id']}";
		$result = mysql_query($sql,$link);

		//4、判断是否获取到了要修改的信息
		if($result && mysql_num_rows($result)>0){
			$content = mysql_fetch_assoc($result);
		}else {
			die("没有找到要修改的信息!");
		}

?>
	<h3>编辑</h3>
	<form action="action2.php?action=update" method="post"
		enctype="multipart/form-data" data-type="ajax">
		<input type="hidden" name="id" value="<?php echo $content['id'];?>"/>
		<table align="center">
			<tr>
				<td align="right">项目名称:</td>
				<td align="left"><input type="text" name="project" colspan="2" value="<?php echo $content['project'];?>"/></td>
			</tr>
			<tr>
				<td align="right">测试负责人:</td>
				<td align="left"><input type="text" name="people" value="<?php echo $content['people'];?>"/></td>
			</tr>
			<tr>
				<td align="right">测试时间:</td>
				<td><input type="text" name="testtime" value="<?php echo $content['testtime'];?>"/></td>
			</tr>
			<tr>
				<td align="right">上线时间:</td>
				<td><input type="text" name="releasetime" value="<?php echo $content['releasetime'];?>"/></td>
			</tr>
			<tr>
				<td align="right">工作量:</td>
				<td><input type="text" name="works" value="<?php echo $content['works'];?>"/></td>
			</tr>
			<tr>
				<td align="right">终端:</td>
				<td><input type="text" name="source" value="<?php echo $content['source'];?>"/></td>
			</tr>
			<tr>
				<td align="right">版本号:</td>
				<td><input type="text" name="version" value="<?php echo $content['version'];?>"/></td>
			</tr>
			<tr>
				<input type="hidden" name="MAX_FILE_SIZE" value="32000000">
				<td align="right">对应测试包:</td>
				<td><input type="file" name="file" id="file" value="<?php echo $content['filename'];?>"/></td>
			</tr>
			<tr>
				<td align="right">上线问题反馈:</td>
				<td><textarea cols="120" rows="6" name="feedback" ><?php echo $content['feedback'];?></textarea></td>
			</tr>
			<tr>
				<td align="right">功能描述:</td>
				<td><textarea cols="120" rows="6" name="descrip" ><?php echo $content['descrip'];?></textarea></td>
			</tr>
			<tr>
				<td align="right">备注:</td>
				<td><textarea cols="120" rows="5" name="remark" ><?php echo $content['remark'];?></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit"
					value="添加" />&nbsp;&nbsp; <input type="reset" name="reset"
					value="重置" /></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>