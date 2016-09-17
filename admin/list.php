<?php
include "../include/config.php";
include "../include/check.php";

include "head.php";
?>

<body>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">授权列表信息</div>
<div class="panel-body">

<form action="list.php" method="get" name="sosname" id="sosname">
<table class="table table-bordered tb-bg">
<div class="input-group">
<input type="text" name="sosname" id="sosname" class="form-control" placeholder="请输入授权用户名">
	<span class="input-group-btn">
	<input class="btn btn-default" type="submit" value="搜索" />
    </span>
</div>
</table>
</form>
<?php
$sosname=$_GET['sosname']; 

if($_GET['sosname']){
$sql1 = mysql_query("SELECT *  FROM `".$BIAOTOU."code` WHERE `name` LIKE '$sosname'");
//$sql1=mysql_query("select * from `".$BIAOTOU."code` where name like '%$sosname%' ");//搜索
$row1=mysql_fetch_array($sql1);
?>
<table class="table table-bordered"><!--搜索-->
	<tr class="bt">
		<td>用户账号</td>
		<td>授权用户</td>
		<td>机器码</td>
		<td>到期时间</td>
		<td>操作</td>
	</tr>
			
	<tr>
	<td><?php echo $row1[id]; ?></td>
		<td><?php if($row1[name]==""){echo'无';}else{ echo $row1[name];}?></td>
		<td><?php if($row1[url]==""){echo'无';}else{ echo "<a href=\"http://".$row[url]."\" target=\"_blank\">".$row1[url]."</a>";}?></td>
		<td><?php if($row1[Endtimey]==""){echo'0000年00月00日';}else{ echo $row1[Endtimey].$row1[timemd];}?></td>
		<td>
		<?php
			if($row1[id] == "1"){
				echo '<span class="label label-info">无法修改</span>';
			}else{
				echo "<a class='btn label btn-success' href=\"edit.php?edit=ed&id=".$row1[id]."\">修改</a>&nbsp;&nbsp;<a class='btn label btn-danger' href=\"common.php?del=del&id=".$row1[id]."\">删除</a>";
			}
		?></td>
	</tr>
</table>

<?php } while ($row1 = mysql_fetch_assoc($sql1)); ?>
<table class="table table-bordered"><!--列表-->
	<tr class="bt">
		<td>授权用户</td>
		<td>机器码</td>
		<td>到期时间</td>
		<td>操作</td>
	</tr>
<?php
$perpagenum = 20;//定义每页显示几条 
$total = mysql_fetch_array(mysql_query("select count(*) from `".$BIAOTOU."code`"));//查询数据库中一共有多少条数据 
$Total = $total[0]; // 
$Totalpage = ceil($Total/$perpagenum);//上舍，取整 
if(!isset($_GET['page'])||!intval($_GET['page'])||$_GET['page']>$Totalpage)//page可能的四种状态 
{ 
$page=1; 
} 
else 
{ 
$page=$_GET['page'];//如果不满足以上四种情况，则page的值为$_GET['page'] 
} 
$startnum = ($page-1)*$perpagenum;//开始条数 
$sql = "select * from `".$BIAOTOU."code` order by id desc limit $startnum,$perpagenum";//查询出所需要的条数 
$rs = mysql_query($sql); 
if($total){ 
while($row=mysql_fetch_array($rs)){
?>
	<tr>
		<td><?php echo $row[name]?></td>
		<td><?php echo "<a href=\"http://".$row[url]."\" target=\"_blank\">".$row[url]."</a>"?></td>
		<td><?php echo $row[Endtimey].$row[timemd]?></td>
		<td>
		<?php
			if($row[id] != 1){
		 	echo "<a class='btn label btn-success' href=\"edit.php?edit=ed&id=".$row[id]."\">修改</a>&nbsp;&nbsp;<a class='btn label btn-danger' href=\"common.php?del=del&id=".$row[id]."\">删除</a>";
			}else{echo '<span class="label label-info">无法修改</span>';}
		?></td>
	</tr>
<?php
} 
while($contents = mysql_fetch_array($rs));
	$per = $page - 1;//上一页 
	$next = $page + 1;//下一页 
	
	echo "<tr class=\"page\"><td align=\"center\" colspan=\"4\">";
	echo "共有".$Total."条记录,每页".$perpagenum."条,共".$Totalpage."页 "; 
if($page != 1) { 
	echo "<a class='btn label label-success' href='".$_SERVER['PHP_SELF']."'>首页</a>"; 
	echo "&nbsp;<a class='btn label label-success' href='".$_SERVER['PHP_SELF'].'?page='.$per."'>上一页</a>"; 
} 
if($page != $Totalpage) { 
	echo " | <a class='btn label label-success' href='".$_SERVER['PHP_SELF'].'?page='.$next."'>下一页</a>"; 
	echo "&nbsp;<a class='btn label label-success' href='".$_SERVER['PHP_SELF'].'?page='.$Totalpage."'>尾页</a>"; 
	} 
}
?>
</td></tr>
</table>
</div>
</div>
</div>

</div>
</body>
</html>
