<?php
include ("../conn.php");
$sql="select * from syetem";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);

if($_GET['sub'] == 'yes')
{

    if($_POST['title'] == '') { echo "<script language=\"JavaScript\">alert(\"站点标题不能为空~\");history.go(-1);\r\n</script>"; }
    else if($_POST['email'] == '') { echo "<script language=\"JavaScript\">alert(\"电子邮箱不能为空~\");history.go(-1);\r\n</script>"; }

	else{
	
	    $upsql="update syetem set title='".$_POST['title']."', keywords='".$_POST['keywords']."',description='".$_POST['description']."', address='".$_POST['address']."', email='".$_POST['email']."',icp='".$_POST['icp']."',tel='".$_POST['tel']."'";
		
	    if(mysql_query($upsql)) echo "<script language=\"JavaScript\">alert(\"系统设置修改成功~\");window.location.href='setting.php';</script>"; 
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
<script type="text/javascript" src="jedate/jedate.js"></script>
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
       <h2 class="fl">系统设置</h2>
      </div>
     <section>
      <ul class="ulColumn2">
	  <form method="POST" action="setting.php?sub=yes">
	  
       <li>
        <span class="item_name" style="width:120px;">站点名称：</span>
        <input type="text" name="title" value="<?php echo $row['title']?>" class="textbox textbox_225" placeholder="站点名称..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">关键词：</span>
        <input type="text" name="keywords" value="<?php echo $row['keywords']?>" class="textbox textbox_295" placeholder="多个关键词用”,“或”|“隔开..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">站点描述：</span>
        <input type="text" name="description" value="<?php echo $row['description']?>" class="textbox textbox_295" placeholder="站点描述..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">电子邮箱：</span>
        <input type="text" name="email" value="<?php echo $row['email']?>" class="textbox textbox_225" placeholder="电子邮箱..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">联系电话：</span>
        <input type="text" name="tel" value="<?php echo $row['tel']?>" class="textbox textbox_225" placeholder="联系电话..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">公司地址：</span>
        <input type="text" name="address" value="<?php echo $row['address']?>" class="textbox textbox_295" placeholder="公司地址..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">ICP备案号：</span>
        <input type="text" name="icp" value="<?php echo $row['icp']?>" class="textbox textbox_295" placeholder="公司地址..."/>
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
