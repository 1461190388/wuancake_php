<?php
class SqlTool{
	private $test;
	private $host="localhost";
	private $username="root";
	private $password="root";
	function __construct($db){
		$this->test=mysql_connect($this->host,$this->username,$this->password) or die(mysql_error());
		mysql_query("set names 'gbk'") or die(mysql_error());
	    mysql_query("SET CHARACTER SET gbk") or die(mysql_error()); 
	    mysql_query("SET CHARACTER_SET_RESULTS='gbk'") or die(mysql_error()); 
		mysql_select_db($db,$this->test) or die(mysql_error());
	}
	//����ɾ���ĵȷǲ�ѯ����
	public function dml($sql){
		$result=mysql_query($sql);
		return $result;
	}
	//��ѯ����
	public function dql($sql){
		$result=mysql_query($sql) or die(mysql_error());
		return $result;
	}
	//�ر����ݿ������
	public function close(){
		mysql_close($this->test) or die(mysql_error());
	}
}
?>