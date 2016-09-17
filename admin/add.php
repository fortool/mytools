<?php 
include "../include/config.php";
include "../include/check.php";

include "head.php";
?>
<body>
<div class="main-right  col-md-12 col-md-offset-2">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">添加机器码</div>
<form class="panel-body" name="add" method="post" action="common.php">
	<ul class="col-md-12">
  		<li class="input-group"><span class="input-group-addon">授权用户：</span><input type="text" name="name" class="form-control" placeholder="请输入授权用户名"/></li><br>
  		<li class="input-group"><span class="input-group-addon">机器码：</span><input type="text" name="url" class="form-control" placeholder="请输入机器码 不要带特殊符号"/></li><br>
	    <li class="input-group"><span class="input-group-addon">选择期限：</span><select class="form-control" name="menu1" onchange="MM_jumpMenu('parent',this,0)" style="border:1px solid #ccc;">
          <option value="1">1年</option>
          <option value="2">2年</option>
          <option value="3">3年</option>
          <option value="4">4年</option>
          <option value="5">5年</option>
          <option value="6">无限期</option>
        </select></li>
	</ul>
  <div align="right"><input type="submit" name="submit" value="确定添加" class="btn btn-success"/>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
