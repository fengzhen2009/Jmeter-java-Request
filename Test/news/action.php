<?php
//����һ����Ϣ����ɾ���Ĳ����Ĵ������

//1�����������ļ�
		require ("dbconfig.php");
//2������MySql����ѡ�����ݿ�
	$link = @mysql_connect(HOST,USER,PASS) or die("���ݿ�����ʧ�ܣ�");
	//echo "���ݿ����ӳɹ�";
	mysql_select_db(DBNAME,$link);
//3��������Ҫ��actionֵ�����ж������Ĳ�����ִ�ж�Ӧ�Ĵ���
	switch($_GET["action"]){
		case "add"://ִ����Ӳ���
			//1����ȡҪ��ӵ���Ϣ��������������Ϣ
				$title = $_POST["title"];
				$keywords = $_POST["keywords"];
				$author = $_POST["author"];
				$content = $_POST["content"];
				$addtime = time();
			//2������Ϣ����
			//3��ƴװ���SQL��䣬��ִ����Ӳ���
			$sql = "insert into news values(null,'{$title}','{$keywords}','{$author}','{$addtime}','{$content}')";
			mysql_query($sql,$link);
			echo $sql;
			
			//4���ж��Ƿ���ӳɹ�
			$id = mysql_insert_id($link);//��ȡ�ղ������Ϣ������id��ֵ
			if($id>0){
				echo"<h3>������Ϣ��ӳɹ���</h>";
			}else{
				echo"<h3>������Ϣ���ʧ�ܣ�</h>";
			}
			echo"<a href='javascript:window.history.back();'>����</a>&nbsp&nbsp";
			echo"<a href='index.php'>�������</a>";
			
			break;
			
		case "del"://ִ��ɾ������
			
			//1����ȡҪɾ����id��
			$id = $_GET['id'];
			
			//2��ƴװɾ��sql��䣬��ִ��ɾ������
			$sql = "delete from news where id={$id}";
			mysql_query($sql,$link);
			
			//3���Զ���ת���������
			header("Location:index.php");
			
			break;
			
		case "update"://ִ�и��²���
			//1����ȡҪ�޸ĵ���Ϣ
			$title = $_POST["title"];
			$keywords = $_POST["keywords"];
			$author = $_POST["author"];
			$content = $_POST["content"];
			$id = $_POST['id'];
			
			//2������Ҫ�޸ĵ���Ϣ
			
			//3��ƴװ�޸�sql��䣬��ִ���޸Ĳ���
			$sql = "update news set title='{$title}',keywords='{$keywords}',author='{$author}',content='{$content}' where id={$id}";
			//echo $sql;
			mysql_query($sql,$link);
			
			//4����ת���������
			header("Location:index.php");
			
			break;
			
	}
//4���ر����ݿ�
	mysql_close($link);