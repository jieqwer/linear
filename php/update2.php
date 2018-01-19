<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/admin_top.css">
    <link rel="stylesheet" type="text/css" href="../style/admin_left.css">
    <link rel="icon"  href="../img/guan%20(2).ico">

</head>


<body>
<?php

include_once("admin.php");




include_once('../function/function.php');
//点击表里的修改，获取到此条数据的cid
$cid=$_GET['cid'];


opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_admin where ad_id=".$cid;
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($name,$password,$cid,$time,$mode,$role)=mysql_fetch_array($result);
mysql_close();
?>

<div class="righttable">
<div id="div1" style="background:rgba(0,0,0,.3);width: 800px;height: 500px;position: absolute;top:40%;left:45%;
    margin-left:-400px;margin-top:-250px;">
    <img src="../img/tianxie.png" id="img">

    <form action="update2_check.php?cid=<?php echo $cid ?>" method="post">
        <table width="700" height="400" style="margin: 20px auto;color: white">
            <tr><td><label for="username">用 户 名 ：</label><input type="text" id="username" name="username1" value="<?php echo  $name?>"></td><td>用户名为字母加数字</td></tr>
            <tr><td><label for="password">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label><input type="password" id="password" value="<?php echo  $password?>" name="password"></td><td>密码为字母符号加数字</td></tr>
            <tr><td><label for="adid">管&nbsp;理&nbsp;ID：</label><input type="text" id="adid" name="adid" value="<?php echo  $cid?>"></td><td>可不填</td></tr>
            <tr><td><label for="time">添加时间 :</label><input type="text" id="time" name="time1" value="<?php echo  $time?>"></td><td>选填</td></tr>
            <tr><td><label for="state">状 &nbsp;&nbsp;&nbsp;&nbsp;态：</label><input type="number"  value="<?php echo  $mode?>" max="2" min="1" id="state" name="state"></td><td>1不禁用2禁用</td></tr>
            <tr><td><label for="class">类 &nbsp;&nbsp;&nbsp;&nbsp;别：</label><input type="number" value="<?php echo  $role?>" max="2" min="1" id="class" name="class"></td><td>1为普通管理员2为超级管理员</td></tr>
            <tr><td><input type="submit" class="tijiao" value="修改"></td><td><input type="reset"class="chongzhi" value="重置"></td></tr>
        </table>
    </form>

</div>
</div>

</body>
</html>
