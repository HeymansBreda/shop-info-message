<?php
error_reporting(0);
include ("conn.php");

if($_GET['sub'] == "yes")
{
	
	if($_POST['tt'] == '')
	{
		
        echo "<script language=\"JavaScript\">alert(\"请输入需要查询的信息~\");history.go(-1);\r\n</script>"; 
        exit;
		
	}
	
	if($_POST['typeid'] == 1)
	{
		
       //搜索模糊查询
       $sql2="select * from baoming where tel like '%" .$_POST['tt']. "%'";
       $query2=mysql_query($sql2);	

	}

	if($_POST['typeid'] == 2)
	{
		
       //搜索模糊查询
       $sql2="select * from baoming where sfzhm like '%" .$_POST['tt']. "%'";
       $query2=mysql_query($sql2);	

	}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content=""> 
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0"> 
<meta name="apple-mobile-web-app-capable" content="yes"> 
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="format-detection" content="telephone=no">
<title>办卡进度查询</title>
<link rel="stylesheet" href="css/stylesearch.css" />
<style>
.ui-form-item input, .ui-form-item textarea{ margin-top:1.2rem;}
.ui-select select{ margin-top:1.2rem;}
.ui-select::after{ margin-top:4px!important;}

.ui-form-item label{ width:135px!important;}
.ui-form-item input, .ui-form-item textarea{padding-left:135px!important;}

.show_list { display:none; width:100%; padding-top:20px; }
.show_list {
    margin-top: 10px;
    float: left;
    width: 100%;
    border-top-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-left-style: solid;
    border-top-color: #EBEBEB;
    border-left-color: #EBEBEB;
}


</style>
<link rel="stylesheet" href="css/main.c93870fe.css">
</head>
<body>

<div class="ui-wrap">
  <div class="ui-view ng-scope" ng-view="">
    <header id="header" class="ng-scope"> 
	  <a href="index.php" class="ui-back"></a> 
	  <div class="ui-title">办卡进度查询</div> 
	</header> 
	
	<section class="ui-identify ng-scope"> 
	  <section class="ui-identify-progress-box ui-border-b" style=" padding:0;"> 
		<div class="gg1">
		  <table cellpadding="0" cellspacing="0">
            <tr>
			  <td>
			    <a href=''><img src='images/jindu.jpg' border='0' /></a>
			  </td>
			</tr>
		  </table>
		</div>
	  </section>  
	</section> 
	
	<section class="ui-identify ng-scope"> 
      <form method="post" action="search.php?sub=yes" name="search">  
        <div class="ui-form"> 
		  <div ng-click="selectDegree()" class="ui-form-item ui-border-tb"> 
		    <label for="#">证件类型</label> 
			<div class="ui-select-group"> 
			  <div class="ui-select">
			    <select style="color:#BEBEBE" class="ng-pristine ng-untouched ng-valid ng-scope" name="typeid">
			      <option value="1">手机号码</option>
			      <option value="2">身份证号码</option>
			    </select>
              </div> 
            </div> 
		  </div> 
		  <div class="ui-form-item ui-border-tb"> 
		    <label for=""> 证件号码 </label> 
			<input name="tt" type="text" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength" id="tt" maxlength="18" />
			<a class="ui-icon-close hide" href="#"></a> 
	      </div> 
        </div> 
	    <div class="ui-btn-wrap">
	      <input type="submit" value="提交" class="ui-btn-lg ui-btn-primary ng-hide" style=" width:100%;" onclick="checkLength();" />
	    </div> 
	  </form>
	</section> 

	
<div class="show_list" style="<?php if($_GET['sub'] == 'yes') echo "display:block"; ?>">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
		  
<?php 

	if($query2 == '')
	{
		echo "<tr><td height='40' align='center'>请输入正确的查询信息</tr></td>"; exit;
	}

?>
		  
		  <tr>
            <td height="40" align="center" valign="middle" class="title_bg">真实姓名</td>
            <td height="40" align="center" valign="middle" class="title_bg">手机号码</td>
            <td height="40" align="center" valign="middle" class="title_bg">身份证号码</td>
            <td height="40" align="center" valign="middle" class="title_bg">当前状态</td>
          </tr>
<?php

while($row2=mysql_fetch_array($query2))
{
?>
<tr>
<td height="40" align="center"><?php echo $row2['xingming']?></td>
<td height="40" align="center"><?php echo $row2['tel']?></td>
<td height="40" align="center"><?php echo $row2['sfzhm']?></td>
<td height="40" align="center"><?php if($row2['sta'] == 1) echo "成功"; else echo "未成功"; ?></td>
</tr>
		  
<?php
}
?>

        </tbody></table>
    </div>
	
	
	
	
	
  </div> 
</div>



<script type="text/javascript">
function checkLength(){

var password=document.getElementById("sfzh"); //获取密码框值

if(password.value.length<18){

 alert("身份证号码必须为18位!");
 
  document.location.href="search.php";

}
}


</script> 



</body>
</html>
