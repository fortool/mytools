<?php
include "include/config.php";
//-----------------公告----------------------------//
if($_GET[qjgg]=="1"){
	echo $sqgg; 
}
//---------------------------------------------//
if($_GET[bfq]=="1"){
	echo $bfqkq; //播放器是否开启  1开启  0关闭
}
//--------------自动授权API---------------------------//
if($_GET[zdsq]=="1"){ 

$url=$_GET["url"];
$qq=$_GET["qq"];
$km=$_GET["km"];
if($url==""){
	header('Content-type:text/html;charset=utf-8');
	exit("机器码不能为空!");
}else{
	header('Content-type:text/html;charset=utf-8');
	if($qq==""){
		header('Content-type:text/html;charset=utf-8');
		exit("授权QQ不能为空!");
	}else{
		if($km==""){
			header('Content-type:text/html;charset=utf-8');
			exit("卡密不能为空!");
		}else{
			if($km=="admin"){
				header('Content-type:text/html;charset=utf-8');
				exit("卡密有误或无法使用!");
			}else{
			$sql="SELECT * FROM `".$BIAOTOU."km` where km='$km' limit 1";//判断卡密
			$row=mysql_fetch_array(mysql_query($sql));
			if($row){
				//添加授权
				$endtime = "<font color=\"red\">无限期</font>";
				$endtime2 = "";
				
					mysql_select_db($dbname);
					mysql_query("set names utf8");
					$SQL = "INSERT INTO `".$BIAOTOU."code` (`id`, `name`, `url`, `Started`, `Endtimey`, `timemd`) VALUES (NULL, '$qq', '$url', '".date('Y年m月d日')."', '$endtime', '$endtime2');";//添加域名
					//echo $SQL;
					mysql_query($SQL);
					$kmid=$row[id];
					mysql_query("DELETE FROM `".$BIAOTOU."km` where `id` = $kmid ");//删除卡密
					header('Content-type:text/html;charset=utf-8');
					echo "【".$url."】授权成功！";
					mysql_close();
			}else{
				header('Content-type:text/html;charset=utf-8');
				exit("卡密错误或不存在!");
			}
			}
		}
	}
}
}
//--------------播放器地址API---------------------------//
if($_GET[bfqdz]=="1"){
	echo $bfqdz;
}
//--------------购买卡密链接API---------------------------//
if($_GET[kmlj]=="1"){
	echo $kmlj;
}
?>