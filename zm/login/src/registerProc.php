<?php
require_once("SqlTool.class.php");
$sqlTool=new SqlTool("test");

$username=$_POST["emp_username"];
$password=$_POST["emp_password"];
$confirmpassword=$_POST["confirmpassword"];
if(!preg_match("#^[a-zA-Z][a-zA-Z0-9_]{4,15}$#",$username)){
	echo "���û����Ƿ�����������д��ϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
	header("refresh:3;url=register.php");
	exit();
}

if($username=="localhost"){
	echo "���û��������ã���������д��ϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
	header("refresh:3;url=register.php");
	exit();
}
if($username=="" || $password=="" ){
	echo "��¼��Ϣ��д��ȫ����������д��ϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
	header("refresh:3;url=register.php");
	exit();
}
if($password!=$confirmpassword){
	echo "���벻һ�£���������д��ϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
	header("refresh:3;url=register.php");
	exit();
}

$sql="insert into employee values(null,'$username','$password')";
$res=$sqlTool->dml($sql);
if($res){
	if(mysql_affected_rows()>0){
		echo "��ϲ��ע��ɹ���ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
		echo "��3���û���Զ���ת������<a href='login.php'>��¼</a>";
		header("refresh:3;url=login.php");
		exit();
	}else{
		echo "ע��ʧ�ܣ�������ע�ᣬϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
		echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
		header("refresh:3;url=register.php");
		exit();
	}
}else{
	echo "�û����Ѵ��ڣ�������ע�ᣬϵͳ����3����Զ���ת��ע��ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='register.php'>����ע��</a>";
	header("refresh:3;url=register.php");
	exit();
}

$sqlTool->close;
?>