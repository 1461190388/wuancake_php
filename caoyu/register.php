<?php

//���ݿ�ע��

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$usr=$_POST["user"];
$pw=$_POST["password1"];

mysql_select_db("test", $con);

mysql_query("INSERT INTO user (username, password) 
VALUES ('$usr', '$pw')");

mysql_close($con);

//ע��ɹ���������ʾ��ת����½����
echo '<script language="javascript">';
echo 'alert("ע��ɹ�!");';
echo "location.href='main.html'";
echo '</script>';

?>