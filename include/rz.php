<?php
include "../include/config.php";


$get = $_GET[url];

if($get){
	$SQL = "SELECT * FROM `".$BIAOTOU."code` WHERE `url` LIKE '$get'";
	$query=mysql_query($SQL);
	while($row =mysql_fetch_array($query)){
		$url = $row[url];

	}
	if($get != $url){
	echo"<p style=\"text-align:left;\"><label>查询机器码：</label>".$get."<br /><label>查询结果：</label><font style=\"color:red;\">未授权</font></p>";
	}
	else{
	echo "<p style=\"text-align:left;\"><label>查询机器码：</label>".$url."<br /><label>查询结果：</label><font style=\"color:green;\">已授权</font></p>";
	}
}

$SQL = "SELECT * FROM `".$BIAOTOU."new` order by id desc limit 0,7";
$query=mysql_query($SQL);
	while($row =mysql_fetch_array($query)){
		echo "<strong><a href=\"".$row[url]."\" style=\"color:".$row[color]."\" target=\"_blank\">".$row[title]."</a></strong><br/>";
	}
?>
