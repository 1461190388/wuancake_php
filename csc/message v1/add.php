<?php error_reporting(0);
include 'conn.php'; 
if($_POST['submit']){ 
$sql="INSERT INTO message(id,user,title,content,lastdate) VALUES (NULL, '$_POST[user]', '$_POST[title]', '$_POST[content]', now())"; 
mysql_query($sql); 

//ҳ����ת��ʵ�ַ�ʽΪjavascript 
$url = "list.php"; 
echo "<script language='javascript' type='text/javascript'>"; 
echo "window.location.href='$url'"; 
echo "</script>"; 
} 
?> 
<script type="text/javascript"> 
function checkPost(){ 

if(addForm.user.value==""){ 
alert("�������û���"); 
addForm.user.focus(); 
return false; 
} 
if(addForm.title.value.length<5){ 
alert("���ⲻ������5���ַ�"); 
addForm.title.focus(); 
return false; 
} 
} 
</script> 
<FORM name="addForm" METHOD="POST" ACTION="add.php" onsubmit="return checkPost();"> 
�û���<INPUT TYPE="text" NAME="user" /><br /> 
���⣺<INPUT TYPE="text" NAME="title" /><br /> 
���ݣ�<TEXTAREA NAME="content" ROWS="8" COLS="30"></TEXTAREA><br /> 
<INPUT TYPE="submit" name="submit" value="add" /></FORM>