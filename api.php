<?php
include "include/config.php";


$wz = $_GET[url];

if($wz){
	$SQL = "SELECT * FROM `".$BIAOTOU."code` WHERE `url` LIKE '$wz'";
	$query=mysql_query($SQL);
	while($row =mysql_fetch_array($query)){
		$url = $row[url];

	}
	if($wz != $url){
	echo"<p style=\"text-align:left;\"><label></label>".$get."<br /><label></label><font style=\"color:red;\">0</font></p>";//无授权
	}
	else{
	echo "<p style=\"text-align:left;\"><label></label>".$ulrl."<label></label><font style=\"color:green;\">1</font></p>"; //已授权
	}
}else{
	echo'on'; //查询的值为空
}
?>
