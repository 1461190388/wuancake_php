<?php 
include 'conn.php'; 
?> 
<?php 
echo "<div align='center'><a href='add.php'>�������</a></div>"; 
?> 
<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef"> 
<?php 
$sql="select * from message order by id"; 
$query=mysql_query($sql); 
while ($row=mysql_fetch_array($query)){ error_reporting(0);
?> 

<tr bgcolor="#eff3ff"> 
<td>���⣺<font color="red"><?=$row[title]?></font> �û���<font color="red"><?=$row[user] ?></font><div align="right"><a href="preEdit.php?id=<?=$row[id]?>">�༭</a>  |  <a href="delete.php?id=<?=$row[id]?>">ɾ��</a></div></td> 
</tr> 
<tr bgColor="#ffffff"> 
<td>���ݣ�<?=$row[content]?></td> 
</tr> 
<tr bgColor="#ffffff"> 
<td><div align="right">�������ڣ�<?=$row[lastdate]?></div></td> 
</tr> 
<?php }?> 
</table>