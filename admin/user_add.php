<?php 

error_reporting(0);
include ("../conn.php");

if($_GET['sub'] == 'yes')
{

$username=$_POST['username'];
$pwd=$_POST['pwd'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
$email=$_POST['email'];
$address=$_POST['address'];
$sfz=$_POST['sfz'];

$sql="INSERT INTO `member`(`username` ,`pwd` ,`tel` ,`qq` ,`email` ,`address` ,`sfz` ,`regtime`) VALUES ('".$username."','".$pwd."','".$tel."','".$qq."','".$email."','".$address."','".$sfz."',now())";

if(mysql_query($sql)) echo "<script language=\"JavaScript\">alert(\"会员添加成功~\");window.location.href='user_list.php';</script>"; 
else echo "执行SQL失败:$sql<BR>错误:".mysql_error();
		

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
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
       <h2 class="fl">会员详情</h2>
       <a href="user_list.php" class="fr top_rt_btn">返回会员列表</a>
      </div>
      <ul class="ulColumn2">
	  <form method="POST" action="user_add.php?sub=yes">

       <li>
        <span class="item_name" style="width:120px;">真实姓名：</span>
        <input type="text" class="textbox textbox_225" name="username" value="" placeholder="真实姓名..." />
       </li>

       <li>
        <span class="item_name" style="width:120px;">登陆密码：</span>
        <input type="password" class="textbox textbox_225" name="pwd" value="" placeholder="会员密码..."/>
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">手机号码：</span>
        <input type="text" class="textbox textbox_225" name="tel" value="" placeholder="手机号码..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">QQ：</span>
        <input type="text" class="textbox textbox_225" name="qq" value="" placeholder="QQ号码..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">电子邮箱：</span>
        <input type="email" class="textbox textbox_225" name="email" value="" placeholder="电子邮箱..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">详细地址：</span>
        <input type="tel" class="textbox textbox_225" name="address" value="" placeholder="详细地址..."/>
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">身份证号码：</span>
        <input type="tel" class="textbox textbox_225" name="sfz" value="" placeholder="身份证号码..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" name="submit" class="link_btn" value="提交保存"/>
       </li>
      </form>
      </ul>
 </div>
</section>
</body>
</html>
