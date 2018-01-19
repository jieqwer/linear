<meta charset="utf-8">
<?php
session_start();
$id=$_SESSION['username'];
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_name='$id'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password,$cid,$time,$mode,$role)=mysql_fetch_array($result);
if($role==1){
    echo '<script>alert("您没有改权限");</script>';
    header("refresh:2;url=message_table.php");
}else{
    $cid=$_GET['cid'];
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $sql="delete from tb_message where me_number='$cid'";
    mysql_query($sql);
    $num=mysql_affected_rows();
    if($num>0){
        echo "删除成功";
        header("refresh:2;url=message_table.php");
    }else{
        echo "删除失败";
        header("refresh:2;url=message_table.php");

    }
}


?>