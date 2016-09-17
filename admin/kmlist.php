<?php
include "../include/config.php";
include "../include/check.php";

include "head.php";
?>
<body>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">卡密列表信息</div>
<div class="panel-body">

<form action="kmlist.php" method="get">
	<table class="table table-bordered tb-bg">
	<div class="input-group">
	<input type="text" name="kmsl" class="form-control" placeholder="请输入生成卡密数量" />
		<span class="input-group-btn">
		<input class="btn btn-default" type="submit" name="submit" value="生成" />
		</span>
	</div>
	</table>
</form>

<?php
//添加卡密
if($_GET[submit]=="生成"){
$kmsl=$_GET[kmsl];
$scsj=date('Y年m月d日');
if($kmsl==""){
	echo "<script>alert('生成数量不能为空！');location.href='../admin/kmlist.php'</script>";
}else{
//取随机数
function getkm($len = 12)
{
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$strlen = strlen($str);
	$randstr = "";
	for ($i = 0; $i < $len; $i++) {
		$randstr .= $str[mt_rand(0, $strlen - 1)];
	}
	return $randstr;
}//开始添加
for ($i = 0; $i < $kmsl; $i++) { //添加数量
	$km=getkm(12);
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "INSERT INTO `".$BIAOTOU."km` (`id`, `km`, `addtime`) VALUES (NULL, '$km', '$scsj');";//生成卡密
	mysql_query($SQL);
}
	echo "<script>alert('生成卡密成功，一共生成 ".$kmsl." 张卡密！');location.href='../admin/kmlist.php'</script>";
	mysql_close();
}}
?>

<table class="table table-bordered">
	<tr class="bt">
	<td>卡号</td>
		<td>卡密</td>
		<td>生成时间</td>
		<td>操作</td>
	</tr>
<?php
$perpagenum = 20;//定义每页显示几条 
$total = mysql_fetch_array(mysql_query("select count(*) from `".$BIAOTOU."km`"));//查询数据库中一共有多少条数据 
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
$sql = "select * from `".$BIAOTOU."km` order by id desc limit $startnum,$perpagenum";//查询出所需要的条数 
$rs = mysql_query($sql); 
if($total){ 
while($row=mysql_fetch_array($rs)){
?>
	<tr>
	<td><?php echo $row[id]; ?>
		<td><font color="green"><?php echo $row[km]?></font></td>
		<td><?php echo $row[addtime]?></td>
		<td>
		<?php
			if($row[id] == "1"){
				echo '<span class="label label-info">默认卡密</span>';
			}else{ 
				echo "<a class='btn label btn-danger' href=\"common.php?del=km&id=".$row[id]."\">删除</a>"; 
			}
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

</div>
</body>
</html>