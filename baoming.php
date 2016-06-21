<?php
include ("conn.php");

$sql="select * from syetem";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);

date_default_timezone_set('Asia/Shanghai');
$now = date("Y-m-d H:i:s");  //获取当前日期和时间

$nowtime = '"'.$now.'"' ;
$end = '"'.$row['endtime'].'"' ;

if($nowtime > $end)   //判断是否在设置的时间段内
{
    echo "<script language=\"JavaScript\">alert('抱歉！报名已关闭！ 截止时间为：".$row['endtime']."');location.href='index.php';</script>";  //提示截止日期
	exit;
}

if ($_SESSION['username'] == ''){

    echo "<script>alert(\"抱歉！您未登录，需要先登录后才能报名~\");location.href='login.php';</script>";

}


$sql3="select * from member where username= '".$_SESSION['username']."'";
$query3=mysql_query($sql3);
$row3=mysql_fetch_array($query3);

$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/bmp'
);

$max_file_size = 838860800;     //上传文件大小限制不超过100MB
$destination_folder="upimg/"; //上传文件路径



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

   if($row['typeid'] == '1'){ echo "<script language=\"JavaScript\">alert(\"抱歉！您已经报名“英语四级考试”，请勿重复提交报名！\"); javascript:history.go(-1);\r\n</script>";}

   elseif($row['typeid'] == '2'){ echo "<script language=\"JavaScript\">alert(\"抱歉！您已经报名“英语六级考试”~\"); javascript:history.go(-1);\r\n</script>";}

   else{
      $sql="INSERT INTO `baoming`(`typeid` ,`username` ,`sex` ,`xuexiao`,`yuanxi`,`zybj`,`sfz`,`lxfs`,`zjz`,`zkz` ,`posttime`) VALUES ('".$_GET['id']."','".$username."','".$sex."','".$xuexiao."','".$yuanxi."','".$zybj."','".$sfz."','".$lxfs."','".$fname."','".$zkz."',now())";
      mysql_query($sql);
      echo "<script language=\"JavaScript\">alert(\"恭喜！您的报名信息提交成功！~\"); window.location.href='home.php';\r\n</script>";
   }
 }


?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php if($_GET['id'] == '1') echo "英语四级考试"; if($_GET['id'] == '2') echo "英语六级考试"; ?> - <?php echo $row['title'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="css/portal.base.min.css" type="text/css"/>   
<link rel="stylesheet" href="css/new-search.css" type="text/css"/>   
<link rel="stylesheet" href="css/internet.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="css/register.css" />

<script type="text/javascript" src="js/jquery-1.8.3-min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.metadata.js"></script>
<script type="text/javascript" src="js/login.js"></script>

<style>
    .comment {
        width: 700px;
        margin: 200px auto 0px auto;
    }

    .comment-text-area {
        width: 700px;
    }

    .text-area {
        width: 680px;
        max-width: 680px;
        max-height: 150px;
        border: 5px #d6d7d7 solid;
        height: 150px;
        overflow: hidden;
        padding: 5px 5px 5px 5px;
        color: #d6d7d7;
    }

    .text-area-input-length {
        font-size: 12px;
        line-height: 30px;
    }

    .text-area-input-length span {
        margin: 0px 5px 0px 5px;
        color: #18b4ed;
    }

    .text-area-bottom {
        text-align: right;
        margin: 5px 0px 0px 0px;
        float: right;
        padding: 0px 0px 0px 0px;
    }

    .text-area-bottom a {
        border: #d6d7d7 2px solid;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        color: #d6d7d7;
        font-size: 14px;
    }

    .text-area-star {

        overflow: hidden;
        margin:0 auto;
    }

    .text-area-star label {
	    float:left; 
        width: 100px; 
        line-height: 35px;
        height: 35px;
        font-size: 12px;
        margin: 0px 10px 10px 0px;
        padding: 0px 5px 0px 5px;
        cursor: pointer;
        border: 1px solid #d6d7d7;
    }

    .red {
        color: #18b4ed;
        border: 1px solid #18b4ed !important;
    }

    .text-area-star label input {
        filter: alpha(opacity=0);
        -moz-opacity: 0;
        opacity: 0;
        margin:0 auto;
    }

    .text-area-star label span {
        padding: 10px 10px 10px 10px;
        
    }
	
.uploader { position:relative; display:inline-block; overflow:hidden; cursor:default; padding:0; margin:10px 0px; -moz-box-shadow:0px 0px 5px #ddd; -webkit-box-shadow:0px 0px 5px #ddd; box-shadow:0px 0px 5px #ddd; -moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px; }
.filename { float:left; display:inline-block; outline:0 none; height:32px; width:180px; margin:0; padding:8px 10px; overflow:hidden; cursor:default; border:1px solid; border-right:0; font:9pt/100% Arial, Helvetica, sans-serif; color:#777; text-shadow:1px 1px 0px #fff; text-overflow:ellipsis; white-space:nowrap; -moz-border-radius:5px 0px 0px 5px; -webkit-border-radius:5px 0px 0px 5px; border-radius:5px 0px 0px 5px; background:#f5f5f5; background:-moz-linear-gradient(top, #fafafa 0%, #eee 100%); background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fafafa), color-stop(100%, #f5f5f5)); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fafafa', endColorstr='#f5f5f5', GradientType=0);
border-color:#ccc; -moz-box-shadow:0px 0px 1px #fff inset; -webkit-box-shadow:0px 0px 1px #fff inset; box-shadow:0px 0px 1px #fff inset; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; box-sizing:border-box; }
.button { float:left; height:32px; display:inline-block; outline:0 none; padding:8px 12px; margin:0; cursor:pointer; border:1px solid; font:bold 9pt/100% Arial, Helvetica, sans-serif; -moz-border-radius:0px 5px 5px 0px; -webkit-border-radius:0px 5px 5px 0px; border-radius:0px 5px 5px 0px; -moz-box-shadow:0px 0px 1px #fff inset; -webkit-box-shadow:0px 0px 1px #fff inset; box-shadow:0px 0px 1px #fff inset; }
.uploader input[type=file] { position:absolute; top:0; right:0; bottom:0; border:0; padding:0; margin:0; height:30px; cursor:pointer; filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0; opacity:0; }
 input[type=button]::-moz-focus-inner {
padding:0;
border:0 none;
-moz-box-sizing:content-box;
}
input[type=button]::-webkit-focus-inner {
padding:0;
border:0 none;
-webkit-box-sizing:content-box;
}
input[type=text]::-moz-focus-inner {
padding:0;
border:0 none;
-moz-box-sizing:content-box;
}
input[type=text]::-webkit-focus-inner {
padding:0;
border:0 none;
-webkit-box-sizing:content-box;
}

/* Blue Color Scheme ------------------------ */

.blue .button { color:#fff; text-shadow:1px 1px 0px #09365f; background:#18b4ed; background:-moz-linear-gradient(top, #3b75b4 0%, #18b4ed 100%); background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #3b75b4), color-stop(100%, #18b4ed)); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3b75b4', endColorstr='#18b4ed', GradientType=0);
border-color:#09365f; }
.blue:hover .button { background:#3b75b4; background:-moz-linear-gradient(top, #18b4ed 0%, #3b75b4 100%); background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #18b4ed), color-stop(100%, #3b75b4)); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#18b4ed', endColorstr='#3b75b4', GradientType=0);
}

</style>
<script type="text/javascript">
    $(function () {

        $('.text-area-star label').click(function () {
            var labelLength = $('.text-area-star label').length;
            for (var i = 0; i < labelLength; i++) {
                if (this == $('.text-area-star label').get(i)) {
                    $('.text-area-star label').eq(i).addClass('red');
                } else {
                    $('.text-area-star label').eq(i).removeClass('red');
                }
            }
        });


    });
</script>

</head>
<body>

<!--header-->
<?php include ("header.php"); ?>

<SCRIPT language="javascript">
function Check()
{
	if (form1.username.value=="")
	{
		alert("请填写您的真实姓名");
		form1.username.focus();
		return false;
	}

	if (form1.xuexiao.value=="")
	{
		alert("请填写您所在学校");
		form1.xuexiao.focus();
		return false;
	}
	if (form1.yuanxi.value=="")
	{
		alert("请填写您所在院系");
		form1.yuanxi.focus();
		return false;
	}
	if (form1.zybj.value=="")
	{
		alert("请填写您所在专业班级");
		form1.zybj.focus();
		return false;
	}
	if (form1.sfz.value=="")
	{
		alert("请填写您的身份证号码");
		form1.sfz.focus();
		return false;
	}
	if (form1.lxfs.value=="")
	{
		alert("请填写您的联系方式");
		form1.lxfs.focus();
		return false;
	}
	if (form1.zjz.value=="")
	{
		alert("请上传您的证件照");
		form1.zjz.focus();
		return false;
	}
}
</SCRIPT>

<div class="wrapper" style=" border:1px #e9e9e9 solid">
    
	<div style="text-align:center; font-size:24px; ">
    <h4><?php if($_GET['id'] == '1') echo "英语四级考试"; if($_GET['id'] == '2') echo "英语六级考试"; ?></h4><br>
    <h4><?php if($_GET['id'] == '1') echo "CET-4"; if($_GET['id'] == '2') echo "CET-6"; ?></h4>
	</div>

    <form id="form1" name="form1" method="post" action="baoming.php?sub=yes&id=<?php echo $_GET['id']?>" class="zcform" enctype="multipart/form-data" onsubmit="return Check();">
        <p class="clearfix">
        	<label class="one" for="username">真实姓名：</label>
        	<input id="username" name="username" class="required" value="<?php echo $row3['username']?>" placeholder="真实姓名" />
        </p>
		
        <p class="clearfix">
        	<label class="one" for="sex">性别：</label>
        	<div class="text-area-star" style="margin-top:-50px; ">
               <label><input type="radio" name="sex" id="sex" value="男生" checked='checked'/><span>男生</span></label>
               <label><input type="radio" name="sex" id="sex" value="女生" /><span>女生</span></label>
        	</div>

        </p>
		
        <p class="clearfix">
        	<label class="one" for="xuexiao">学校：</label>
        	<input id="xuexiao" name="xuexiao" type="text" class="required" value placeholder="学校" />
        </p>
		
        <p class="clearfix">
         	<label class="one"  for="yuanxi">院系：</label>
        	<input id="yuanxi" name="yuanxi" type="text" class="required" value placeholder="院系" />
        </p>
		
        <p class="clearfix">
        	<label class="one" for="zybj">专业班级：</label>
        	<input id="zybj" name="zybj" type="text" class="required" value placeholder="专业班级" />
        </p>
		
        <p class="clearfix">
        	<label class="one" for="sfz">身份证号：</label>
        	<input id="sfz" name="sfz" type="text" class="required" value="<?php echo $row3['sfz']?>" placeholder="身份证号" />
        </p>
		
        <p class="clearfix">
        	<label class="one" for="lxfs">联系方式：</label>
        	<input id="lxfs" name="lxfs" type="text" class="required" value placeholder="联系方式" />
        </p>
		
        <p class="clearfix">
        	<label class="one" for="zjz">证件照：</label>
        	<div class="uploader blue" style="margin-left:115px; margin-top:-90px; ">
            	<input type="text" class="filename" readonly/>
            	<input type="button" class="button" value="上传图片"/>
            	<input type="file" name="upfile" size="30"/>
        	</div>
        </p>

       	<p class="clearfix" style="margin-left:20px; ">
		<input class="submit" type="submit" value="提交报名"/></p>   

    </form>
</div>



<!--footer-->
<?php include ("footer.php"); ?>

</body>
</html>