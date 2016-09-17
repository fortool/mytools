<?php 
include "../include/config.php";
include "../include/check.php";

$backup = "../install/install.lock";
if(!file_exists($backup)){
	echo "程序未安装，<a href=\"../install\">点击去安装</a>或者输入http://您的域名/install/";
}
else{
include "head.php";
echo '<body>';
$xgtitle = $_POST[title];
$xgsuffix = $_POST[suffix];
$user = $_POST[user];
$webpass = md5($_POST[pass]);
$webpass2 = md5($_POST[pass2]);
$qqun = $_POST[qun];

//修改系统信息
if($_POST[Submit] == "确定修改"){
	if($xgtitle == ""){//如果是空则 取sql默认
		$xgtitle=$title;
	}else{
		if($xgsuffix == ""){//如果是空则 取sql默认
			$xgsuffix=$suffix;
		}else{
			if($qqun == ""){
				$qqun=$qun;
			}
		}
			mysql_query("UPDATE `".$BIAOTOU."conf` SET 
			`title` = '$xgtitle',
			`suffix` = '$xgsuffix',
			`qqun` = '$qqun';");
echo "<script>alert('修改系统信息完成！');location.href='../admin/main.php'</script>";
	}
}else{
	//修改账号信息
if($_POST[Submit] == "修改"){
	if($webpass == $webpass2){
		if($user==""){//如果是空则 取sql默认账号
			$user=$name;
		}else{
			if($webpass==""){
				$webpass=$adminpass;//如果是空则 取sql默认密码
			}
		}
			mysql_query("UPDATE `".$BIAOTOU."user` SET 
			`adminname` = '$user',
			`password` = '$webpass'");
echo "<script>alert('修改账号信息完成！');location.href='../admin/main.php'</script>";
	}else{
		echo "<script>alert('重复密码错误或修改密码错误！');location.href='../admin/main.php'</script>";
	}}
}
?>

<form method="post" name="form1" action="main.php">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">修改系统信息</div>
<div class="panel-body">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">网站名称:</span>
		<input type="text" name="title" class="form-control" value="<?php echo $title;?>" placeholder="请输入网站名称">
    </div><br>
	
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">网站后缀:</span>
		<input type="text" name="suffix" class="form-control" value="<?php echo $suffix;?>" placeholder="请输入网站后缀">
    </div><br>
	
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">修改授权入群号:</span>
		<input type="text" name="qun" class="form-control" value="<?php echo $qun;?>" placeholder="请输入要修改的用户名">
    </div><br><span class="label label-success">授权完毕后自动添加 售后QQ群！</span>
	<div align="right"><input type="submit" name="Submit" value="确定修改" class="btn btn-default"/></div>
</div>
</div>
</div>
</form>

<form method="post" name="form1" action="main.php">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">修改账号信息</div>
<div class="panel-body">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">修改用户名:</span>
		<input type="text" name="user" class="form-control" value="<?php echo $name;?>" placeholder="请输入要修改的用户名">
    </div><br>
	
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">修改密码:</span>
		<input type="text" name="pass" class="form-control" value="" placeholder="请输入要修改的密码">
    </div><br>
	
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">重复密码:</span>
		<input type="text" name="pass2" class="form-control" placeholder="请重复一次您刚刚输入的密码">
    </div><br>
	<div align="right"><input type="submit" name="Submit" value="修改" class="btn btn-default"/></div>
</div>
</div>
</div>
</form>

<form method="post" name="form1" action="common.php">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">修改自动授权公告</div>
<div class="panel-body">
	<textarea type="text" name="sqgg" class="form-control" style="margin: 0px -0.671875px 0px 0px; width: 411px; height: 86px;" placeholder="<?php echo $sqgg;?>"></textarea><br>
<div align="right"><input type="submit" name="Submit" value="修改公告" class="btn btn-default"/></div>
</div>
</div>
</div>
</form>

<form method="post" name="form1" action="common.php">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">购买卡密链接</div>
<div class="panel-body">
<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">卡密链接:</span>
	<input type="text" name="kmlj" class="form-control" value="<?php echo $kmlj;?>" placeholder="请输入要修改的链接">
</div><br><span class="label label-success">购买卡密跳转链接！</span>
<div align="right"><input type="submit" name="Submit" value="修改链接" class="btn btn-default"/></div>
</div>
</div>
</div>
</form>

<form method="post" name="form1" action="common.php">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">音乐播放器设置</div>
<div class="panel-body">
<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">播放器歌曲地址:</span>
	<input type="text" name="bfqgq" class="form-control" value="<?php echo $bfqdz;?>" placeholder="如：520xz.cc/xxx.mp3">
</div><br>

<li class="input-group">
	<span class="input-group-addon">是否开启播放器：</span>
<?php 
if($bfqkq == "1"){
	$mrtx="开启";
}else{
	$mrtx="关闭";
}
?>
	<select class="form-control" name="bfqsfkq" value="<?php echo $bfqkq; ?>">
      <option value="<?php echo $bfqkq; ?>" selected="selected"><?php echo $mrtx; ?></option>
	  <option value="1">1_开启</option>
      <option value="0">0_关闭</option>
    </select>
</li><br><br>
<div align="right"><input type="submit" name="Submit" value="修改播放器设置" class="btn btn-default"/></div>
</div>
</div>
</div>
</form>

<?php }?>

</div>
</body>
</html>
