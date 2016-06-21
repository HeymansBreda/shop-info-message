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
$numsql="select * from baoming";
$numq=mysql_query($numsql);
$num=mysql_num_rows($numq); //取得会员总人数
$pagesize = 8; //每页显示几条数据
$pageval=($page-1)*$pagesize;

$sql="select * from baoming order by id desc limit ".$pageval." , ".$pagesize."";
$query=mysql_query($sql);


if($_GET['del'] == "yes")
{
	$delsql="delete from baoming where id='".$_GET['id']."'";
	mysql_query($delsql);
	echo "<script language=\"JavaScript\">alert(\"成功删除指定报名信息~\"); window.location.href='baoming_list.php';\r\n</script>";
}

if($_GET['ck'] == "yes")
{
	$upsql="update baoming set sta='0' where id='".$_GET['id']."'";
	mysql_query($upsql);
	echo "<script language=\"JavaScript\">window.location.href='baoming_list.php';\r\n</script>";
}

if($_GET['ck'] == "no")
{
	$upsql="update baoming set sta='1' where id='".$_GET['id']."'";
	mysql_query($upsql);
	echo "<script language=\"JavaScript\">window.location.href='baoming_list.php';\r\n</script>";
}

if($_GET['sub'] == "yes")
{
    //搜索模糊查询
	$sql2="select * from baoming where (xingming like '%" .$_POST['tt']. "%') or (sfzhm like '%" .$_POST['tt']. "%') or (tel like '%" .$_POST['tt']. "%') limit ".$pageval." , ".$pagesize."";
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
       <h2 class="fl">报名列表</h2>

      </div>
	  
      <section class="mtb">
       <form action="baoming_list.php?sub=yes" method="post" name="searchform" id="searchform" class="searchinfo" onSubmit="return xxg();">
       <input type="text" id="tt" name="tt" value="" class="textbox textbox_225" placeholder="输入姓名/身份证/手机号码..."/>
       <input type="submit" value="查询" class="group_btn"/>
	   </form>
      </section>
	  
	  
<table class="table" style="<?php if($_GET['sub'] <> 'yes') echo "display:none"; ?>">
       <tr>
        <th style="width:6%">Id</th>
        <th style="width:6%">真实姓名</th>
        <th style="width:20%">身份证号码</th>
        <th style="width:6%">教育程度</th>
        <th style="width:10%">婚姻状况</th>
        <th style="width:12%">月收入</th>
        <th style="width:18%">收货地址</th>
        <th style="width:18%">报名时间</th>
        <th style="width:8%">操作</th>
       </tr>
	   
<?php
while($row2=mysql_fetch_array($query2))
{
?>
       <tr>
        <td class="center"><?php echo $row2['id']?></td>
        <td class="center"><?php echo $row2['xingming']?></td>
        <td class="center"><?php echo $row2['sfzhm']?></td>
        <td class="center"><?php echo $row2['jycd']?></td>
        <td class="center"><?php echo $row2['hyzk']?></td>
        <td class="center"><?php echo $row2['ysr']?></td>
        <td class="center"><?php echo $row2['province3']?>-<?php echo $row2['city3']?>-<?php echo $row2['area3']?></td>
        <td class="center"><?php echo $row2['posttime']?></td>

        <td class="center">
         <a href="baoming_edit.php?id=<?php echo $row2['id']?>" title="编辑" class="link_icon">&#101;</a>
         <a href="baoming_list.php?id=<?php echo $row2['id']?>&&del=yes" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>
<?php
}
?>

</table>
	  
	  
	  
<table class="table" style="<?php if($_GET['sub'] == 'yes') echo "display:none"; ?>">
       <tr>
        <th style="width:6%">Id</th>
        <th style="width:6%">真实姓名</th>
        <th style="width:20%">身份证号码</th>
        <th style="width:6%">教育程度</th>
        <th style="width:10%">婚姻状况</th>
        <th style="width:12%">月收入</th>
        <th style="width:18%">收货地址</th>
        <th style="width:18%">当前状态</th>
        <th style="width:8%">操作</th>
       </tr>
	   
<?php
while($row=mysql_fetch_array($query))
{
?>
       <tr>
        <td class="center"><?php echo $row['id']?></td>
        <td class="center"><?php echo $row['xingming']?></td>
        <td class="center"><?php echo $row['sfzhm']?></td>
        <td class="center"><?php echo $row['jycd']?></td>
        <td class="center"><?php echo $row['hyzk']?></td>
        <td class="center"><?php echo $row['ysr']?></td>
        <td class="center"><?php echo $row['province3']?>-<?php echo $row['city3']?>-<?php echo $row['area3']?></td>
        <td class="center">
		
<?php
if($row['sta'] == 1)
{
?>
<a href="baoming_list.php?ck=yes&id=<?php echo $row['id']?>" title="点击设置“未成功”" class="link_icon">&#89;</a>
<?php
}
else
{
?>
<a href="baoming_list.php?ck=no&id=<?php echo $row['id']?>" title="点击设置“成功”" class="link_icon">X</a>
<?php
}
?>

		</td>

        <td class="center">
         <a href="baoming_edit.php?id=<?php echo $row['id']?>" title="编辑" class="link_icon">&#101;</a>
         <a href="baoming_list.php?id=<?php echo $row['id']?>&&del=yes" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>
<?php
}
?>

</table>

<aside class="paging">

<?php
if($num <= $pagesize)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=1; ?>">1</a>
<?php
}
?>

<?php
$tt = $num / $pagesize;
if($tt > 1 && $tt < 2)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=2; ?>">2</a>
<?php
}
?>

<?php
$tt = $num / $pagesize;
if($tt > 2 && $tt < 3)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=3; ?>">3</a>
<?php
}
?>


<?php
$tt = $num / $pagesize;
if($tt > 3 && $tt < 4)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=4; ?>">4</a>
<?php
}
?>



<?php
$tt = $num / $pagesize;
if($tt > 4 && $tt < 5)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=5; ?>">5</a>
<?php
}
?>



<?php
$tt = $num / $pagesize;
if($tt > 5 && $tt < 6)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=6; ?>">6</a>
<?php
}
?>



<?php
$tt = $num / $pagesize;
if($tt > 6 && $tt < 7)
{
?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page=7; ?>">7</a>
<?php
}
?>


	<?php 
	if($page>2)
	{
	?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page-1 ?>">上一页</a>
	<?php 
	} 
	else 
	{ 
	?>
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $page-1 ?>">上一页</a>
	<?php 
	}
	$allpage=intval($num/$pagesize)+1;
	if(($allpage)<=$page)
	{
	?> 
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $_GET['page']+1 ?>">下一页</a>
	<?php
	}
	?> 
	
	<?php 
	$allpage=intval($num/$pagesize);
	?> 
	
	<a href="baoming_list.php?id=<?php echo $_GET['id']?>&page=<?php echo $allpage ?>">最后一页</a>

	<?php 
	if($_GET['page'] == '') 
	echo "<a>当前页数第1页</a>";

    else
	echo "<a>当前页数第".$_GET['page']."页</a>";
	?>

</aside>

 </div>
</section>
</body>
</html>
