<!DOCTYPE HTML>
<html>
<body>
<head>
<style>
.error{color:#FF0000;}
</style>
</head>

<?php
$usernameEr = $passwordEr= $passwordconfirmEr = "";
$username = $password = $passwordconfirm = "";
$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["username"])) {
		$usernameEr = "�û�������Ϊ�գ�";
		$flag = 1;
	} else {
		$username = test_input($_POST["username"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
			$usernameEr = "�û���ֻ������ĸ�Ϳո�";
			$flag = 1;
		}
	}
		
	if (empty($_POST["password"])) {
		$passwordEr = "���벻��Ϊ�գ�";
		$flag = 1;
	} else {
		$password = test_input($_POST["password"]);
		if (!preg_match("/^[0-9a-zA-Z]*$/",$password)) {
			$passwordEr = "����ֻ�������ֺ���ĸ";
			$flag = 1;
		}
	}
	
	if (empty($_POST["passwordconfirm"])) {
		$passwordconfirmEr = "���ٴ��������룡";
		$flag = 1;
	} else {
		$passwordconfirm = test_input($_POST["passwordconfirm"]);
		if ($password!=$passwordconfirm) {
			$passwordconfirmEr = "������������벻һ��";
			$flag = 1;
		}
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($flag==0 && $username) {
	$con = mysql_connect("localhost:3306","root","password");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db("test", $con);
	if (!$db_selected)
	{
		die ("Can\'t use test : " . mysql_error());
	}
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	$result = mysql_query("SELECT * FROM login
			WHERE username='$username'");
	if (mysql_num_rows($result)) {
		$flag = 2;
	}
	if ($flag==0) {
		mysql_query("INSERT INTO login (username, password)
			VALUES ('$username', '$password')");
		$flag = 3;
	}
	mysql_close($con);
}

if ($flag!=0) {
	if ($flag==1) {
		echo "ע��ʧ��.";
	}
	else if ($flag==2) {
		echo "ע��ʧ��:�û����Ѵ��ڣ�";
	}
	else if ($flag==3) {
		//echo "ע��ɹ�";
		header("location: login.html");		
	}
}
?>

</body>
</html>