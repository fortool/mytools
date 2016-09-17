<?php
error_reporting(0);
session_start();
$name=$_SESSION["user"]; if($name==NULL)
{
	header('Content-type:text/html;charset=utf-8');
	echo "<script>alert('登陆超时！请重新登录！');location.href='../admin/'</script>";
	exit;
}
?>