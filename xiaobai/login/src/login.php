<html>
<head>
<title>Login</title>
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<h1>Login</h1></br></br>
�û���:<input type="text" name="username"></br>
����:&nbsp&nbsp<input type="password" name="password"></br></br>
<input type="submit" value="��½">&nbsp&nbsp
<input type="button" value="ȡ��"></br></br>
<a href="register.php">û���˻����ע��</a>
</div> 
</form>
</body>
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
$username=$_POST["username"];
$password=$_POST["password"];
if($username=="" or $password=="" )
	{
		echo '<script>alert ("�˺Ż����벻��Ϊ��!");</script>';
	}else
	{
		$sql="select password from id where username='$username'";
		$query=mysql_query($sql);
		$arr=mysql_fetch_array($query);
		if($arr=="")
			{
				echo '<script>alert ("�û���������!");</script>';
			}elseif($arr['password']==$password)
			{
				echo "<script>alert ('��½�ɹ�!');</script>";
			    echo "<script>window.location.href='welcome.html'</script>";
			}else
			{
				echo '<script>alert ("�˺Ż��������!");</script>';
			}
	}
}
?>
</html>