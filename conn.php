<?php
$conn=@mysql_connect("localhost","root","f122f69121") or die ("链接错误");
mysql_select_db("baoming2",$conn);
mysql_query("set names 'utf8'");
@session_start();
?>