<?php
error_reporting(0); 
include 'coon.php';
date_default_timezone_set('PRC');
$linkconfig = @mysql_connect($dbserver, $dbuser, $dbpass);
if (!$linkconfig) {
	die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />���ݿ�����ʧ�ܣ���鿴�Ƿ�װ��");
exit;
}else{
	//ȡ user��Ϣ
	mysql_select_db($dbname);
	mysql_query("set names utf8");	
	$SQL="select * from ".$BIAOTOU."user";
	$query=mysql_query($SQL);
	while($row=mysql_fetch_array($query)){
	$name=$row['adminname'];
	$adminpass=$row['password'];
	}
	//ȡ����_conf 
	mysql_select_db($dbname);
	mysql_query("set names utf8");	
	$SQL="select * from ".$BIAOTOU."conf";
	$query=mysql_query($SQL);
	while($row=mysql_fetch_array($query)){
	$kmlj=$row['kmlj'];
	$sqgg=$row['sqgg'];
	$qun=$row['qqun'];
	$title=$row['title'];
	$suffix=$row['suffix'];
	$bfqkq=$row['bfqkq'];
	$bfqdz=$row['bfqdz'];
	}
}

?>