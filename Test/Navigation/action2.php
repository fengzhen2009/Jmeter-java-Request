<?php
header("Content-Type:text/html;charset=utf-8");
//这是一个信息增、删、改操作的处理界面

//1、导入配置文件
require ("dbconfig.php");

//2、连接MySql、并选择数据库
$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
//echo "数据库连接成功";
mysql_select_db(DBNAME,$link);
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库

//3、根据需要的action值，来判断所属的操作，执行对应的代码
switch($_GET["action"]){
	case "add"://执行添加操作
		//1、获取要添加的信息，并补充其他信息
		$project = $_POST["project"];
		$people = $_POST["people"];
		$testtime = $_POST["testtime"];
		$releasetime = $_POST["releasetime"];
		$works = $_POST["works"];
		$source = $_POST["source"];
		$version = $_POST["version"];
		$feedback = $_POST["feedback"];
		$descrip = $_POST["descrip"];
		$remark= $_POST["remark"];
		$addtime = time();
		$filename=$_FILES["file"]["name"];
		//2、做信息过滤

		//3、拼装添加SQL语句，并执行添加操作
		$sql = "insert into record values(null,'{$project}','{$people}','{$testtime}','{$releasetime}','{$works}','{$source}','{$version}','{$feedback}','{$descrip}','{$remark}','{$addtime}','{$filename}')";
		mysql_query($sql,$link);

		//4、判断是否添加成功
		$id = mysql_insert_id($link);//获取刚才添加信息自增的id号值
		if($id>0){
			echo"<h3>添加成功！</h>";
		}else{
			echo"<h3>添加失败！</h>";
		}
		echo"<a href='#' onClick='javascript :history.go(-1);'>继续添加</a>";
		echo "&nbsp;&nbsp;&nbsp;";
		echo"<a href='#' onClick='javascript :history.go(-2);'>浏览</a>";
		
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		
			if (file_exists("upload2/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
						"upload2/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "upload2/" . $_FILES["file"]["name"];
			}
		}
		
		break;
			
	case "del"://执行删除操作
			
		//1、获取要删除的id号
		$id = $_GET['id'];
			
		//2、拼装删除sql语句，并执行删除操作
		$sql = "delete from record where id={$id}";
		mysql_query($sql,$link);
			
		//3、自动跳转到浏览界面
		header("Location:recordEvn.php");
			
		break;
			
	case "update"://执行更新操作
		//1、获取要修改的信息
		$project = $_POST["project"];
		$people = $_POST["people"];
		$testtime = $_POST["testtime"];
		$releasetime = $_POST["releasetime"];
		$works = $_POST["works"];
		$source = $_POST["source"];
		$version = $_POST["version"];
		$feedback = $_POST["feedback"];
		$descrip = $_POST["descrip"];
		$remark= $_POST["remark"];
		$addtime = time();
		$filename=$_FILES["file"]["name"];
		$id = $_POST['id'];
		//2、过滤要修改的信息
			
		//3、拼装修改sql语句，并执行修改操作
		$sql = "update record set project='{$project}',people='{$people}',testtime='{$testtime}',releasetime='{$releasetime}',works='{$works}',source='{$source}',version='{$version}',feedback='{$feedback}',descrip='{$descrip}',remark='{$remark}',addtime='{$addtime}',filename='{$filename}' where id={$id}";
		echo "$sql";
		mysql_query($sql,$link);
			
		//4、跳转回浏览界面(判断本次修改是从哪个页面过来的)

		header("Location:recordEvn.php");
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		
			if (file_exists("upload2/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
						"upload2/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "upload2/" . $_FILES["file"]["name"];
			}
		}
		
		break;
}

	
//4、关闭数据库
mysql_close($link);