<!DOCTYPE HTML> 
<html>
<body>

<?php
$usernameEr = $passwordEr= "";
$username = $password = "";
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
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($flag==0) {
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
		WHERE username='$username' AND password='$password'");
	if (mysql_num_rows($result)) {
		echo "��½�ɹ���";
	}
	else $flag = 2;
	mysql_close($con);
}
		 
if ($flag!=0) {
	if ($flag==1) {
		echo "��½ʧ��:<br/><br/>";
		echo $usernameEr;
		echo "<br/>";
		echo $passwordEr;
	}
	else if ($flag==2) {
		echo "��½ʧ��:�û��������벻��ȷ��";
	}
}
?>
</body>
</html>