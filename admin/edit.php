<?php 
include "../include/config.php";
include "../include/check.php";

include "head.php";
echo '<body>';
$id = $_GET[id];
	$name = $_POST[name];
	$url = $_POST[url];
	
	$SQL = "SELECT * FROM `".$BIAOTOU."code` WHERE `id` LIKE '$id'";
		$query=mysql_query($SQL);
		while($row = mysql_fetch_array($query)){
			$squrl = $row[url];
			$sqname = $row[name];
			$endtime = $row[Endtimey];
			$endtimemd = $row[timemd];
		}
	//echo $_POST['submit'];
	//echo ($endtime+1).$endtimemd;
	if($_POST[submit] == "确定修改"){
		switch($_POST[menu1]){
			case 0;
				$time = 0;
				break;
			case 1;
				$time = 1;
				break;
			case 2;
				$time = 2;
				break;
			case 3;
				$time = 3;
				break;
			case 4;
				$time = 4;
				break;
			case 5;
				$time = 5;
				break;
			case 6;
				$time = "<font color=\"red\">无限期</font>";
				$endtimemd = ""; 
				break;
		}
		if($_POST[menu1] == 6){
			mysql_query("UPDATE `".$BIAOTOU."code` SET 
						`name` = '$name',
						`url` = '$url',
						`Endtimey` = '$time',
						`timemd` = '$endtimemd'
						WHERE `".$BIAOTOU."code`.`id` =$id LIMIT 1 ;");
			//echo $endtime+$time.$endtimemd;
			echo "<script>alert('修改完成！');location.href='../admin/list.php'</script>";
			mysql_close();
		}
		elseif($_POST[menu1] == 0){
			$timey = $endtime;
			mysql_query("UPDATE `".$BIAOTOU."code` SET 
						`name` = '$name',
						`url` = '$url',
						`Endtimey` = '$timey',
						`timemd` = '$endtimemd' 
						WHERE `".$BIAOTOU."code`.`id` =$id LIMIT 1 ;");
			echo "<script>alert('修改完成！');location.href='../admin/list.php'</script>";
			mysql_close();
		}
		else{
			//echo $time;
			$timey = $endtime+$time;
			if($endtime != "<font color=\"red\">无限期</font>"){
			mysql_query("UPDATE `".$BIAOTOU."code` SET 
						`name` = '$name',
						`url` = '$url',
						`Endtimey` = '$timey',
						`timemd` = '$endtimemd' 
						WHERE `".$BIAOTOU."code`.`id` =$id LIMIT 1 ;");
			echo "<script>alert('修改完成！');location.href='../admin/list.php'</script>";
			mysql_close();
			}
			else{
				echo "<script>alert('该用户为永久用户，无需延长时间！');location.href='../admin/list.php'</script>";
			}
		}
	}
?>
<div class="main-right  col-md-12 col-md-offset-2">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">修改信息</div>
<form class="panel-body" name="form1" method="post" action="edit.php?edit=ed&id=<?php echo $id?>">
	<ul class="col-md-12">
  		<li class="input-group"><span class="input-group-addon">授权用户：</span><input type="text" name="name" value="<?php echo $sqname;?>" class="form-control"/></li><br>
  		<li class="input-group"><span class="input-group-addon">机器码：</span><input type="text" name="url" value="<?php echo $squrl;?>" class="form-control"/></li><br>
	    <li class="input-group"><span class="input-group-addon">选择期限：</span><select class="form-control" name="menu1" onchange="MM_jumpMenu('parent',this,0)" style="border:1px solid #ccc;">
          <option value="0">无操作</option>
		  <option value="1">1年</option>
          <option value="2">2年</option>
          <option value="3">3年</option>
          <option value="4">4年</option>
          <option value="5">5年</option>
          <option value="6">无限期</option>
        </select></li>
	</ul>
  <div align="right"><input type="submit" name="submit" value="确定修改" class="btn btn-success"/>
</form>
</div>
</div>
</div>
</div>

</div>
</body>
</html>
