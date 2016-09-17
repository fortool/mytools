<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="shortcut icon" href="../favicon.ico"/>
    <title>Natural  机器码授权系统</title>
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
	</style>
	<script type="text/javascript">
	  function getValue(obj,str){
	  var input=window.document.getElementById(obj);
	  input.value=str;
	  }
  </script>
  </head>
<body background="/image/fzbeijing.png">
<?php include "include/bfq.php"; //播放器 ?>
<br><br>
<div class="container bzbz">    <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <div class="hzhz"><a class="btn btn-success" href="index.php">正版查询</a> &nbsp;</div>
          <div class="hzhz"><a class="btn btn-warning" href="zdsq.php">自助授权</a></div>
        </ul>
        <h3 class="text-muted" align="left">授权查询</h3>
     </div><hr>
	 <h3 class="form-signin-heading">机器码</h3>
	 <form action="?" class="form-sign" method="get">
	 (请检查是否含有特殊符号)<br><br>
	 <input type="text" class="form-controltm" name="url" placeholder="请输入机器码" value=""><br>
	 <input type="submit" class="btn btn-danger btn-block" name="submit" value="点击查询"><br/>
<br/>
<br/>

   <?php include "include/rz.php"; //显示结果?>
<p style="text-align:center"><br>&copy; Powered by <a href="#">Natural  机器码授权系统</a></p></div>
</body>
</html>