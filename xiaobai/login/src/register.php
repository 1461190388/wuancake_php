<html>
<head>
<title>ע��</title>
<style type="text/css">
div{
    width:350px;
    height:300px;
	border:1px solid #000;
	margin:0 auto;	
	text-align:center;
}
h1{
   font-family:"����";
   font-size:35px;
}
</style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<div>
<h1>ע��</h1></br></br>
&nbsp&nbsp&nbsp&nbsp�û���:<input type="text" name="username"></br>
����������:<input type="password" name="password"></br>
��ȷ������:<input type="password" name="password2"></br></br>
<input type="submit" value="ע��">&nbsp&nbsp
<input type="button" value="ȡ��"></br></br>
<a href="login.php">ע��ɹ����ص�½����</a>
</div> 
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

if(!empty($_POST))
{
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if($username=="" or $password=="" or $password2=="")
	{
		echo "<script>alert('�˺Ż����벻��Ϊ�գ�');</script>";
	}elseif ($password!=$password2)
	{
		echo "<script>alert('�����������벻��ͬ��');</script>";
	}else
	{
		$sql="insert into id (username,password)
		values('$_POST[username]','$_POST[password]')";
		if (mysql_query($sql))
		{
			echo "<script>alert('ע��ɹ���');</script>";
			echo "<script>window.location.href='login.php'</script>";

		}else
		{
			echo "<script>alert('�û�����ռ�ã�');</script>";
		}
	}
}
?>
</body>
</html>