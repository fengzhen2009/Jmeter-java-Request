<?php 
//对函数的说明
//参数说明 $file_name文件名
//$file_sub_dir：下载文件的子路径
$filename=$_GET['filename'];
function down_file($filename,$file_sub_path){
	//演示下载一个图片
	//$file_name="test.txt";
	
	$file_path="./upload/";
	ob_start();
	//文件名转码
	$filename=iconv("utf-8","gb2312",$filename);
	if(!file_exists($file_path.$filename)){
		echo  "文件不存在";
		return;
	}
	//获取下载文件的大小
	$file_size=filesize($file_path.$filename);


	$fp=fopen($file_path.$filename,"r");


	//返回的文件
	header("Content-type:application/octet-stream");
	//按照字节大小返回
	header("Accept-Ranges:bytes");
	//返回文件大小
	header("Accept-Length:$file_size");
	//这里客户端的弹出对话框
	header("Content-Disposition:attachment;filename=".$filename);
	//向客户端回送数据
	$buffer=1024;
	//为了下载的安全。我们最后做一个文件字节读取计数器
	$file_count=0;




	//判断文件是否结束
	while(!feof($fp)&&($file_size-$file_count>0)){
		$file_data=fread($fp,$buffer);
		//统计读了多少个字节
		$file_count+=$buffer;




		//把部分数据回送给浏览器
		echo $file_data;
	}
	fclose($fp);
}

down_file("$filename","/upload/");
?>