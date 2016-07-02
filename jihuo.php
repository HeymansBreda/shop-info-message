<?php
@session_start();
include ("conn.php");
error_reporting(0);
$sql="select * from syetem";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);




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

    if (!is_uploaded_file($_FILES["upfile1"][tmp_name]))
    //是否存在文件
    {
         echo "<script language=\"JavaScript\">alert(\"请上传身份证正面照~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	

    if (!is_uploaded_file($_FILES["upfile2"][tmp_name]))
    //是否存在文件
    {
         echo "<script language=\"JavaScript\">alert(\"请上传储蓄卡正面照~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	

    if (!is_uploaded_file($_FILES["upfile3"][tmp_name]))
    //是否存在文件
    {
         echo "<script language=\"JavaScript\">alert(\"请上传手持身份证照~\");history.go(-1);\r\n</script>"; 
         exit;
    }

	
	
	
	
	
    if ($_POST["xingming"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请填写您的真实姓名~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["sfzhm"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请填写身份证号码~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["jycd"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请选择您的教育程度~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["hyzk"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请选择婚姻状况~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["ysr"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请选择您的月收入~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["province3"] == '' || $_POST["city3"] == '' || $_POST["area3"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请选择您的收货地址~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["address"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请填写您的详细地址~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["zylb"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请选择您的职业~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
    if ($_POST["tel"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请填写您的手机号码~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	/*
    if ($_POST["tjrkh"] == '')
    {
         echo "<script language=\"JavaScript\">alert(\"请填写推荐人信息~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	*/
    if ($_POST["danxuan"] <> 1)
    {
         echo "<script language=\"JavaScript\">alert(\"请同意协议~\");history.go(-1);\r\n</script>"; 
         exit;
    }
	
	
    $file1 = $_FILES["upfile1"];
    if($max_file_size < $file1["size"])
    //检查文件大小
    {
        echo "<script language=\"JavaScript\">alert(\"文件太大~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!in_array($file1["type"], $uptypes))
    //检查文件类型
    {
        echo "<script language=\"JavaScript\">alert(\"文件类型不符~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	
	
	
	
    $file2 = $_FILES["upfile2"];
    if($max_file_size < $file2["size"])
    //检查文件大小
    {
        echo "<script language=\"JavaScript\">alert(\"文件太大~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!in_array($file2["type"], $uptypes))
    //检查文件类型
    {
        echo "<script language=\"JavaScript\">alert(\"文件类型不符~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	
	
	
	
    $file3 = $_FILES["upfile3"];
    if($max_file_size < $file2["size"])
    //检查文件大小
    {
        echo "<script language=\"JavaScript\">alert(\"文件太大~\");history.go(-1);\r\n</script>"; 
        exit;
    }

    if(!in_array($file2["type"], $uptypes))
    //检查文件类型
    {
        echo "<script language=\"JavaScript\">alert(\"文件类型不符~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	
	
	

    if(!file_exists($destination_folder))
    {
        mkdir($destination_folder);
    }

	
	
	
	
	
    $filename1=$file1["tmp_name"];
    $image_size = getimagesize($filename1);
    $pinfo1=pathinfo($file1["name"]);
    $ftype1=$pinfo1['extension'];
    $destination1 = $destination_folder.time()."-1.".$ftype1;
	
	
	
	
    $filename2=$file2["tmp_name"];
    $image_size = getimagesize($filename2);
    $pinfo2=pathinfo($file2["name"]);
    $ftype2=$pinfo2['extension'];
    $destination2 = $destination_folder.time()."-2.".$ftype2;
	
	
	
	
    $filename3=$file3["tmp_name"];
    $image_size = getimagesize($filename3);
    $pinfo3=pathinfo($file3["name"]);
    $ftype3=$pinfo3['extension'];
    $destination3 = $destination_folder.time()."-3.".$ftype3;
	
	
	
	
	
    if (file_exists($destination1) && $overwrite != true)
    {
        echo "<script language=\"JavaScript\">alert(\"同名文件已经存在了~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
    if(!move_uploaded_file ($filename1, $destination1))
    {
        echo "<script language=\"JavaScript\">alert(\"移动文件出错~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	

	
    if (file_exists($destination2) && $overwrite != true)
    {
        echo "<script language=\"JavaScript\">alert(\"同名文件已经存在了~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
    if(!move_uploaded_file ($filename2, $destination2))
    {
        echo "<script language=\"JavaScript\">alert(\"移动文件出错~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	
	
    if (file_exists($destination3) && $overwrite != true)
    {
        echo "<script language=\"JavaScript\">alert(\"同名文件已经存在了~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
    if(!move_uploaded_file ($filename3, $destination3))
    {
        echo "<script language=\"JavaScript\">alert(\"移动文件出错~\");history.go(-1);\r\n</script>"; 
        exit;
    }
	
	
	

   $pinfo1=pathinfo($destination1);
   $fname1=$pinfo1[basename];
   
   $pinfo2=pathinfo($destination2);
   $fname2=$pinfo2[basename];
   
   $pinfo3=pathinfo($destination3);
   $fname3=$pinfo3[basename];
   

   $xingming=$_POST['xingming'];
   $sfzhm=$_POST['sfzhm'];
   $jycd=$_POST['jycd'];
   $hyzk=$_POST['hyzk'];
   $ysr=$_POST['ysr'];
   $province3=$_POST['province3'];
   $city3=$_POST['city3'];
   $area3=$_POST['area3'];
   $address=$_POST['address'];
   $zylb=$_POST['zylb'];
   $tel=$_POST['tel'];
   $tjrkh=$_POST['tjrkh'];


   $sql="INSERT INTO `baoming`(`sfz_img` ,`cxk_img` ,`scsfz_img` ,`xingming` ,`sfzhm` ,`jycd` ,`hyzk`,`ysr`,`province3`,`city3`,`area3`,`address`,`zylb`,`tel`,`tjrkh` ,`sta` ,`posttime`) VALUES ('".$fname1."','".$fname2."','".$fname3."','".$xingming."','".$sfzhm."','".$jycd."','".$hyzk."','".$ysr."','".$province3."','".$city3."','".$area3."','".$address."','".$zylb."','".$tel."','".$tjrkh."','0',now())";

   if(mysql_query($sql)) echo "<script language=\"JavaScript\">alert(\"恭喜！您的报名信息提交成功！~\");window.location.href='search.php';</script>"; 
   else echo "执行SQL失败:$sql2<BR>错误:".mysql_error();
 }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="迅发网络" />
<meta charset="utf-8" />
<title>首页 - <?php echo $row['title'] ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta name="description" content=""> 
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0"> 
<meta name="apple-mobile-web-app-capable" content="yes"> 
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="format-detection" content="telephone=no">

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/shopping_flow.js"></script>
<script type="text/javascript" src="js/transport.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/TouchSlide.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/ectouch.js"></script>
</head>

<body>

<div class="blank3"></div>
<div class="wrap"> 
   
    <section class="order_box padd1 radius10" style="padding-top:0;padding-bottom:0;">
    <div class="table_box2 table_box">
   
<style>
.ui-form-item input, .ui-form-item textarea{margin-top:1.2rem;}
.ui-select select{margin-top:1.2rem;}
.ui-select::after{margin-top:4px!important;}
</style>
<link rel="stylesheet" href="css/main.c93870fe.css">

<div class="ui-wrap">
  <div class="ui-view ng-scope" ng-view="">
    <header id="header" class="ng-scope"> 
	  <a href="#" class="ui-back"></a> 
	  <div class="ui-title">资料提交</div> 
	  <a href="tel:<?php echo $row['tel'] ?>" class="ui-myCenter"><img src="images/kf.png" style=" height:3rem; margin-top:0.5rem;"></a> 
	</header> 
	
	
	
	
	
	
    <form  method="post" action="index.php?sub=yes" class="zcform" enctype="multipart/form-data" name="theForm" id="theForm" onSubmit="return checkConsignee(this)">
	
	<section class="ui-identify ng-scope"> 
	  <section class="ui-identify-progress-box ui-border-b" style=" padding:0;"> 
		<div class="gg1"><table cellpadding="0" cellspacing="0">
<tr><td><a href='#' target='_blank'><img src='images/1458346651095514939.jpg' width='1024' height='212' border='0' /></a></td></tr>
</table></div>
	  </section> 
	  <div class="ui-identify-tip" style=" padding:10px 10px 0 1rem;"> <img src="images/th.jpg" style=" height:2rem; float:left; margin-right:0.5rem;"> 请您填写真实信息以便顺利获取额度 <a href="search.php">查询</a></div> 
	   
	  <div class="ui-upload"> 
	    <ul id="ui-upload-img" class="ui-grid-trisect"> 
		
		  <li onclick="ma.style.display='block'"> 
		    <div id="pic1_show" ng-click="showPrompt('front')" class="ui-grid-trisect-img ui-upload-front ui-border-radius"> 
			  <i class="iconfont idback" style=" width:6rem;margin-left:-3rem;"><img src="images/sfzz.jpg" style=" width:100%; height:auto;"></i> 
			  <span style="background-image:url()" id="idCard-front"></span> 
			  <div ng-show="!UserInfo.identityNo" class="ui-upload-tip">请拍摄<span>身份证正面</span></div> 
			</div> 
			<div class="idCard-info ng-binding"></div> 
		  </li> 
		  
		  <li onclick="mb.style.display='block'"> 
		    <div id="pic2_show" ng-click="showPrompt('back')" class="ui-grid-trisect-img ui-upload-back ui-border-radius"> 
			  <i class="iconfont idback" style=" width:6rem;margin-left:-3rem;"><img src="images/sfzf.jpg" style=" width:100%; height:auto;"></i>
			  <span style="background-image:url()" id="idCard-back"></span> 
			  <div ng-show="!UserInfo.identityExpires" class="ui-upload-tip">请拍摄<span>储蓄卡正面</span></div> 
			</div> 
		  </li> 
		</ul> 
		<ul ng-click="showPrompt('similarity_person')" id="ui-upload-holder" class="ui-grid-trisect"> 
		  <li style="overflow:hidden" onclick="mc.style.display='block'"> 
		    <div id="pic3_show" class="ui-grid-trisect-img ui-upload-holdimg"> 
			  <i class="iconfont idheld" style=" width:4rem;margin-left:-2rem;"><img src="images/scsfz.jpg" style=" width:100%; height:auto;"></i> 
			  <span style="background-image:url()" id="idCard-hold"></span> 
			  <div ng-show="UserInfo.personFlag !='1'" class="ui-upload-tip">请拍摄<span>手持身份证照</span></div> 
		    </div> 
		  </li> 
		</ul> 
	  </div> 
	   
	  <div class="ui-form"> 

		  <div class="ui-form-item ui-border-tb"> 
		    <label for=""> 真实姓名 </label> 
			<input name="xingming" type="text" id="consignee_0" placeholder="请填写真实姓名" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" />
			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 
		  <div class="ui-form-item ui-border-tb"> 
		    <label for=""> 身份证号码 </label> 
			<input name="sfzhm" type="text" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" id="sfzh" placeholder="请填写身份证号码" maxlength="18"  />
			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 
		  <div ng-click="selectDegree()" class="ui-form-item ui-border-b"> 
		    <label for="#">教育程度</label> 
			<div class="ui-select-group"> 
			  <div class="ui-select">
			<select name="jycd" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">
			<option>请选择学历</option>
<option value="硕士及以上">硕士及以上</option>
<option value="本科">本科</option>
<option value="大专">大专</option>
<option value="大专以下">大专以下</option>
</select>
</div> 
</div> 
		  </div> 
		  <div ng-click="selectMar()" class="ui-form-item ui-border-b text-right"> 
		    <label for="#">婚姻状况</label> 
			<div class="ui-select-group"> 
			  <div class="ui-select">
			<select name="hyzk" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">
			<option>请选择你的婚姻状况</option>
<option value="已婚">已婚</option>
<option value="未婚">未婚</option>
<option value="离异">离异</option>
<option value="其他">其他</option>
</select>
</div> 
</div> 
		  </div> 
		  <div ng-click="selectMonthlyIncome()" class="ui-form-item ui-border-b text-right"> 
		    <label for="#">月收入</label> 
			<div class="ui-select-group"> 
			  <div class="ui-select">
			<select name="ysr" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">
			<option>请选择月收入</option>
<option value="3000以下">3000以下</option>
<option value="3000~5000">3000~5000</option>
<option value="5001~8000">5001~8000</option>
<option value="8001~12000">8001~12000</option>
<option value="12001~15000">12001~15000</option>
<option value="15001~20000">15001~20000</option>
<option value="20000以上">20000以上</option>
</select>
</div> 
</div> 

		  </div> 
		  <div class="ui-form-item ui-border-b"> 
		    <label>现住址</label> 
			<div class="ui-select-group"> 
			  <div class="ui-select" style=" display:none;">
 
			  <select class="ng-pristine ng-untouched ng-valid ng-scope" style="color:#BEBEBE" onchange="region.changed(this, 1, 'selProvinces_0')" id="selCountries_0" name="country">
			  <option selected="" value="1">中国</option>
			  <option value="0">请选择国家</option>   
              </select>

			  </div> 
  
			  <div class="ui-select" style=" width:30%;">
				<select name="province3" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">

              </select>
			  </div> 
			  <div class="ui-select" style=" width:30%;">
				<select name="city3" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">
        <option value="0">请选择市</option>
              </select>
			  </div>
			  <div class="ui-select" style=" width:30%;">
				<select name="area3" id="selDistricts_0"style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope" >
        <option value="0">请选择区</option>
              </select>
			  </div>
			</div> 
		  </div> 
		  <style>#selDistricts_0{display:block!important;}</style>
		  <div class="ui-form-item ui-border-tb"> 
		    <label for=""> 详细地址 </label> 
			<input name="address" type="text" id="address_0" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" placeholder="请填写详细地址"/>
			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 
		  <div ng-click="selectJob()" class="ui-form-item ui-border-b text-right"> 
		    <label for="#">职业类别</label> 
<div class="ui-select-group"> 
			  <div class="ui-select">
			<select name="zylb" style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope">
			<option>请选择职业</option>
<option value="企业老板">企业老板</option>
<option value="私营业主">私营业主</option>
<option value="上班族">上班族</option>
<option value="其他">其他</option>
</select>
</div> 
</div> 

		  </div> 


		  <div class="ui-form-item ui-border-tb"> 
		    <label for=""> 手机号码 </label> 
			<input name="tel" type="text" id="tel_0" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" maxlength="11" placeholder="请填写手机号码，不支持17号码" />

			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 
		  <div class="ui-form-item ui-border-tb"> 
		    <label for="" style=" width:140px;"> 推荐人卡号 </label> 
			<input name="tjrkh" type="text" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" placeholder="推荐人卡号&nbsp;" style=" padding-left:140px;" />

			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 

	  </div> 
	  <p class="ui-identify-procotol"> 
	    <label class="ui-checkbox-s"> 
		  <input type="checkbox" ng-model="agreeFlag" name="danxuan" class="ng-pristine ng-untouched ng-valid" value="1" >
		</label>
		同意并签署<a href="#" target="_blank" class="ui-protocol">《中国银通卡》</a> 
	  </p> 
	  <div class="ui-btn-wrap"> 
		
		
<input type="submit" name="Submit" value="下一步" onclick="checkLength();" style="float:none" class="ui-btn-lg ui-btn-primary ng-hide" style=" width:100%;" />

	  </div> 

	</section> 
	 
	 
	 
	 
	 

	<div class="ui-dialog upIdCard ng-scope" id="ma"> 
	  <div class="ui-dialog-cnt" style=" position:absolute; left:50%; margin-left:-135px; top:10%;"> 
	    <div class="ui-dialog-bd"> 
	      <h4 class="yellow-text font-weight font16">温馨提示</h4> 
		  <div>请按以下事例拍摄身份证照片，请保持身份证号清晰，且完整可见（若本人操作，请使用前置摄像头）</div> 
		  <img ng-show="UserInfo.operateType == 'front'" style="width:60%;margin:10px auto; display:block" src="images/id_positive_iphone.954c5c68.png" class="ng-hide"> 
		</div> 
		<div class="ui-dialog-ft"> 
		  <a style="display:block; position:relative; width:100%; height:42px;">
		  <input type="file" data-id="pic1" class="imgchange" accept="image/*" capture="camera" onclick="ma.style.display='none'" style="position: absolute;font-size: 100px;right: 0;top: 0;opacity: 0;filter: alpha(opacity=0);cursor: pointer" name="upfile1" />
		  <input name="pic1" id="pic1" type="hidden" />
		  <button style=" padding-top:0.8rem;">确定</button> </a>
		</div> 
	  </div> 
	</div> 
	 
	 
	<div class="ui-dialog upIdCard ng-scope" id="mb"> 
	  <div class="ui-dialog-cnt" style=" position:absolute; left:50%; margin-left:-135px; top:10%;"> 
	    <div class="ui-dialog-bd"> 
	      <h4 class="yellow-text font-weight font16">温馨提示</h4> 
		  <div>请按以下事例拍摄储蓄卡照片，请保持储蓄卡清晰，且完整可见（若本人操作，请使用前置摄像头）</div> 
		  <img ng-show="UserInfo.operateType == 'back'" style="width:60%;margin:10px auto; display:block" src="images/id_back_iphone.da902de8.png" class="ng-hide"> 
		</div> 
		<div class="ui-dialog-ft"> 
		  <a style="display:block; position:relative; width:100%; height:42px;">
		  <input data-id="pic2" class="imgchange" type="file"  accept="image/*" capture="camera" onclick="mb.style.display='none'" style="position: absolute;font-size: 100px;right: 0;top: 0;opacity: 0;filter: alpha(opacity=0);cursor: pointer" name="upfile2" />
		  <input name="pic2" id="pic2" type="hidden" />
		  <button style=" padding-top:0.8rem;">确定</button> </a>
		</div> 
	  </div> 
	</div> 
	 
	 
	<div class="ui-dialog upIdCard ng-scope" id="mc"> 
	  <div class="ui-dialog-cnt" style=" position:absolute; left:50%; margin-left:-135px; top:10%;"> 
	    <div class="ui-dialog-bd"> 
	      <h4 class="yellow-text font-weight font16">温馨提示</h4> 
		  <div>请按以下事例拍摄手持身份证照片，请保持身份证号清晰，且完整可见（若本人操作，请使用前置摄像头）</div> 
		  <img ng-show="UserInfo.operateType == 'similarity_person'" style="width:60%;margin:10px auto; display:block" src="images/id_lige.e3d5e17c.png" class="ng-hide"> 
		</div> 
		<div class="ui-dialog-ft"> 
		  <a style="display:block; position:relative; width:100%; height:42px;">
		  <input data-id="pic3" class="imgchange" type="file"  accept="image/*" capture="camera" onclick="mc.style.display='none'" style="position: absolute;font-size: 100px;right: 0;top: 0;opacity: 0;filter: alpha(opacity=0);cursor: pointer" name="upfile3"/>
		  <input name="pic3" id="pic3" type="hidden" />
		  <button style=" padding-top:0.8rem;">确定</button> </a>
		</div> 
	  </div> 
	</div> 
	</form> 
	
	
	
	
  </div> 
</div>

<style>
#pic1_show img{width:100%!important; height:100%;}
#pic2_show img{width:100%!important; height:100%;}
#pic3_show img{width:100%!important; height:100%;}
</style>
<!--
<div id="bg"></div>
<div id="show" class="h5-1yyg-v1">
    <div id="divPayBox" class="paymainbox">
        <div class="loading"><b></b></div>
    </div>
</div>
-->
<script language="javascript" type="text/javascript">
function showdiv() {
    document.getElementById("bg").style.display ="block";
    document.getElementById("show").style.display ="block";
}
function hidediv() {
    document.getElementById("bg").style.display ='none';
    document.getElementById("show").style.display ='none';
}
</script>
<style type="text/css">
#bg{display: none;  position: absolute;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background-color: #f4f4f4;  z-index:1001;  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);}
#show{display: none;  position: absolute;  top: 40%;  left: 22%;  width: 53%;  height: 49%;  padding: 8px;  z-index:1002;  overflow: auto;}
.loading {
    clear: both;
    width: 100%;
    display: block;
    height: 90px;
    line-height: 40px;
    text-align: center;
    color: #999;
    font-size: 45px;
    box-shadow:none;
    background: none;
}

.loading b {
    background: url(data:image/gif;base64,R0lGODlhEAAQAPIAAP///wCA/8Lg/kKg/gCA/2Kw/oLA/pLI/iH/C05FVFNDQVBFMi4wAwEAAAAh/h1CdWlsdCB3aXRoIEdJRiBNb3ZpZSBHZWFyIDQuMAAh/hVNYWRlIGJ5IEFqYXhMb2FkLmluZm8AIfkECQoAAAAsAAAAABAAEAAAAzMIutz+MMpJaxNjCDoIGZwHTphmCUWxMcK6FJnBti5gxMJx0C1bGDndpgc5GAwHSmvnSAAAIfkECQoAAAAsAAAAABAAEAAAAzQIutz+TowhIBuEDLuw5opEcUJRVGAxGSBgTEVbGqh8HLV13+1hGAeAINcY4oZDGbIlJCoSACH5BAkKAAAALAAAAAAQABAAAAM2CLoyIyvKQciQzJRWLwaFYxwO9BlO8UlCYZircBzwCsyzvRzGqCsCWe0X/AGDww8yqWQan78EACH5BAkKAAAALAAAAAAQABAAAAMzCLpiJSvKMoaR7JxWX4WLpgmFIQwEMUSHYRwRqkaCsNEfA2JSXfM9HzA4LBqPyKRyOUwAACH5BAkKAAAALAAAAAAQABAAAAMyCLpyJytK52QU8BjzTIEMJnbDYFxiVJSFhLkeaFlCKc/KQBADHuk8H8MmLBqPyKRSkgAAIfkECQoAAAAsAAAAABAAEAAAAzMIuiDCkDkX43TnvNqeMBnHHOAhLkK2ncpXrKIxDAYLFHNhu7A195UBgTCwCYm7n20pSgAAIfkECQoAAAAsAAAAABAAEAAAAzIIutz+8AkR2ZxVXZoB7tpxcJVgiN1hnN00loVBRsUwFJBgm7YBDQTCQBCbMYDC1s6RAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P4wykmrZULUnCnXHggIwyCOx3EOBDEwqcqwrlAYwmEYB1bapQIgdWIYgp5bEZAAADsAAAAAAAAAAAA=);
    background-size: 35px auto;
    background-repeat: no-repeat;
    width: 40px;
    height: 40px;
    display: inline-block;
    margin-right: 5px;
    position: relative;
    top: 2px;
}

.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
</style>
<script type="text/javascript">
(function($) {
	$.fn.extend({
		aiiUpload: function(obj) {
			if (typeof obj != "object") {
				alert('参数错误');
				return;
			}
			var imageWidth, imageHeight;
			var base64;
			var file_num = 0;
			var fileInput = $(this);
			var fileInputId = fileInput.attr('id');
			createDoc('#' + fileInputId);
			$('.imgchange').change(function() {
				var oo = $(this).attr('data-id');
				if (test(this.value) == false) {
					alert('格式错误');
					return;
				}
				var objUrl = getObjectURL(this.files[0]);
				if (objUrl) {
					render(objUrl, obj.max_h, obj.max_w, file_num, oo);
					file_num++;
				}
			});
		}
	});

	function createDoc(objID) {
		var element = $(objID);
		element.append('<canvas id="canvas_pic1" style="display:none;"></canvas>');
		element.append('<canvas id="canvas_pic2" style="display:none;"></canvas>');
		element.append('<canvas id="canvas_pic3" style="display:none;"></canvas>');
	}

	function test(value) {
		var regexp = new RegExp("(.JPEG|.jpeg|.JPG|.jpg|.GIF|.gif|.BMP|.bmp|.PNG|.png)$", 'g');
		return regexp.test(value);
	}

	function render(src, MaximgW, MaximgH, idnum, oo) {
		var image = new Image();
		image.onload = function() {
			var canvas = document.getElementById('canvas_'+oo);
			if (image.width > image.height) {
				imageWidth = MaximgW;
				imageHeight = MaximgH * (image.height / image.width);
			} else if (image.width < image.height) {
				imageHeight = MaximgH;
				imageWidth = MaximgW * (image.width / image.height);
			} else {
				imageWidth = MaximgW;
				imageHeight = MaximgH;
			}
			canvas.width = imageWidth;
			canvas.height = imageHeight;
			var con = canvas.getContext('2d');
			con.clearRect(0, 0, canvas.width, canvas.height);
			con.drawImage(image, 0, 0, imageWidth, imageHeight);
			base64 = canvas.toDataURL();
			var html = "<img src='"+base64+"' style='width:"+window.screen.availWidth*0.45+"px;'>";
			$("#"+oo+"_show").html(html);
			showdiv();
			/*
			$.post("file.php", {
				img: base64
			}, function(data) {
				hidediv();
				if (data == 0) {
					alert("上传失败！");
				}else{
					$("#"+oo).val(data);
				}
			});
			*/
		}
		image.src = src;
		
		document.getElementById("upfile1").value=src;
		document.getElementById("upfile2").value=src;
		document.getElementById("upfile3").value=src;
		
	};

	function getObjectURL(file) {
		var url = null;
		if (window.createObjectURL != undefined) { // basic
			url = window.createObjectURL(file);
		} else if (window.URL != undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file);
		} else if (window.webkitURL != undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file);
		}
		return url;
	}

})(jQuery);
</script>

<div id="box"></div>
<script type="text/javascript">
$('#box').aiiUpload({
	max_h:1000,
	max_w:1000
});
</script>




    </div>
  </section>
  <div class="blank3"></div>
   
  
</div>

 


 





  

<div class="blank3"></div>
<div style="width:1px; height:1px; overflow:hidden"><a href="http://www.ecshop.com" target="_blank" style=" font-family:Verdana; font-size:11px;">Powered&nbsp;by&nbsp;<strong><span style="color: #3366FF">ECShop</span>&nbsp;<span style="color: #FF9966">v2.7.3</span></strong></a>&nbsp;</div>
</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "用户名不能为空。";
var username_shorter = "用户名长度不能少于 3 个字符。";
var username_invalid = "用户名只能是由字母数字以及下划线组成。";
var password_empty = "登录密码不能为空。";
var password_shorter = "登录密码不能少于 6 个字符。";
var confirm_password_invalid = "两次输入密码不一致";
var email_empty = "Email 为空";
var email_invalid = "Email 不是合法的地址";
var agreement = "您没有接受协议";
var msn_invalid = "msn地址不是一个有效的邮件地址";
var qq_invalid = "QQ号码不是一个有效的号码";
var home_phone_invalid = "家庭电话不是一个有效号码";
var office_phone_invalid = "办公电话不是一个有效号码";
var mobile_phone_invalid = "手机号码不是一个有效号码";
var msg_un_blank = "* 用户名不能为空";
var msg_un_length = "* 用户名最长不得超过7个汉字";
var msg_un_format = "* 用户名含有非法字符";
var msg_un_registered = "* 用户名已经存在,请重新输入";
var msg_can_rg = "* 可以注册";
var msg_email_blank = "* 邮件地址不能为空";
var msg_email_registered = "* 邮箱已存在,请重新输入";
var msg_email_format = "* 邮件地址不合法";
var msg_blank = "不能为空";
var no_select_question = "您没有完成密码提示问题的操作";
var passwd_balnk = "密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script>

<script type="text/javascript" src="js/PCASClass.js"></script>
<script language="javascript" defer>
new PCAS("province3","city3","area3");
</script>

</html>
