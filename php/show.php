<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>信息显示</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="../style/style4.css" type="text/css">
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
    <p>报名信息</p>
        <table>
            <?php
            include_once('../function/function.php');
            //设置字符编码
            mysql_query("set names'utf8'");
            //调用函数链接数据库服务器
            opensql('localhost','root','woainirr@1314.++','db_lzy');
            //准备查询数据表classfiy1的mysql语句
            $sql="select * from tb_message where me_number= '$id'";
            //返回查询结果集给$result
            $result=mysql_query($sql);
            while($data=mysql_fetch_row($result)){
                echo '<tr><td>身份证号：</td><td>'.$data[0].' </td></tr>';
                echo '<tr><td>姓名：</td><td>'.$data[1] .'</td></tr>';
                echo '<tr><td>性别：</td><td>'.$data[2] .'</td></tr>';
                echo ' <tr><td>名族：</td><td>'.$data[3] .'</td></tr>';
                echo '<tr><td>政治面貌：</td><td>'.$data[4] .'</td></tr>';
                echo '<tr><td>毕业学校：</td><td>'.$data[5] .$data[6].'</td></tr>';
                echo '<tr><td>毕业类别：</td><td>'.$data[7] .'</td></tr>';
                echo '<tr><td>报读专业：</td><td>'.$data[8] .'</td></tr>';
                 echo'<tr><td>考生手机号：</td><td>'.$data[9] .'</td></tr>';
                 echo'<tr><td>考生QQ：</td><td>'.$data[10] .'</td></tr>';
                 echo'<tr><td>考生目前所在地：</td><td>'.$data[11] .'</td></tr>';
                 echo'<tr><td>考生联系方式：</td><td>'.$data[9] .'</td></tr>';
                 echo'<tr><td>资料邮编地址：</td><td>'.$data[15] .'</td></tr>';
            }
            mysql_close();
            ?>
            <tr><td colspan="2"><a href="update1.php?id=<?php echo $id ?> " class="upd" id="reg">信息有误，现在修改</a></td></tr>
        </table>

</div>
<div class="footer">
    <div><span></span></div>
    <p>泸州技师学院 地址：泸州市龙马潭区长桥路2号 邮编：646000</p>
    <p>热线：0830-3152281 </p>
</div>


</body>
</html>