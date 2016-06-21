<?php 

@session_start();
include ("../conn.php");

if ($_SESSION['username'] == ''){
    
	echo "<script language=\"JavaScript\">alert(\"尚未登录~\");window.location.href='login.php';\r\n</script>";

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

     <h1 style="color:red;font-size:20px;font-weight:bold;text-align:center;">这是后台首页</h1>

 </div>
</section>


</body>
</html>
