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

</style>
<meta charset="UTF-8">

<title>网址导航</title>

<link rel="stylesheet" href="css/style.css" media="screen"
		type="text/css" />

		</head>


		<body>
		<nav class="main-menu fixedBox" >

		<div class="logo"></div>
		<div class="settings"></div>

		<ul>

		<li><a href="index.php"> <i class="fa fa-home fa-lg"></i>
		<span class="nav-text">主页</span>

		</a></li>
		<li><a href="testEnv.php"> <i class="fa fa-desktop fa-lg"></i> <span
		class="nav-text"> 测试环境</span>
		</a></li>
		<li><a href="releaseEnv.php"> <i class="fa fa-shopping-cart"></i> <span
		class="nav-text">生产环境 </span>
		</a></li>
		<li class="has-subnav"><a href="other.php"> <i class="fa fa-rocket fa-lg"></i>
		<span class="nav-text"> 其他相关</span>
		</a></li>
		<li>
				<a href="recordEvn.php"><i class="fa fa-file fa-lg"></i><span class="nav-text">上线记录</span></a>
			</li>
		</ul>

		<ul class="logout">
		<li><a href="contact.php"> <i class="fa fa-lightbulb-o fa-lg"></i> <span
		class="nav-text"> 联系我们 </span>

		</a></li>
		</ul>
		</nav>
		<center>
		<?php  include 'recordMenu.php';//导入导航栏?>
		<?php include 'recordContent.php';//导入测试环境内容?>
	</center>
</body>
</html>

</body>

</html>