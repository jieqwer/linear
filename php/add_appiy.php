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
/*if(empty($_GET['id'])){
    echo '<script type="text/javascript">alert("登录后才能进入");</script>';
    header("refresh:0;url=mlogin.php");
    die();
}*/
include_once("admin.php");
?>
<div class="righttable6">
    <div id="div1" style="background:rgba(0,0,0,.3);width: 1000px;height: 637px;position: absolute;top:14%;right: 30%;">
        <img src="../img/tianxie.png" id="img">

        <form action="add_appiycheck.php" method="post">
            <table width="1000"  style="margin: 20px auto;color: white">
                <tr><td><label for="ap_name">批 &nbsp;次 &nbsp;名 &nbsp;称 ：</label><input type="text" id="ap_name" name="ap_name" ></td><td><label for="ap_no">批 &nbsp; 次 &nbsp; I &nbsp; D：</label><input type="text" id="ap_no"  name="ap_no"></td></tr>
                <tr><td><label for="ap_begin">报名开始时间：</label><input type="text" id="ap_begin" name="ap_begin" ></td><td><label for="ap_moneyb">缴费开始时间：</label><input type="text"   id="ap_moneyb" name="ap_moneyb"></td></tr>
                <tr><td><label for="ap_over">报名结束时间：</label><input type="text" id="ap_over" name="ap_over" ></td><td><label for="ap_moneyo">缴费结束时间：</label><input type="text" id="ap_moneyo" name="ap_moneyo"></td></tr>
                <tr><td><label for="ap_message">专 &nbsp;业 &nbsp;信 &nbsp;息：</label><input type="text" id="ap_message" name="ap_message"></td><td><label for="ap_money">缴 &nbsp;费 &nbsp;金 &nbsp;额：</label><input type="number"  id="ap_money" name="ap_money"></td></tr>
                <tr><td><label for="ap_addtime">批次发布时间：</label><input type="text"id="ap_addtime" name="ap_addtime"></td><td></td></tr>
                <tr><td colspan="2"><label for="ap_add">批次发布者：</label><input type="number"  max="2" min="1" id="ap_add" name="ap_add">1为超级管理员2为普通管理员</td></tr>
                <tr><td colspan="2"><label for="ap_mode">是 否 禁 用：</label><input type="number"  max="2" min="1" id="ap_mode" name="ap_mode">1为不禁用批次2为要禁用批次</td></tr>
                <tr><td ><input type="submit" class="tijiao" value="添加"></td><td><input type="reset"class="chongzhi" value="重置"></td></tr>
            </table>
        </form>

    </div>
</div>

</body>
</html>
