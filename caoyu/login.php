<?php

//��֤��½

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$usr=$_POST["user"];
$pw=$_POST["password"];

mysql_select_db("test", $con);

$pw_sql=mysql_query("SELECT password FROM user WHERE username = '$usr'");
mysql_close($con);

if($pw_sql=$pw)
{
//��֤�ɹ���ת����ӭ����
echo '<script language="javascript">';
echo "location.href='welcome.html'";
echo '</script>';
}
else{
//��֤ʧ�ܣ�������ʾ�򣬷��ص�½����
echo '<script language="javascript">';
echo 'alert("�û������������!");';
echo "location.href='main.html'";
echo '</script>';
}
?>