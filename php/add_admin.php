<meta charset="UTF-8">
<?php
session_start();
$id=$_SESSION['username'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$adid=$_POST['adid'];
$time=$_POST['time'];
$state=$_POST['state'];
$class=$_POST['class'];


include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_name='$id'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password,$cid,$time,$mode,$role)=mysql_fetch_array($result);
if($role==1){
    echo '<script>alert("您没有改权限");</script>';
    header("refresh:2;url=admin_table.php");
}else{
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $sql1="select * from tb_admin where ad_name='$username'";
    $result1=mysql_query($sql1);
//将返回的结果集的每个字段一一对应赋值给变量
    list($name1,$password1,$cid1,$time1,$mode1,$role1)=mysql_fetch_array($result1);
    if($name1==$username){
        echo '<script>alert("该用户已存在");</script>';
        header("refresh:1;url=admin_table.php");
    }else{
        include_once('../function/function.php');
        opensql('localhost','root','woainirr@1314.++','db_lzy');
//准备sql语句
        $sql="insert into tb_admin(ad_name,ad_password,ad_time,ad_mode,ad_role) values('$username','$password','$time','$state','$class')";

        $result=mysql_query($sql);
        if(!$result){
            echo '<script>alert("用户添加失败，请检查SQL语句");</script>';
            header("refresh:1;url=admin_table.php");

        }else{
            echo '<script>alert("用户添加成功");</script>';
            header("refresh:1;url=admin_table.php");
        }

//退出数据库
        mysql_close();
    }

}


?>