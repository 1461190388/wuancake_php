<?php
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "ע��")
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		$psw_confirm = $_POST["confirm"];
		if($user == "" || $psw == "" || $psw_confirm == "")
		{
			echo "<script>alert('��ȷ����Ϣ�����ԣ�'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				include'conn.php';
				$sql = "select username from user where username = '$user'";	//SQL���
				$result = mysql_query($sql);	//ִ��SQL���
				$num = mysql_num_rows($result);	//ͳ��ִ�н��Ӱ�������
				if($num)	//����Ѿ����ڸ��û�
				{
					echo "<script>alert('�û����Ѵ���'); history.go(-1);</script>";
				}
				else	//�����ڵ�ǰע���û�����
				{
					$sql_insert = "insert into user (username,password) values('$user','$psw')";
				if(mysql_query($sql_insert))
					{
						echo "<script>alert('ע��ɹ������ȷ�����е�¼��'); window.location.href='login.php';</script>";
					}
					else
					{
						echo "<script>alert('ϵͳ��æ�����Ժ�'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('���벻һ�£�'); history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('�ύδ�ɹ���'); history.go(-1);</script>";
	}
?>