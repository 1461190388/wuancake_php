<?php error_reporting(0);
include 'conn.php'; 
$id=$_GET[id]; 
$query="SELECT * FROM message WHERE id =".$id; 
$result=mysql_query($query); 
while ($rs=mysql_fetch_array($result)){ 
?> 
<FORM METHOD="POST" ACTION="postEdit.php"> 
<input type="hidden" name="id" value="<?=$rs[id]?>"> 
�û���<INPUT TYPE="text" NAME="user" value="<?=$rs[user]?>"/><br /> 
���⣺<INPUT TYPE="text" NAME="title" value="<?=$rs[title]?>"/><br /> 
���ݣ�<TEXTAREA NAME="content" ROWS="8" COLS="30"><?=$rs[content]?></TEXTAREA><br /> 
<INPUT TYPE="submit" name="submit" value="edit"/> 
</FORM> 
<?php }?>