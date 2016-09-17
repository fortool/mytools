<?php 
$backup = "../install/install.lock";

if(file_exists($backup)){
	echo "程序未安装，<a href=\"../install\">点击去安装</a>或者输入http://您的域名/install/";
}
error_reporting(0);
session_start();
$name=$_SESSION["user"]; if($name==NULL)
{
	header("Location:login.php");
	exit;
}
else{
	header("Location:main.php");
}
?>