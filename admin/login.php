<?php

@session_start();
include ("../conn.php");

if ($_SESSION['username'] == 'admin'){
    echo "<script>location.href='index.php';</script>";
}

if ($_GET['sub'] == 'yes'){	
	
	if ($_POST['username'] == 'admin'){
	
	   $sql='SELECT * FROM member where username="admin"';
	   $query=mysql_query($sql);
	   $row=mysql_fetch_array($query);

	   if($row['pwd'] == $_POST['pwd'])
	   { 
	      $_SESSION['username'] = $_POST['username'];
	      $_SESSION['pwd']      = $_POST['pwd'];
	      echo "<script language=\"JavaScript\">window.location.href='index.php';</script>";
	   }
	   
	   else
	   {
	      echo "<script language=\"JavaScript\">alert(\"密码错误，请重新输入\"); location.href='login.php';</script>";
	   }
	   
    }
	
	else{
	   echo "<script language=\"JavaScript\">alert(\"请登录正确的管理账号\");  location.href='login.php';\r\n</script>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="迅发网络" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="js/jquery.js"></script>
<script src="js/verificationNumbers.js"></script>
<script src="js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
	  location.href="index.html";
	  });
});
</script>

<SCRIPT language="javascript">
function Checklogin()
{
	if (form1.user.value=="")
	{
		alert("请填写登录名");
		form1.user.focus();
		return false;
	}
	if (form1.pwd.value=="")
	{
		alert("密码不能为空");
		form1.pwd.focus();
		return false;
	}
}
</SCRIPT>

</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 
 <form name="form1" method="POST" action="login.php?sub=yes" onsubmit="return Checklogin();">
 <dd class="user_icon">
  <input type="text" name="username" placeholder="账号" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" name="pwd" placeholder="密码" class="login_txtbx"/>
 </dd>
 <dd class="val_icon" style="display:none;">
  <div class="checkcode">
    <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
    <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
  </div>
  <input type="button" value="验证码核验" class="ver_btn" onClick="validate();">
 </dd>
 <dd>
  <input type="submit" value="立即登陆" class="submit_btn"/>
 </dd>
 </form>

</dl>
</body>
</html>
