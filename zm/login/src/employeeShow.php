<?php
require_once("SqlTool.class.php");
$sqlTool=new SqlTool("test");

if(!isset($_COOKIE["islogin"])){
	echo "����δ��¼�����ȵ�¼��ϵͳ����3����Զ���ת����¼ҳ�档<br/>";
	echo "��3���û���Զ���ת������<a href='login.php'>���µ�¼</a>";
	header("refresh:3;url=login.php");
	exit();
}

$username=$_COOKIE["username"];
echo "<center>";
echo "<h1>�û���Ϣҳ��</h1>";
echo "<a href='safe.php' >��ȫ�˳�</a>";
echo "<hr/>";
$sql="select * from employee where emp_username='$username'";
$result=$sqlTool->dql($sql);
	if(mysql_affected_rows()>0){
		echo "<table border='1'>";
			echo "<tr>";
				echo "<td>�û���ID</td>";
				echo "<td>�˺�</td>";
				echo "<td>����</td>";
			echo "</tr>";
		while($arr=mysql_fetch_assoc($result)){
			echo "<tr>";
			foreach($arr as $key=>$value){
				echo "<td>";
				echo $value;
				echo "</td>";
			}
			
			echo "</tr>";
		}
		echo "</table>";
		echo "</center>";
		mysql_free_result($result);			
	}else{
		die(" �Բ���û�ҵ���ؼ�¼��");
	}
	
$sqlTool->close();
?>