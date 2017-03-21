<html>
<body>
<form action="action2.php?action=add" method="post" enctype="multipart/form-data" data-type="ajax">
	<table align="center">
		<tr>
			<td align="right">项目名称:</td>
			<td align="left"><input type="text" name="project" colspan="2" /></td>
		</tr>
		<tr>
			<td align="right">测试负责人:</td>
			<td align="left"><input type="text" name="people"   /></td>
		</tr>
		<tr>
			<td align="right">测试时间:</td>
			<td ><input type="text" name="testtime"/></td>
		</tr>
		<tr>
			<td align="right">上线时间:</td>
			<td><input type="text" name="releasetime" /></td>
		</tr>
		<tr>
		<td align="right">工作量:</td>
			<td><input type="text" name="works"  /></td>
		</tr>
		<tr>
		<td align="right">终端:</td>
			<td><input type="text" name="source" /></td>
		</tr>
		<tr>
		<td align="right">版本号:</td>
			<td><input type="text" name="version" /></td>
		</tr>
		<tr>
		<input type="hidden" name="MAX_FILE_SIZE" value="32000000">
		<td align="right">对应测试包:</td>
			<td><input type="file" name="file" id="file" /></td>
		</tr>
		<tr>
		<td align="right">上线问题反馈:</td>
			<td><textarea cols="120" rows="6" name="feedback" ></textarea></td>
		</tr>
		<tr>
		<td align="right">功能描述:</td>
			<td><textarea cols="120" rows="6" name="descrip" ></textarea></td>
		</tr>
		<tr>
		<td align="right">备注:</td>
			<td><textarea cols="120" rows="5" name="remark" ></textarea></td>
		</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="submit" name="submit" value="添加"/>&nbsp;&nbsp;
	    <input type="reset" name="reset" value="重置" /></td>
		</tr>
	</table>
</form>
</body>
</html>