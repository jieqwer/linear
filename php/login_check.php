
<meta charset="utf-8">
<?php

$username=$_POST["username"];
$password=$_POST["password"];

session_start();

    setcookie("username",$username,time()+7*24*3600);
    setcookie("password",$password,time()+7*24*3600);




if(empty($_POST["text"])){
    echo '<script type="text/javascript">alert("你没有输入验证码，请输入");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    $text=$_POST["text"];
}


if(!(strtolower($text)==strtolower($_SESSION['code']))){
    echo '<script type="text/javascript">alert("验证码错误，请重新输入");</script>';
    header('refresh:0;url=login.php');
    exit();
}

else{}

if(empty($_POST['username'])){
    echo '<script type="text/javascript">alert("你没有输入用户名，请输入");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    $username=$_POST['username'];
}


if(empty($_POST['password'])){
    echo '<script type="text/javascript">alert("你没有输入密码，请输入");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    $password=md5($_POST['password']) ;
}

include_once('../function/function.php');
opensql('localhost','root','123456','db_lzy');
$sql='select * from tb_message where me_number="'.$username.'" and password="'.$password.'"';
$result=mysql_query($sql);
$r=mysql_num_rows($result);


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

    $_SESSION['username']=$username;
    header("refresh:2;url=show.php?id=$username");
}else{
    echo '<script type="text/javascript">alert("用户名和密码有错，请重新输入");</script>';
    header('refresh:0;url=login.php');
}

?>
