<?php
require_once("SqlTool.class.php");
$sqlTool=new SqlTool("test");
$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);
if($username=="" || $password==""){
	echo "��¼��Ϣ��д��ȫ����������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
	header("refresh:3;url=login.php");
	exit();
}
$sql="select emp_username,emp_password from employee where emp_username='$username'";
$result=$sqlTool->dql($sql);
if($arr=mysql_fetch_assoc($result)){
	if(mysql_affected_rows()>0){
		if($password==$arr["emp_password"]){
			echo "��¼�ɹ�<br/>";
			setcookie("username","$username",time()+60*60);
			setcookie("islogin",1,time()+60*60);
			header("location:employeeShow.php");
			exit();
		}else{
			echo "���������������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
			echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
			header("refresh:3;url=login.php");
			exit();
		}
	}else{
		echo "û�в�ѯ����ؼ�¼����������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
		echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
		header("refresh:3;url=login.php");
		exit();
	}	
mysql_free_result($result);	
}else{
	$sql="select ad_username,ad_password from admin where ad_username='$username'";
	$result=$sqlTool->dql($sql);
	if($arr=mysql_fetch_assoc($result)){
		if(mysql_affected_rows()>0){
			if($password==$arr["ad_password"]){
				echo "��¼�ɹ�<br/>";
				setcookie("username","$username",time()+60*60);
				setcookie("islogin",2,time()+60*60);
				header("location:adminShow.php");
				exit();	
			}else{
				echo "���������������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
				echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
				header("refresh:3;url=login.php");
				exit();
			}
		}else{
			echo "û�в�ѯ����ؼ�¼����������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
			echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
			header("refresh:3;url=login.php");
			exit();
		}	
	mysql_free_result($result);
	}else{
		echo "�û���������������д��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
		echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
		header("refresh:3;url=login.php");
		exit();
	}
}

$sqlTool->close();	
	
?>