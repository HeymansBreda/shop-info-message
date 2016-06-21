<?php
error_reporting(0);
include ("../conn.php");

$page1=(int)$_GET['page'];
if($page1<2)
{
	$page=1;
}
else 
{
	$page=(int)$_GET['page'];
}
$numsql="select * from member";
$numq=mysql_query($numsql);
$num=mysql_num_rows($numq); //取得会员总人数
$pagesize = 8; //每页显示几条数据
$pageval=($page-1)*$pagesize;





$sql="select * from member limit ".$pageval." , ".$pagesize."";
$query=mysql_query($sql);
if($_GET['del'] == "yes")
{
	$delsql="delete from member where id='".$_GET['id']."'";
	mysql_query($delsql);
	echo "<script language=\"JavaScript\">alert(\"成功删除指定用户~\"); window.location.href='user_list.php';\r\n</script>";
}

if($_GET['ck'] == "yes")
{
	$upsql="update member set yanzheng='0' where id='".$_GET['id']."'";
	mysql_query($upsql);
	echo "<script language=\"JavaScript\">window.location.href='user_list.php';\r\n</script>";
}

if($_GET['ck'] == "no")
{
	$upsql="update member set yanzheng='1' where id='".$_GET['id']."'";
	mysql_query($upsql);
	echo "<script language=\"JavaScript\">window.location.href='user_list.php';\r\n</script>";
}

if($_GET['sub'] == "yes")
{
    //搜索模糊查询
	$sql2="select * from member where (username like '%" .$_POST['tt']. "%') or (sfz like '%" .$_POST['tt']. "%') or (tel like '%" .$_POST['tt']. "%') limit ".$pageval." , ".$pagesize."";
	$query2=mysql_query($sql2);

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

<SCRIPT language="JavaScript">
function xxg()
{
  if (searchform.tt.value=="")
   { 
	document.searchform.tt.focus();
	return false;
	 }
	 
return true;
  }
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
       <h2 class="fl">会员管理</h2>
       <a href="user_add.php" class="fr top_rt_btn add_icon">添加新会员</a>
      </div>
      <section class="mtb">
       <form action="user_list.php?sub=yes" method="post" name="searchform" id="searchform" class="searchinfo" onSubmit="return xxg();">
       <input type="text" id="tt" name="tt" value="" class="textbox textbox_225" placeholder="输入会员账号/姓名/手机查询..."/>
       <input type="submit" value="查询" class="group_btn"/>
	   </form>
      </section>
	  
	  
<table class="table" style="<?php if($_GET['sub'] <> 'yes') echo "display:none"; ?>">
       <tr>
        <th style="width:8%">Id</th>
        <th style="width:10%">真实姓名</th>
        <th style="width:10%">身份证号码</th>
        <th style="width:15%">手机号码</th>
        <th style="width:15%">QQ</th>
        <th style="width:15%">注册时间</th>
        <th style="width:6%">操作</th>
       </tr>
	   
<?php
while($row2=mysql_fetch_array($query2))
{
?>
       <tr>
        <td class="center"><?php echo $row2['id']?></td>
        <td class="center"><?php echo $row2['username']?></td>
        <td class="center"><?php echo $row2['sfz']?></td>
        <td class="center"><?php echo $row2['tel']?></td>
        <td class="center"><?php echo $row2['qq']?></td>
        <td class="center"><?php echo $row2['regtime']?></td>
        <td class="center">
         <a href="user_edit.php?id=<?php echo $row2['id']?>" title="编辑" class="link_icon">&#101;</a>
         <a href="user_list.php?id=<?php echo $row2['id']?>&&del=yes" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>
<?php
}
?>

</table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <table class="table" style="<?php if($_GET['sub'] == 'yes') echo "display:none"; ?>">
       <tr>
        <th style="width:8%">Id</th>
        <th style="width:10%">真实姓名</th>
        <th style="width:10%">身份证号码</th>
        <th style="width:15%">手机号码</th>
        <th style="width:15%">QQ</th>
        <th style="width:15%">注册时间</th>
        <th style="width:6%">操作</th>
       </tr>
	   
<?php
while($row=mysql_fetch_array($query))
{
?>
       <tr>
        <td class="center"><?php echo $row['id']?></td>
        <td class="center"><?php echo $row['username']?></td>
        <td class="center"><?php echo $row['sfz']?></td>
        <td class="center"><?php echo $row['tel']?></td>
        <td class="center"><?php echo $row['qq']?></td>
        <td class="center"><?php echo $row['regtime']?></td>

        <td class="center">
         <a href="user_edit.php?id=<?php echo $row['id']?>" title="编辑" class="link_icon">&#101;</a>
		 <?php if($row['username'] <> 'admin') { ?>
         <a href="user_list.php?id=<?php echo $row['id']?>&&del=yes" title="删除" class="link_icon">&#100;</a>
		 <?php } ?>
        </td>
       </tr>
<?php
}
?>

</table>


<aside class="paging">

	<a href="user_list.php?page=<?php echo $page=1; ?>">1</a>
	<a href="user_list.php?page=<?php echo $page=2; ?>">2</a>
	<a href="user_list.php?page=<?php echo $page=3; ?>">3</a>
	<a href="user_list.php?page=<?php echo $page=4; ?>">4</a>
	<a href="user_list.php?page=<?php echo $page=5; ?>">5</a>
	
	<?php 
	if($page>2)
	{
	?>
	<a href="user_list.php?page=<?php echo $page-1 ?>">上一页</a>
	<?php 
	} 
	else 
	{ 
	?>
	<a href="user_list.php?page=<?php echo $page-1 ?>">上一页</a>
	<?php 
	}
	$allpage=intval($num/$pagesize)+1;
	if(($allpage)<=$page)
	{
	?> 
	<a href="user_list.php?page=<?php echo $_GET['page']+1 ?>">下一页</a>
	<?php
	}
	?> 
	
	<?php 
	$allpage=intval($num/$pagesize);
	?> 
	
	<a href="user_list.php?page=<?php echo $allpage ?>">最后一页</a>

	<?php 
	echo "<a>当前页数第".$_GET['page']."页</a>";
	?>

</aside>

 </div>
</section>
</body>
</html>
