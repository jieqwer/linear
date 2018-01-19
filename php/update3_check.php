<meta charset="utf-8">
<?php
//$id=$_GET['id'];获取修改前的id
session_start();
$id=$_SESSION['username'];

//获取修改表单里面的值赋给变量
$uname=$_POST['uname'];
$sex=$_POST['sex'];
$nation=$_POST['nation'];
$post1=$_POST['post1'];
$school=$_POST['school'];
$schoolname=$_POST['schoolname'];
$sheng=$_POST['sheng'];
$major=$_POST['major'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
$location=$_POST['location'];
$work=$_POST['work'];
$fam=$_POST['fam'];
$famtel=$_POST['famtel'];
$mail=$_POST['mail'];
$postal=$_POST['postal'];
$sname=$_POST['sname'];
$stel=$_POST['stel'];
$password=md5($_POST['password']);
$meid=$_POST['meid'];
$ap_no=$_POST['ap_no'];
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_name='$id'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password1,$cid,$time,$mode,$role)=mysql_fetch_array($result);
if($role==1){
    echo '<script>alert("您没有改权限");</script>';
    header("refresh:2;url=message_table.php");
}else{
    $cid=$_GET['cid'];
    //链接数据库
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $sql = "update  tb_message  set password='$password',ap_no='$ap_no', me_name='$uname',me_sex='$sex',me_family='$nation',me_political='$post1',me_city='$school',me_school='$schoolname',me_scurce='$sheng',me_major='$major',me_tel='$tel',me_qq='$qq',me_place='$location',me_work='$work',me_pname='$fam',me_ptel='$famtel',me_site='$mail',me_podtcode='$postal',me_recipients='$sname',me_retel='$stel' where me_number='$cid'";
//执行mysql语句
    mysql_query($sql);
mysql_affected_rows();//返回上一次操作数据库影响的行数
//header('refresh:跳转秒数;url:跳转到的地址')
 if(mysql_affected_rows()>0){
        echo "修改成功";
        header("refresh:2;url=message_table.php");
    }else{
        echo "修改失败";
  header("refresh:2;url=message_table.php");

    }

//退出出数据库
    mysql_close();
}


?>