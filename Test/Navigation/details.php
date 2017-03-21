<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta charset="UTF-8">

<title>网址导航~详情</title>
<style type="text/css">
html,body,#div{

	heigth:100%;
	margin:5px;
	padding:5px;
	background:#d9d9d9;
	 }
#div1 {

	width: 100%;
	height:10%;
	float:top;
	background: #96c5ce;
}

#div2 {
margin:5px;
	padding:5px;
	width: 68%;
	height: 580px;
	float: left;
	background:#f7f0f0
}

#div3 {
margin:5px;
	padding:5px;
	width: 28%;
	height:580px;
	background: #f7f0f0;
	float: right;
}
.abc{ 
 text-decoration: none;
  }
  .careful{
  color:#C00;
  }
    .black{
  color:#000000;
  }
</style>
</head>


<body>
		<div>
			<div id="div1">
				<tr>
					<td colspan="1" rowspan="2">
					<h2>详情</h2>
					</td>
					<td align="right"><a href='recordEvn.php' class='abc black'>返回</a></td>
				</tr>

			</div>

			<div id="div2">
				<?php include 'detailLeft.php';?>
			</div>
			
			<div id="div3">
			<?php include 'detailRight.php';?>
			</div>
			
		</div>
</body>
</html>

</body>

</html>