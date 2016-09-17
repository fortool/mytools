<html>
<head>
<link rel="shortcut icon" href="../favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ''.$title.'- '.$suffix.'';?></title>
	<!--载入css-->
	<link href="../admin/style/bootstrap.css" rel="stylesheet" />
    <link href="../admin/style/base.css" rel="stylesheet" />
	
	<!--载入JS-->
	<script src="../admin/style/js/jquery.min.js"></script>
    <script src="../admin/style/js/bootstrap.min.js"></script>
	<!--备份JS-->
	<!--script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script-->
	
<!--add.php-->
<script type="text/javascript" language="javascript">
function CheckPost()
{
	if (add.name.value=="")
	{
		alert("授权用户不能为空！");
		add.name.focus();
		return false;
	}
	if (add.url.value=="")
	{
		alert("机器码不能为空！");
		add.url.focus();
		return false;
	}
}
</script>
<!-----------------//-------//-------------------->

</head>
<body background="/image/fzbeijing.png">
        <nav class="navbar navbar-default row no-yj  navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-list-left" aria-expanded="false">
        <span class="sr-only">个人信息</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                    <a class="navbar-brand" href="#"><?php echo $title;?></a>
                </div>

                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="height: 50px">
                            <img class="img-circle pull-left img-responsive nav-user-img" src="../admin/style/user.png" /><span class="pull-left nav-username">管理员</span></a>

                            <ul class="dropdown-menu dropdown-menu-right clearfix" style="padding-top: 0px">
                                <li class="user-li-head"><span>
                                    <img class="img-circle nav-user-img-xiala center-block" src="../admin/style/mrtx.jpg" /></span>
                                    <p></p>
                                    <p class="text-center"><span><?php echo $title;?></span></p>
                                    <p class="text-center"><span>#</span> </p>
                                    <p class="text-center"><small><span>Natural   </span></small></p>
                                </li>
                                <li style="padding: 10px 20px; padding-bottom: 20px">

                                    <div class="pull-left">
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=120319925&site=qq&menu=yes" class="btn btn-default btn-flat no-yj">联系</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../admin/common.php?url=exit" class="btn btn-default btn-flat no-yj">注销</a>
                                    </div>
                                </li>
                                </ul>
                        </li>
                    </ul>


                </div>



            </div>
        </nav>
<div class="row" style="margin-top:70px">
<div class="  nav-left col-md-2 no-padding" id="nav-list-left">
                <div class="user-panel">
                    <img src="../admin/style/mrtx.jpg" class="img-circle center-block" />
                </div>

                <div class="nav-list" >
                    <ul>
                        <li>
                            <a href="../">首页</a>
                        </li>
						<li>
                            <a href="../admin/main.php">管理中心</a>
                        </li>
                        <li>
                            <a href="../admin/add.php">添加授权</a>
                        </li>
						<li>
                            <a href="../admin/kmlist.php">卡密列表</a>
                        </li>
                        <li>
                            <a href="../admin/list.php">授权列表</a>
                        </li>
						<li>
                            <a href="../admin/common.php?url=exit">退出</a>
                        </li>
                    </ul>
                </div>
            </div>
</div>
<div class="main-right  col-md-10 col-md-offset-2">