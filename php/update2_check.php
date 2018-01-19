<meta charset="utf-8">
<?php
//$id=$_GET['id'];获取修改前的id
session_start();
$id=$_SESSION['username'];

//获取修改表单里面的值赋给变量
$username1=$_POST['username1'];
$password=md5($_POST['password']);
$adid=$_POST['adid'];
$time1=$_POST['time1'];
$state=$_POST['state'];
$class=$_POST['class'];

include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_name='$id'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password1,$cid,$time,$mode,$role)=mysql_fetch_array($result);
if($role==1){
    echo '<script>alert("您没有改权限");</script>';
    header("refresh:2;url=admin_table.php");
}else{
    //链接数据库
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $cid=$_GET['cid'];
    $sql="update  tb_admin set ad_name='$username1',ad_password='$password',ad_time='$time1',ad_mode='$state',ad_role='$class' where ad_id=$cid";
//执行mysql语句

    mysql_query($sql);
 if(mysql_affected_rows()>0){
        echo "修改成功";
   header("refresh:2;url=admin_table.php");
    }else{
        echo "修改失败";
  header("refresh:2;url=admin_table.php");

    }

    mysql_close();
}



?>