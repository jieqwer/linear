
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="../style/style3.css" type="text/css">
    <?php

    if(empty($_GET['id'])){
        echo '<script type="text/javascript">alert("登录后才能再进入");</script>';
        header("refresh:0;url=login.php");
        die();
    }
    $id=$_GET['id'];


    ?>
</head>
<body>
<div class="top">
    <div>泸州技师学院2017报名</div>
    <p>
        <a href="show.php?id=<?php echo $id ?>">报名信息</a>
        <a href="#">在线缴费</a>
        <a href="update.php?id=<?php echo $id ?>">修改密码</a>
        <a href="session.php">退出登录</a>
    </p>
</div>

<div class="center">
    <p>修改密码</p>
    <form method="post" action="update_check.php?id=<?php echo $id ?>">
        <table>
            <tr><td><label>用户名：</label></td><td><?php  echo $id ?></td></tr>
            <tr><td><label for="password">原始密码：</label></td><td><input type="password" name="password" placeholder="请输入原密码" required="required" ></td></tr>
            <tr><td><label for="password1">新密码：</label></td><td><input type="password" name="password1" placeholder="请输入新密码"  pattern="^[\da-zA-Z]{6,18}$"><span>数字或字母至少六位</span></td></tr>
            <tr><td><label for="password2">再次输入新密码：</label></td><td><input type="password" name="password2" placeholder="请再次输入新密码" required="required" pattern="^[\da-zA-Z]{6,18}$" ></td></tr>
            <tr><td colspan="2"><input type="submit" value="修改" class="sub"></td></tr>
        </table>
    </form>
</div>
<div class="footer">
    <div><span></span></div>
    <p>泸州技师学院 地址：泸州市龙马潭区长桥路2号 邮编：646000</p>
    <p>热线：0830-3152281 </p>
</div>
</body>
</html>