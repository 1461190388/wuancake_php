<?php
	if(isset($_POST["submit"]) && $_POST["submit"] == "��¼")
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		if($user == "" || $psw == "")
		{
			echo "<script>alert('�������û��������룡'); history.go(-1);</script>";
		}
		else
		{
			include'conn.php';
			$sql = "select username,password from user where username = '$user' and password = '$psw'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			if($num)
			{
				$row = mysql_fetch_array($result);	//��������������ʽ������������
				echo "<script>alert('��¼�ɹ���');</script>";echo"<center>";echo $row[0];echo",��ӭ������";
				echo"</center>";
			}
			else
			{
				echo "<script>alert('�û��������벻��ȷ��');history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('�ύδ�ɹ���'); history.go(-1);</script>";
	}

?>