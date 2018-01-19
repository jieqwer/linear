<meta charset="UTF-8">
<?php

$id=$_GET['id'];

include_once('../function/function.php');
opensql('localhost','root','woainirr@1314.++','db_lzy');
$sql="select * from tb_message where me_number='$id'";
$result=mysql_query($sql);
//将返回的结果集的每个字段一一对应赋值给变量
list($idcar,$uname,$sex,$nation,$post1,$school,$schoolname,$sheng,$major,$tel,$qq,$location,$work,$fam,$famtel,$mail,$postal,$sname,$stel,$meid,$ap_no,$pas)=mysql_fetch_array($result);
mysql_close();
$password1=md5($_POST['password']);
$password2=md5($_POST['password1']);
$password3=md5($_POST['password2']);

if($pas!=$password1){
    echo '<script type="text/javascript">alert("原密码错误");</script>';
    header("refresh:2;url=update.php?id=$id");
    die();
}else{
    header("refresh:2;url=update.php?id=$id");
}
if($password2== "" || !preg_match("/^[a-zA-Z\d]{6,}$/", $password2)){
    header("refresh:0;url=update.php?id=$id");
    echo '<script>alert("密码格式有误");</script>';
    exit;
}
if($password2!=$password3){
    echo '<script type="text/javascript">alert("两次密码不相同");</script>';
    header("refresh:2;url=update.php?id=$id");
    die();
}
else{
    include_once('../function/function.php');
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    $sql="update  tb_message  set password='$password3' where me_number='$id'";
    $result=mysql_query($sql);
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加载页面</title>
    <style type="text/css">
        #progress{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #337ab7;
            height: 100%;
            display: block;
        }
        #loading{
            background-color: #ec5858;
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 1;
            margin-top: 0px;
            top: 0px;
        }
        #loading-text{
            position: absolute;
            top:70%;
            left: 40%;
        }
        #loading-text p {
            font-size: 18px;
            color: #FFFFFF;
        }
        #loading-center{
            width: 100%;
            height: 100%;
            position: relative;
        }
        #loading-center-absolute {
            position: absolute;
            left: 50%;
            top: 50%;
            height: 150px;
            width: 250px;
            margin-top: -25px;
            margin-left: -75px;
        }
        .object{
            width: 8px;
            height: 50px;
            margin-right:5px;
            background-color: #FFF;
            animation: animate 1s infinite;
            float: left;
        }
        .object:last-child {
            margin-right: 0px;
        }
        .object:nth-child(10){
            animation-delay: 0.9s;
        }
        .object:nth-child(9){
            animation-delay: 0.8s;
        }
        .object:nth-child(8){
            animation-delay: 0.7s;
        }
        .object:nth-child(7){
            animation-delay: 0.6s;
        }
        .object:nth-child(6){
            animation-delay: 0.5s;
        }
        .object:nth-child(5){
            animation-delay: 0.4s;
        }
        .object:nth-child(4){
            animation-delay: 0.3s;
        }
        .object:nth-child(3){
            animation-delay: 0.2s;
        }
        .object:nth-child(2){
            animation-delay: 0.1s;
        }
        @keyframes animate {
            50% {
                transform: scaleY(0);
            }
        }
    </style>
</head>
<body>
<article>
    <div id="progress">
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                </div>
                <div id="loading-text">
                    <p>正在进行修改中，请耐心等待...</p>
                </div>
            </div>
        </div>
    </div>
</article>

</body>
</html>';
   echo '<script type="text/javascript">setTimeout(function(){alert(" 修改成功") },1000)</script >';
    header("refresh:2;url=update.php?id=$id");
}



?>