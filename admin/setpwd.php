<?php
include ("../conn.php");

error_reporting(E_ERROR); 
ini_set("display_errors","Off");
session_start();

if($_GET['sub'] == 'yes')
{

    if($_POST['pwd1'] == '' || $_POST['pwd2'] == '') { echo "<script language=\"JavaScript\">alert(\"新密码不能为空~\");history.go(-1);\r\n</script>"; }
    else if($_POST['pwd1'] <> $_POST['pwd2']) { echo "<script language=\"JavaScript\">alert(\"两次输入的新密码不一致，请重新输入~\");history.go(-1);\r\n</script>"; }

	else{
	
	    $sql='update member set pwd="'.$_POST['pwd1'].'" where username="admin"';
		
	    if(mysql_query($sql)) echo "<script language=\"JavaScript\">alert(\"管理员密码修改成功~\");window.location.href='setpwd.php';</script>"; 
	    else echo "执行SQL失败:$sql<BR>错误:".mysql_error();
		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="Jesonhouse" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="js/jquery.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>

<!--header-->
<?php include ("header.php"); ?>


<!--aside nav-->
<?php include ("left.php"); ?>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">管理员密码修改</h2>
      </div>
     <section>
      <ul class="ulColumn2">
	  <form method="POST" action="setpwd.php?sub=yes">
       <li>
        <span class="item_name" style="width:120px;">当前账号：</span>
		<u style="color:red;">admin</u>
       </li>
	  
       <li>
        <span class="item_name" style="width:120px;">输入新密码：</span>
        <input type="password" name="pwd1" value="" class="textbox textbox_225" placeholder="输入新密码..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">再次输入新密码：</span>
        <input type="password" name="pwd2" value="" class="textbox textbox_225" placeholder="再次输入新密码..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" value="保存"/>
       </li>
	   
      </form>
      </ul>
     </section>
 </div>
</section>

</body>
</html>
