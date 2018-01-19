<?php
$bid=$_POST['bid'];
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_appiy where ap_no=$bid";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$jsonSts=json_encode($arr);
echo $jsonSts;


?>


