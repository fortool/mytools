<?php
include "../include/config.php";
header("Content-Type: text/html;charset=utf-8");

if($_POST[submit] == "login"){
$user = $_POST[name];
$pass = md5($_POST[pass]);

//echo $user,$pass;
if($user != $name){
	exit("<script language='javascript'>alert('无此用户，请检查您输入的用户是否正确!');window.location.href='login.php';</script>");
}else if($pass != $adminpass){
	exit("<script language='javascript'>alert('您输入的密码错误，请检查您是否输入正确!');window.location.href='login.php';</script>");
}
else{
	session_start();
	$_SESSION["user"] = $name;
	header("Location:main.php");
}}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Natural   机器码授权系统</title>

<link href="../admin/style/bootstrap.css" rel="stylesheet" />
<link href="../admin/style/base.css" rel="stylesheet" />
<STYLE>
.loginscreen.middle-box {
width: 300px;
}
.middle-box {
max-width: 400px;
z-index: 100;
margin: 0 auto;
padding-top: 100px;
}
</STYLE>
</head>

<body background="/image/fzbeijing.png">
<form action="login.php" method="post">
					<div class="loginscreen.middle-box middle-box" align="center">
						<div class="panel panel-default ">
                        <div class="panel-heading">登录后台</div>
							<div class="panel-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">账号</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="管理员账号">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">密码</label>
                                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="管理员密码">
                                </div>
                                <div class="form-group">
                                    <label class="label label-danger">如果你不是管理，请自行离开！</label>
                                </div>
							</div>
                                <button type="submit" name="submit" value="login" class="btn btn-success">登录</button><br><br>
                        </div>
                    </div>

</form><br>
</body>
</html>