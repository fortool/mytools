<?php
include "include/config.php";//连接sql

$url=$_GET["url"];
$qq=$_GET["qq"];
$km=$_GET["km"];

if($_GET[submit]=="确定授权"){
if($url==""){
	header('Content-type:text/html;charset=utf-8');
	exit("<script language='javascript'>alert('机器码不能为空!');window.location.href='zdsq.php';</script>");
}else{
	header('Content-type:text/html;charset=utf-8');
	if($qq==""){
		header('Content-type:text/html;charset=utf-8');
		exit("<script language='javascript'>alert('授权QQ不能为空!');window.location.href='zdsq.php';</script>");
	}else{
		if($km==""){
			header('Content-type:text/html;charset=utf-8');
			exit("<script language='javascript'>alert('卡密不能为空!');window.location.href='zdsq.php';</script>");
		}else{
			if($km=="admin"){
				header('Content-type:text/html;charset=utf-8');
				exit("<script language='javascript'>alert('卡密有误或无法使用!');window.location.href='zdsq.php';</script>");
			}else{
			$sql="SELECT * FROM `".$BIAOTOU."km` where km='$km' limit 1";//判断卡密
			$row=mysql_fetch_array(mysql_query($sql));
			if($row){
				//添加授权
				$endtime = "<font color=\"red\">无限期</font>";
				$endtime2 = "";
				
					mysql_select_db($dbname);
					mysql_query("set names utf8");
					$SQL = "INSERT INTO `".$BIAOTOU."code` (`id`, `name`, `url`, `Started`, `Endtimey`, `timemd`) VALUES (NULL, '$qq', '$url', '".date('Y年m月d日')."', '$endtime', '$endtime2');";//添加机器码
					//echo $SQL;
					mysql_query($SQL);
					$kmid=$row[id];
					mysql_query("DELETE FROM `".$BIAOTOU."km` where `id` = $kmid ");//删除卡密
					header('Content-type:text/html;charset=utf-8');
					echo "<script>alert('【".$url."】授权成功！');location.href='jq.php?qun=".$qun."'</script>";
					mysql_close();
			}else{
				header('Content-type:text/html;charset=utf-8');
				exit("<script language='javascript'>alert('卡密错误或不存在!');window.location.href='zdsq.php';</script>");
			}
			}
		}
	}
}
}
?>

<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="shortcut icon" href="../favicon.ico"/>
    <title>Natural   自助授权</title>
    <!--baidu-->
    <meta name="baidu-site-verification" content="4IPJiuihDj" />
    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>
	body{
		margin: 0 auto;
		text-align: center;
	}
	.container {
	  max-width: 580px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.hzhz{
		float: left;
	}
	.bzbz {
	color: #31708f;
	background-color: rgba(217, 237, 247, 0.73);
	border-color: #bce8f1;

	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 3px;
	}
	.form-controltm {
	display: block;
	width: 100%;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: rgba(255, 255, 255, 0.48);
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}

	.alert-dangergg {
	color: #a94442;
	background-color: #f2dede;
	border-color: #ebccd1;

	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 4px;
	}
	</style>
</head>
<body background="/image/fzbeijing.png">
<?php include "include/bfq.php"; //播放器 ?>
<br><br>
<div class="container bzbz">    <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
		<div class="hzhz"><a class="btn btn-success" href="index.php">正版查询</a> &nbsp;</div>
          <div class="hzhz"><a class="btn btn-info" href="index.php">购买授权</a> &nbsp;</div>
		  <div class="hzhz"><a class="btn btn-warning" href="<?php echo $kmlj; ?>" target="_blank">购买卡密</a></div>
        </ul>
        <h3 class="text-muted" align="left">自动授权</h3>
     </div><br>
	<div class="alert-dangergg">
		<?php echo $sqgg; //公告?>
	</div>
	 <br>
	 <h3 class="form-signin-heading">输入授权信息</h3>
	 <form action="zdsq.php" class="form-sign" method="get"><input type="hidden" name="menu1" value="6" />
	 (请检查是否含有特殊符号)<br><br>
		 <input type="text" class="form-controltm" name="url" placeholder="请输入机器码" value=""><br>
		 <input type="text" class="form-controltm" name="qq" placeholder="请输入QQ账号" value=""><br>
		 <input type="text" class="form-controltm" name="km" placeholder="请输入授权卡密" value=""><br>
		 <input type="submit" name="submit" class="btn btn-danger btn-block" value="确定授权">
	 </form>
<br/>
<br/>
<br/>

<p style="text-align:center"><br>&copy; Powered by <a href="#">Natural   自助授权</a></p></div>
</body>
</html>