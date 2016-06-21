<?php
include ("../conn.php");

$num = 0;
	
//统计英语四级，报考人数	
$sql10="select * from baoming";
$query10=mysql_query($sql10);
while($row10=mysql_fetch_array($query10))
{  		
   $num++;
}
?>

<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.php">管理中心首页</a></h2>
 <ul>

  <li>
   <dl>
    <dt>报名管理</dt>
    <dd><a href="baoming_list.php?id=1">资料列表（<?php echo $num; ?>）</a></dd>
   </dl>
  </li>

  <li>
   <dl>
    <dt>网站设置</dt>
    <dd><a href="setpwd.php">修改密码</a></dd>
    <dd><a href="setting.php">系统设置</a></dd>
   </dl>
  </li>

 </ul>
</aside>