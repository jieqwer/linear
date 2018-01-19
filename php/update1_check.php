<meta charset="utf-8">
<?php

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
$id=$_GET['id'];


 if($uname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$uname)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("姓名格式有误");</script>';
    exit;
}
else if($schoolname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$schoolname)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("毕业学校格式有误");</script>';
    exit;
}
else if($tel== "" || !preg_match("/^1[34578]\d{9}$/",$tel)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("手机号码格式有误");</script>';
    exit;
}
else if($qq== "" || !preg_match("/^[0-9]*$/",$qq)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("QQ格式有误");</script>';
    exit;
}
else if($location== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2})+$/",$location)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("目前所在地仅支持中文");</script>';
    exit;
}
else if($fam== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$fam)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("请填写正确家长姓名");</script>';
    exit;
}
else if($famtel== "" || !preg_match("/^1[34578]\d{9}$/",$famtel)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("家长手机号码格式有误");</script>';
    exit;
}
else if($mail== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2})+$/",$mail)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("邮寄地址仅支持中文");</script>';
    exit;
}
else if($postal== "" || !preg_match("/^\d{6}$/",$postal)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("邮编格式有误");</script>';
    exit;
}
else if($sname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$sname)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("请填写正确收件人姓名");</script>';
    exit;
}
else if($stel== "" || !preg_match("/^1[34578]\d{9}$/",$stel)){
    header("refresh:0;url=update1.php?id=$id");
    echo '<script>alert("收件人手机号码格式有误");</script>';
    exit;
}
else {
    include_once('../function/function.php');
    opensql('localhost', 'root', 'woainirr@1314.++', 'db_lzy');
    $sql = "update  tb_message  set me_name='$uname',me_sex='$sex',me_family='$nation',me_political='$post1',me_city='$school',me_school='$schoolname',me_scurce='$sheng',me_major='$major',me_tel='$tel',me_qq='$qq',me_place='$location',me_work='$work',me_pname='$fam',me_ptel='$famtel',me_site='$mail',me_podtcode='$postal',me_recipients='$sname',me_retel='$stel' where me_number=$id ";
//执行mysql语句
    mysql_query($sql);

//mysql_affected_rows()返回上一次操作数据库影响的行数
//header('refresh:跳转秒数;url:跳转到的地址')
    if (mysql_affected_rows() > 0) {
        echo "修改成功";
        header("refresh:2;url=show.php?id=$id");
    } else {
        echo "修改失败";
        header("refresh:2;url=show.php?id=$id");

    }
//退出出数据库
    mysql_close();

}
?>