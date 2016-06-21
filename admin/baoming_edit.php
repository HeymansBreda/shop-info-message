<?php 

error_reporting(0);
include ("../conn.php");

$sql='select * from baoming where id="'.$_GET['id'].'"';
$query=mysql_query($sql);
$row=mysql_fetch_array($query);

$sql2="select * from syetem";
$query2=mysql_query($sql2);
$row2=mysql_fetch_array($query2);

$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/bmp'
);

$max_file_size = 838860800;     //上传文件大小限制不超过100MB
$destination_folder="../upimg/"; //上传文件路径



if($_GET['sub'] == 'yes')
{

if (!is_uploaded_file($_FILES["upfile"][tmp_name]))
{
   $upsql="update baoming set xingming='".$_POST['xingming']."',sfzhm='".$_POST['sfzhm']."',jycd='".$_POST['jycd']."', hyzk='".$_POST['hyzk']."', ysr='".$_POST['ysr']."',province3='".$_POST['province3']."',city3='".$_POST['city3']."',area3='".$_POST['area3']."',address='".$_POST['address']."',zylb='".$_POST['zylb']."',tel='".$_POST['tel']."',tjrkh='".$_POST['tjrkh']."',sta='".$_POST['sta']."' where id='".$_GET['id']."'";
   //echo $upsql;
   if(mysql_query($upsql)) echo "<script language=\"JavaScript\">alert(\"报名信息修改成功~\");window.location.href='baoming_list.php';</script>"; 
   else echo "执行SQL失败:$sql<BR>错误:".mysql_error();
}


else
{

    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //检查文件大小
    {
        echo "<script language=\"JavaScript\">alert(\"文件太大~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //检查文件类型
    {
        echo "<script language=\"JavaScript\">alert(\"文件类型不符~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!file_exists($destination_folder))
    {
        mkdir($destination_folder);
    }

    $filename=$file["tmp_name"];
    $image_size = getimagesize($filename);
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.time().".".$ftype;
    if (file_exists($destination) && $overwrite != true)
    {
        echo "<script language=\"JavaScript\">alert(\"同名文件已经存在了~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!move_uploaded_file ($filename, $destination))
    {
        echo "<script language=\"JavaScript\">alert(\"移动文件出错~\");history.go(-1);\r\n</script>"; 
        exit;
    }

   $pinfo=pathinfo($destination);
   $fname=$pinfo[basename];
   
   $upsql="update baoming set xingming='".$_POST['xingming']."',sfzhm='".$_POST['sfzhm']."',jycd='".$_POST['jycd']."', hyzk='".$_POST['hyzk']."', ysr='".$_POST['ysr']."',province3='".$_POST['province3']."',city3='".$_POST['city3']."',area3='".$_POST['area3']."',address='".$_POST['address']."',zylb='".$_POST['zylb']."',tel='".$_POST['tel']."',tjrkh='".$_POST['tjrkh']."',sta='".$_POST['sta']."' where id='".$_GET['id']."'";
   //echo $upsql;
   if(mysql_query($upsql)) echo "<script language=\"JavaScript\">alert(\"报名信息修改成功~\");window.location.href='baoming_list.php';</script>"; 
   else echo "执行SQL失败:$sql<BR>错误:".mysql_error();

}
	

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


<?php include ("header.php"); ?>



<?php include ("left.php"); ?>


<script type="text/javascript" src="js/jquery.PrintArea.js"></script>  
<script>  
$(document).ready(function(){  
  $("#biuuu_button").click(function(){  
  
  $("#myPrintArea").printArea();  
  
});  
});  
  
</script>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">编辑报名信息</h2>
       <a href="baoming_list.php" class="fr top_rt_btn">返回报名列表</a>
      </div>
      <ul class="ulColumn2">

	  <form method="POST" action="baoming_edit.php?sub=yes&id=<?php echo $row['id'];?>" enctype="multipart/form-data">
	  
	  
       <li style="height:110px; ">
        <span class="item_name" style="width:120px;">身份证正面照：</span>
        <a href="<?php echo "../upimg/".$row['sfz_img']; ?>" target="_blank" title="查看大图">
		<img src="<?php echo "../upimg/".$row['sfz_img']; ?>" width="80" style=" margin-left:60px; margin-top:-30px; ">
        </a>
       </li>
	  
	  
       <li style="height:110px; ">
        <span class="item_name" style="width:120px;">储蓄卡正面照：</span>
        <a href="<?php echo "../upimg/".$row['cxk_img']; ?>" target="_blank" title="查看大图">
		<img src="<?php echo "../upimg/".$row['cxk_img']; ?>" width="80" style=" margin-left:60px; margin-top:-30px; ">
        </a>
       </li>
	  
	  
       <li style="height:110px; ">
        <span class="item_name" style="width:120px;">手持身份证照：</span>
        <a href="<?php echo "../upimg/".$row['scsfz_img']; ?>" target="_blank" title="查看大图">
		<img src="<?php echo "../upimg/".$row['scsfz_img']; ?>" width="80" style=" margin-left:60px; margin-top:-30px; ">
        </a>
       </li>
	   
	   
	   
	   
	   
	   
       <li style="height:40px;">
        <span class="item_name" style="width:120px;">真实姓名：</span>
        <input type="text" class="textbox textbox_225" name="xingming" value="<?php echo $row['xingming'];?>" placeholder="真实姓名..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">身份证号码：</span>
        <input type="text" class="textbox textbox_225" name="sfzhm" value="<?php echo $row['sfzhm'];?>" placeholder="身份证号码..."/>
       </li> 
	   
       <li>
        <span class="item_name" style="width:120px;">教育程度：</span>
        <select class="select" name="jycd">
        <option>请选择学历</option>
        <option value="硕士及以上" <?php if($row['jycd'] == '硕士及以上') echo "selected='selected'";?>>硕士及以上</option>
        <option value="本科" <?php if($row['jycd'] == '本科') echo "selected='selected'";?>>本科</option>
        <option value="本科及以下" <?php if($row['jycd'] == '本科及以下') echo "selected='selected'";?>>本科及以下</option>
        </select>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">婚姻状况：</span>
        <select class="select" name="hyzk">
        <option>请选择你的婚姻状况</option>
        <option value="已婚" <?php if($row['hyzk'] == '已婚') echo "selected='selected'";?>>已婚</option>
        <option value="未婚" <?php if($row['hyzk'] == '未婚') echo "selected='selected'";?>>未婚</option>
        <option value="离异" <?php if($row['hyzk'] == '离异') echo "selected='selected'";?>>离异</option>
        <option value="其它" <?php if($row['hyzk'] == '其它') echo "selected='selected'";?>>其它</option>
        </select>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">月收入：</span>
        <select class="select" name="ysr">
        <option>请选择月收入</option>
        <option value="3000以下" <?php if($row['ysr'] == '3000以下') echo "selected='selected'";?>>3000以下</option>
        <option value="3000~5000" <?php if($row['ysr'] == '3000~5000') echo "selected='selected'";?>>3000~5000</option>
        <option value="5001~8000" <?php if($row['ysr'] == '5001~8000') echo "selected='selected'";?>>5001~8000</option>
        <option value="8001~12000" <?php if($row['ysr'] == '8001~12000') echo "selected='selected'";?>>8001~12000</option>
        <option value="12001~15000" <?php if($row['ysr'] == '12001~15000') echo "selected='selected'";?>>12001~15000</option>
        <option value="15001~20000" <?php if($row['ysr'] == '15001~20000') echo "selected='selected'";?>>15001~20000</option>
        <option value="20000以上" <?php if($row['ysr'] == '20000以上') echo "selected='selected'";?>>20000以上</option>
        </select>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">收货地址：</span>
        <input type="text" class="textbox textbox_225" name="province3" value="<?php echo $row['province3'];?>"/>
        <input type="text" class="textbox textbox_225" name="city3" value="<?php echo $row['city3'];?>"/>
        <input type="text" class="textbox textbox_225" name="area3" value="<?php echo $row['area3'];?>"/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">详细地址：</span>
        <input type="text" class="textbox textbox_225" name="address" value="<?php echo $row['address'];?>" placeholder="详细地址..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">职业类别：</span>
        <select class="select" name="zylb">
        <option>请选择职业</option>
        <option value="企业老板" <?php if($row['zylb'] == '企业老板') echo "selected='selected'";?>>企业老板</option>
        <option value="私营业主" <?php if($row['zylb'] == '私营业主') echo "selected='selected'";?>>私营业主</option>
        <option value="上班族" <?php if($row['zylb'] == '上班族') echo "selected='selected'";?>>上班族</option>
        <option value="其他" <?php if($row['zylb'] == '其他') echo "selected='selected'";?>>其他</option>
        </select>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">手机号码：</span>
        <input type="tel" class="textbox textbox_225" name="tel" value="<?php echo $row['tel'];?>" placeholder="手机号码..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">推荐人卡号：</span>
        <input type="tel" class="textbox textbox_225" name="tjrkh" value="<?php echo $row['tjrkh'];?>" placeholder="推荐人卡号..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">设置状态：</span>
        <select class="select" name="sta">
        <option>请选择状态</option>
        <option value="0" <?php if($row['sta'] == '0') echo "selected='selected'";?>>未成功</option>
        <option value="1" <?php if($row['sta'] == '1') echo "selected='selected'";?>>成功</option>
        </select>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">报名时间：</span>
        <?php echo $row['posttime'];?>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" value="更新/保存"/>
       </li>
	   
      </form>

	  
      </ul>
 </div>
</section>
</body>
</html>
