<?php
include "../include/coon.php";

$sql=file_get_contents("text.sql"); //把SQL语句以字符串读入$sql 
$a=explode(";",$sql); //用explode()函数把?$sql字符串以“;”分割为数组 

foreach($a as $b){ //遍历数组 
$c=$b.";"; //分割后是没有“;”的，因为SQL语句以“;”结束，所以在执行SQL前把它加上 
mysql_query($c); //执行SQL语句 
}
?>

<html>
<body>
<head>
<style>
.container {
max-width: 580px;
padding: 15px;
margin: 0 auto;
}
</style>

</head>

<div class="container">
	 <form action="?" class="form-sign" method="post">
	 (不要带http://)
		 <span>数据库地址：</span><input type="text" class="form-control" name="url" value=""><br>
		 <span>数据库用户名：</span><input type="text" class="form-control" name="url" value=""><br>
		 <span>数据库密码：</span><input type="text" class="form-control" name="url" value=""><br><br>
		 <span>数据库前缀：</span><input type="text" class="form-control" name="url" value=""><br>
		 
		 <input type="submit" class="btn btn-primary btn-block" name="submit" value="点击安装"><br/>
	 </form>
</div>

</body>
</html>