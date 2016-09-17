<?php
include "../include/config.php";
//-----添加机器码信息-------//
$name = $_POST[name];
$url = $_POST[url];
$endtime = date('Y');
$endtime2 = date('年m月d日');
$SelectTime = $_POST['menu1'];
//-----修改公告信息-------//
$sqgg = $_POST[sqgg];
//-----修改卡密链接-------//
$kmlj = $_POST[kmlj];
//-----修改播放器设置-------//
$bfqgq = $_POST[bfqgq];
$bfqsfkq =$_POST[bfqsfkq];
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
//-------------------->删除授权记录<------------------//
if($_GET['del'] == 'del'){//删除授权机器码
	mysql_query("DELETE FROM `".$BIAOTOU."code` where `id` = $_GET[id] ");
	echo "<script>alert('已删除！');location.href='../admin/list.php'</script>";
	mysql_close();
}
if($_GET['del'] == 'km'){//删除卡密
	mysql_query("DELETE FROM `".$BIAOTOU."km` where `id` = $_GET[id] ");
	echo "<script>alert('已删除！');location.href='../admin/kmlist.php'</script>";
	mysql_close();
}
//-------------------->修改自动授权公告<------------------//
if($_POST[Submit] == "修改公告"){
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "UPDATE `".$BIAOTOU."conf` SET  `sqgg` =  '$sqgg' WHERE  `".$BIAOTOU."conf`.`id` =1;";
	mysql_query($SQL);
	echo "<script>alert('修改公告成功！');location.href='../admin/main.php'</script>";
	mysql_close();
}
//-------------------->修改购买卡密链接<------------------//
if($_POST[Submit] == "修改链接"){
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "UPDATE `".$BIAOTOU."conf` SET  `kmlj` =  '$kmlj' WHERE  `".$BIAOTOU."conf`.`Id` =1;";
	//$SQL = "INSERT INTO `".$BIAOTOU."code` (`id`, `kmlj`) VALUES (NULL, '$kmlj');";
	mysql_query($SQL);
	echo "<script>alert('修改公告成功！');location.href='../admin/main.php'</script>";
	mysql_close();
}
//-------------------->修改播放器设置<------------------//
if($_POST[Submit] == "修改播放器设置"){
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "UPDATE `".$BIAOTOU."conf` SET `bfqkq` = '$bfqsfkq', `bfqdz` = '$bfqgq' WHERE `".$BIAOTOU."conf`.`Id` = 1;";
	mysql_query($SQL);
	echo "<script>alert('修改播放器设置成功！');location.href='../admin/main.php'</script>";
	mysql_close();
}
//-------------------->添加授权用户及机器码<------------------//
if($_POST['submit'] == '确定添加'){
	switch($SelectTime){
	case 1;
		$endtime = date('Y')+1;
		$endtime2 = date('年m月d日');
		break;
	case 2;
		$endtime = date('Y')+2;
		$endtime2 = date('年m月d日');
		break;
	case 3;
		$endtime = date('Y')+3;
		$endtime2 = date('年m月d日');
		break;
	case 4;
		$endtime = date('Y')+4;
		$endtime2 = date('年m月d日');
		break;
	case 5;
		$endtime = date('Y')+5;
		$endtime2 = date('年m月d日');
		break;
	default:
		$endtime = "<font color=\"red\">无限期</font>";
		$endtime2 = "";
	}
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "INSERT INTO `".$BIAOTOU."code` (`id`, `name`, `url`, `Started`, `Endtimey`, `timemd`) VALUES (NULL, '$name', '$url', '".date('Y年m月d日')."', '$endtime', '$endtime2');";
	//echo $SQL;
	mysql_query($SQL);
	echo "<script>alert('添加成功！');location.href='../admin/list.php'</script>";
	mysql_close();
}
//-------------------->退出程序<------------------//
if($_GET['url'] == "exit"){           
	session_start();
	$_SESSION["user"] = NULL;               //---/ **  退出  ** /---
	echo "退出成功！";
	header('Location:login.php');
}
?>