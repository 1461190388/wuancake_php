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
if($username=="" or $password=="" )
	{
		echo "�˺Ż����벻��Ϊ��</br>";
		echo "<a href='login.php'>���ص�½����</a>";
	}else
	{
		$sql="select password from id where username='$username'";
		$query=mysql_query($sql);
		$arr=mysql_fetch_array($query);
		if($arr=="")
			{
				echo "�û���������";
			}elseif($arr['password']==$password)
			{
				echo "��½�ɹ�";
				echo "<a href='welcome.html'>�����ҵ���վ</a>";
			}else
			{
				echo "�˺Ż��������";
			}
	}
?>