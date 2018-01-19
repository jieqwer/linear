<meta charset="UTF-8">
<?php

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



include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
//准备sql语句
$sql="insert into tb_appiy(ap_name,ap_begin,ap_moneyb,ap_over,ap_moneyo,ap_message,ap_money,ap_addtime,ap_add,ap_mode) values('$ap_name','$ap_begin','$ap_moneyb','$ap_over','$ap_moneyo','$ap_message','$ap_money','$ap_addtime','$ap_add','$ap_mode')";

$result=mysql_query($sql);
if(!$result){
    echo '<script>alert("信息填写失败，请检查SQL语句");</script>';
    header("refresh:1;url=appiy_table.php");

}else{
    echo '<script>alert("信息填写成功");</script>';
    header("refresh:1;url=appiy_table.php");
}

//退出数据库
mysql_close();

?>