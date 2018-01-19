
<meta charset="utf-8">
<?php
date_default_timezone_set('prc');
$username=$_POST["username"];
$password=$_POST["password"];

session_start();

setcookie("username",$username,time()+7*24*3600);
setcookie("password",$password,time()+7*24*3600);




if(empty($_POST["text"])){
    echo '<script type="text/javascript">alert("你没有输入验证码，请输入");</script>';
    header('refresh:0;url=mlogin.php');
    die();
}else{
    $text=$_POST["text"];
}


if(!(strtolower($text)==strtolower($_SESSION['code']))){
    echo '<script type="text/javascript">alert("验证码错误，请重新输入");</script>';
    header('refresh:0;url=mlogin.php');
    exit();
}

else{}

if(empty($_POST['username'])){
    echo '<script type="text/javascript">alert("你没有输入用户名，请输入");</script>';
    header('refresh:0;url=mlogin.php');
    die();
}else{
    $username=$_POST['username'];
}


if(empty($_POST['password'])){
    echo '<script type="text/javascript">alert("你没有输入密码，请输入");</script>';
    header('refresh:0;url=mlogin.php');
    die();
}else{
    $password=md5($_POST['password']);
}
//登录成功
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql='select * from tb_admin where ad_name="'.$username.'" and ad_password="'.$password.'" and ad_mode=1';
$result=mysql_query($sql);
list($name,$password,$id,$time,$mode,$role)=mysql_fetch_array($result);
$r=mysql_num_rows($result);
//登录失败
include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql='select * from tb_admin where ad_name="'.$username.'" ';
$result1=mysql_query($sql);
list($name1,$password1,$id1,$time1,$mode1,$role1)=mysql_fetch_array($result1);

if($r>0){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加载中...</title>
    <style type="text/css">
        body {
            margin:0;
        overflow:hidden;
        width:100vw;
        height:100vh;
        background:#222;
        display:flex;
        flex-wrap:wrap;
        -webkit-box-pack:center;
        -ms-flex-pack:center;
        justify-content:center;
        align-items:center;
        }
        .cube {
            transform-style:preserve-3d;
            backface-visibility:hidden;
            width:50vh;
            height:50vh;
            position:relative;
            animation:rotator 4.5s linear infinite;
            outline:0;
        }
        .cube * {
            background:#000;
            box-shadow:0 0 3vh currentColor;
            transition:background 0.4s ease-in-out,box-shadow 0.4s ease-in-out;
        }
        .cube:hover * {
            background:currentColor;
            box-shadow:0 0 20vh currentColor;
     
        }
        .cube .cube__front {
            color:deeppink;
            transform:translateZ(25vh);
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            line-height: 450px;
            text-align: center;
            font-size: 100px;
        }
        .cube .cube__right {
            color:lightcoral;
            transform:rotateY(90deg) translateZ(25vh);
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
             line-height: 450px;
            text-align: center;
            font-size: 100px;
            
        }
        .cube .cube__left {
            color:skyblue;
            transform:rotateY(270deg) translateZ(25vh);
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
              line-height: 450px;
            text-align: center;
            font-size: 100px;
        }
        .cube .cube__back {
            color:seagreen;
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            transform:rotateY(180deg) translateZ(25vh);
              line-height: 450px;
            text-align: center;
            font-size: 100px;
        }
        .cube .cube__top {
            color:mediumseagreen;
            transform:rotateX(90deg) translateZ(25vh);
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
              line-height: 450px;
            text-align: center;
            font-size: 100px;
        }
        .cube .cube__bottom {
            color:dodgerblue;
            transform:rotateX(270deg) translateZ(25vh);
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
              line-height: 450px;
            text-align: center;
            font-size: 100px;
        }

        @keyframes rotator {
             0% {
                 transform:rotateX(0deg) rotateY(0deg);
             }
             100% {
                 transform:rotateX(360deg) rotateY(360deg);
             }
         }
    </style>
</head>
<body>
<div class="cube" tabindex="0">
    <div class="cube__front">登录成功</div>
    <div class="cube__back">登录成功</div>
    <div class="cube__left">登录成功</div>
    <div class="cube__right">登录成功</div>
    <div class="cube__top">登录成功</div>
    <div class="cube__bottom">登录成功</div>
</div>
</body>
</html>';
    $da=date('Y-m-d H:i:s');
    include_once('../function/function.php');
    opensql('localhost','root','123456','db_lzy');
    $sql1="insert into tb_log(lo_add,lo_user,lo_message,lo_time) values('$role','$username','登录成功','$da')";
    mysql_query($sql1);
    $_SESSION['username']=$username;
    header("refresh:2;url=batch.php");
}else{
    $da1=date('Y-m-d H:i:s');
    include_once('../function/function.php');
    opensql('localhost','root','123456','db_lzy');
    $sql2="insert into tb_log(lo_add,lo_user,lo_message,lo_time) values('$role1','$username','登录失败','$da1')";
    mysql_query($sql2);
   echo '<script type="text/javascript">alert("您输入用户名可能被禁用或者您的用户名和密码有错，请重新输入");</script>';
   header('refresh:0;url=mlogin.php');
}

?>
