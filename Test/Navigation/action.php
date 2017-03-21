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
		$source = $_POST["source"];
		$title = $_POST["title"];
		$author = $_POST["author"];
		$keywords = $_POST["keywords"];
		$url = $_POST["url"];
		$mark = $_POST["mark"];
		$addtime = time();
		
		//2、做信息过滤
		
		//3、拼装添加SQL语句，并执行添加操作
		$sql = "insert into mytest values(null,'{$title}','{$url}','{$keywords}','{$author}','{$addtime}','{$source}','{$mark}')";
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
			
		break;
			
	case "delTest"://执行删除操作
			
		//1、获取要删除的id号
		$id = $_GET['id'];
			
		//2、拼装删除sql语句，并执行删除操作
		$sql = "delete from mytest where id={$id}";
		mysql_query($sql,$link);
			
		//3、自动跳转到浏览界面
		header("Location:testEnv.php");
			
		break;
		
	case "delRelease"://执行删除操作
				
		//1、获取要删除的id号
		$id = $_GET['id'];
				
		//2、拼装删除sql语句，并执行删除操作
		$sql = "delete from mytest where id={$id}";
		mysql_query($sql,$link);
				
		//3、自动跳转到浏览界面
		header("Location:releaseEnv.php");
				
		break;
			
	case "update"://执行更新操作
		//1、获取要修改的信息
		$source = $_POST["source"];
		$title = $_POST["title"];
		$author = $_POST["author"];
		$keywords = $_POST["keywords"];
		$url = $_POST["url"];
		$mark = $_POST["mark"];
		$id = $_POST['id'];
		$addtime = time();
		
		//2、过滤要修改的信息
			
		//3、拼装修改sql语句，并执行修改操作
		$sql = "update mytest set title='{$title}',url='{$url}',keywords='{$keywords}',author='{$author}',source='{$source}',mark='{$mark}' where id={$id}";
		mysql_query($sql,$link);
			
		//4、跳转回浏览界面(判断本次修改是从哪个页面过来的)
		
		if($source=="other"){
			header("Location:other.php");
		}elseif ($source=="release"){
			header("Location:releaseEnv.php");
		}elseif ($source=="test"){
			header("Location:testEnv.php");
		}
		break;
}
		
			
//4、关闭数据库
mysql_close($link);