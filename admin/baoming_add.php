<?php 

error_reporting(0);
include ("../conn.php");

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
    //是否存在文件
    {
         echo "<script language=\"JavaScript\">alert(\"文件不存在~\");history.go(-1);\r\n</script>"; 
         exit;
    }

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
   $username=$_POST['username'];
   $pwd1=$_POST['pwd1'];
   $sfz=$_POST['sfz'];

   //随机生成准考证号码
   srand((double)microtime()*1000000);
   $ychar="0,1,2,3,4,5,6,7,8,9";
   $list=explode(",",$ychar);
   for($i=0;$i<16;$i++){
      $randnum=rand(0,8); 
      $zkz.=$list[$randnum];
   }

   $sql='SELECT * FROM baoming where username="'.$_SESSION['username'].'"';
   $query=mysql_query($sql);
   $row=mysql_fetch_array($query);

   $sql="INSERT INTO `baoming`(`typeid` ,`username` ,`sex` ,`xuexiao`,`yuanxi`,`zybj`,`sfz`,`lxfs`,`zjz`,`zkz` ,`posttime`) VALUES ('".$_GET['id']."','".$username."','".$sex."','".$xuexiao."','".$yuanxi."','".$zybj."','".$sfz."','".$lxfs."','".$fname."','".$zkz."',now())";
   mysql_query($sql);
   echo "<script language=\"JavaScript\">alert(\"恭喜！报名信息提交成功！~\"); window.location.href='baoming_list.php?id=".$_GET['id']."';\r\n</script>";

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
       <h2 class="fl">添加报名信息</h2>
       <a href="user_list.php" class="fr top_rt_btn">返回报名列表</a>
      </div>
      <ul class="ulColumn2">
	  <form method="POST" action="baoming_add.php?sub=yes&id=<?php echo $_GET['id']?>" enctype="multipart/form-data">
	  
       <li>
        <span class="item_name" style="width:120px;">上传证件照：</span>
        <label class="uploadImg">
         <input type="file" name="upfile"/>
         <span>上传图片</span>
        </label>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">真实姓名：</span>
        <input type="text" class="textbox textbox_225" name="username" value="" placeholder="真实姓名..." />
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">性别：</span>
        <label class="single_selection"><input type="radio" value="男生" name="sex" id="sex" />男生</label>
        <label class="single_selection"><input type="radio" value="女生" name="sex" id="sex" />女生</label>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">学校：</span>
        <input type="text" class="textbox textbox_225" name="xuexiao" value="" placeholder="学校..."/>
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">院系：</span>
        <input type="text" class="textbox textbox_225" name="yuanxi" value="" placeholder="院系..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">专业班级：</span>
        <input type="text" class="textbox textbox_225" name="zybj" value="" placeholder="专业班级..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">身份证号：</span>
        <input type="text" class="textbox textbox_225" name="sfz" value="" placeholder="身份证号..."/>
        
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">联系方式：</span>
        <input type="tel" class="textbox textbox_225" name="lxfs" value="" placeholder="联系方式..."/>
        
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
