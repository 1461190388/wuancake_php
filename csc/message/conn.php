<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_data = "form";
$conn=mysql_connect($db_host, $db_user, $db_pass);
if ($conn) {
    //echo "���ӳɹ�";
} else {
    echo "����ʧ��".mysql_error();
}
if (mysql_select_db($db_data)) {
    //echo "ѡ�����ݿ�ɹ�";
} else {
    echo "ѡ�����ݿ�ʧ��";
}
mysql_query("set names 'utf8'");
?>