<html>
<?php 
if(mysql_connect("localhost","root","root"))
	{
		//echo "���ӳɹ�";
	}else 
	{
		echo "����ʧ��";
	}
if(mysql_select_db("test"))
	{
		//echo "ѡ�����ݿ�ɹ�";
	}else
	{
		echo "ѡ�����ݿ�ʧ��";
	}
$username=$_POST["username"];
$password=$_POST["password"];
$password2=$_POST["password2"];
if($username=="" or $password=="" or $password2=="")
	{
		echo "�˺Ż����벻��Ϊ��</br>";
		echo "<a href='register.php'>����ע�����</a>";
	}elseif ($password!=$password2)
	{
		echo "�����������벻��ͬ</br>";
		echo "<a href='register.php'>����ע�����</a>";
	}else
	{
		$sql="insert into id (username,password)
		values('$_POST[username]','$_POST[password]')";
		if (mysql_query($sql))
		{
			echo "ע��ɹ�</br>";
			echo "<a href='login.php'>���ص�½����</a>";

		}else
		{
			echo "�û�����ռ��";
		}
	}
?>