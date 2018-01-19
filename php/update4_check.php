<meta charset="utf-8">
<?php
//$id=$_GET['id'];获取修改前的id
$id=$_GET['id'];
//获取修改表单里面的值赋给变量
$ap_name=$_POST['ap_name'];
$ap_no=$_POST['ap_no'];
$ap_begin=$_POST['ap_begin'];
$ap_moneyb=$_POST['ap_moneyb'];
$ap_over=$_POST['ap_over'];
$ap_moneyo=$_POST['ap_moneyo'];
$ap_message=$_POST['ap_message'];
$ap_money=$_POST['ap_money'];
$ap_addtime=$_POST['ap_addtime'];
$ap_add=$_POST['ap_add'];
$ap_mode=$_POST['ap_mode'];

session_start();
$no=$_SESSION['username'];
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_name='$no'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password,$cid,$time,$mode,$role)=mysql_fetch_array($result);
if($role==1){
    echo '<script>alert("您没有改权限");</script>';
    header("refresh:2;url=appiy_table.php");
}else{
    //链接数据库
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $sql = "update  tb_appiy set ap_name='$ap_name',ap_no='$ap_no',ap_begin='$ap_begin',ap_moneyb='$ap_moneyb',ap_over='$ap_over',ap_moneyo='$ap_moneyo',ap_message='$ap_message',ap_money='$ap_money',ap_addtime='$ap_addtime',ap_add='$ap_add',ap_mode='$ap_mode' where ap_no=$id";
//执行mysql语句
    mysql_query($sql);
//退出出数据库

//mysql_affected_rows()返回上一次操作数据库影响的行数
//header('refresh:跳转秒数;url:跳转到的地址')
    if(mysql_affected_rows()>0){
        echo "修改成功";
        header('refresh:2;url=appiy_table.php');
    }else{
        echo "修改失败";
        header('refresh:2;url=appiy_table.php');

    }
    mysql_close();
}


?>