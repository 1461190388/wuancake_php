<?php 
include 'conn.php'; 
$query="update message set user='$_POST[user]',title='$_POST[title]',content='$_POST[content]' where m_id='$_POST[id]'"; 
mysql_query($query); 
?> 
<?php 
//ҳ����ת��ʵ�ַ�ʽΪjavascript 
$url = "list.php"; 
echo "<script language='javascript' type='text/javascript'>"; 
echo "window.location.href='$url'"; 
echo "</script>"; 
?>