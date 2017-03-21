<!DOCTYPE html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
 <title>test</title>
 <style type="text/css">
	*{margin:0px;padding:0px;}
	
	 .menu {
	 width: 19%;
	 height: 620px;
	 background: #567;
	 float:left;
	 }
	#div {
		width:100%;
		height:100%;
		
	}
	#content{
	 float: right;
	 width: 100%;
	 height:100%;
	 background: #DDD;
	 word-wrap:break-word;
	 font-size:12px;
	 margin-left:10px;
	 }
	 #foot{
	  height:20px;
	  background-color:#ccc;
	  clear:both;
	  }
 </style>
 <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>
<body>
	<div>
	<div>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<div class="sidebar">
		  <h1><i class="fa fa-bars push"></i>Navigation <span class="color">Menu</span></h1>
		    <ul>
		    <li><a href="index.html"><i class="fa fa-dashboard push"></i>主页</i></a><span class="hover"></span>
		    </li>
		    <li><a href="#"><i class="fa fa-user push"></i>测试环境<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		      <ul class="sub-menu">
		         <li><a href="delivery.php">月亮天使<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		         <li><a href="SFA.php">SFA<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		         <li><a href="mall.php">月亮小屋<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		      </ul>
		    </li>
		    <li><a href="#"><i class="fa fa-cog push"></i>正式环境<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		     <ul class="sub-menu">
		         <li><a href="#">月亮天使<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		         <li><a href="#">SFA<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		         <li><a href="#">月亮小屋<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		        <li><a href="#">订单管理<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		        <li><a href="#">订单管理<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		        <li><a href="#">订单管理<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		      </ul></li>
		    <li><a href="#"><i class="fa fa-picture-o push"></i>appearance<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		        <ul class="sub-menu">
		         <li><a href="#">Change Theme<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		          </li>
		         <li><a href="#">Theme Options<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		      </ul>
		    </li>
		    <li><a href="#"><i class="fa fa-file push"></i>Information<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		        <ul class="sub-menu">
		         <li><a href="#">Latest News<i class="fa fa-angle-right"></i></a><span class="hover"></span>
		          </li>
		         <li><a href="#">Recent Articles<i class="fa fa-angle-right"></i></a><span class="hover"></span></li>
		      </ul>
		    </li>
		    <li><a href="add.php"><i class="fa fa-plane push"></i>添加</a><span class="hover"></span></li>
		  </ul>
		</div>
		
		<div id="content">
			<p align="center" valign="middle">月亮天使测试环境</p>


			<table width="1000" border="1">
				<?php 
				//1、导入配置文件
				require ("../news/dbconfig.php");
				
				//2、连接MySql，先择数据库
				$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
				mysql_select_db(DBNAME,$link);
				
				//3、执行查询，并返回结果集
				$sql = "select * from news order by addtime desc";
				$result = mysql_query($sql,$link);
				
				//4、解析结果集,并遍历输出
				while ($row = mysql_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['title']}</td>";
					echo "<td>{$row['keywords']}</td>";
					echo "<td>{$row['author']}</td>";
					echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
					echo "<td>{$row['content']}</td>";
					echo "<td>
						<a href='javascript:dodel({$row['id']})'>删除  </a>
						<a href='edit.php?id={$row['id']}'>修改</a></td>";
					echo "</tr>";
				}
				//5、释放结果集
				mysql_free_result($result);
				mysql_close($link);
				
				?>
			</table>
		</div>
		<div id="foot" align="center">版权</div>
	</div>
</body>
</html>