<meta charset="UTF-8">
<?php

$idcar=$_POST['idcar'];
$password=md5($_POST['password']);
$uname=$_POST['uname'];
$sex=$_POST['sex'];//性别
$nation=$_POST['nation'];//名族
$post1=$_POST['post1'];//政治面貌
$school=$_POST['school'];//毕业学校地区
$schoolname=$_POST['schoolname'];//毕业学校名称
$sheng=$_POST['sheng'];//生源类别
$major=$_POST['major'];//专业
$tel=$_POST['tel'];//电话
$qq=$_POST['qq'];//QQ
$location=$_POST['location'];//所在地
$work=$_POST['work'];//工作状态
$fam=$_POST['fam'];//家长姓名
$famtel=$_POST['famtel'];//家长联系电话
$mail=$_POST['mail'];//邮寄地址
$postal=$_POST['postal'];//邮编
$sname=$_POST['sname'];//收件人姓名
$stel=$_POST['stel'];//收件人电话
$no=$_GET['no'];//批次id
$pass=$_POST["password2"];

include_once('../function/function.php');
//设置字符编码
mysql_query("set names'utf8'");
//调用函数链接数据库服务器
opensql('localhost','root','woainirr@1314.++','db_lzy');
//准备查询数据表classfiy1的mysql语句
$sql1="select * from tb_message where me_number='$idcar'";
$result1=mysql_query($sql1);
//将返回的结果集的每个字段一一对应赋值给变量
list($idcarz,$uname1,$sex1,$nation1,$post11,$school1,$schoolname1,$sheng1,$major1,$tel1,$qq1,$location1,$work1,$fam1,$famtel1,$mail1,$postal1,$sname1,$stel1,$meid1,$ap_no1,$password1)=mysql_fetch_array($result1);
if($idcarz==$idcar){
 echo '<script>alert("你已报名，请勿重复报名");</script>';
    header("refresh:0;url=message.php?id=$no");
}else{

   if($idcar== "" || !preg_match("/^([\d]{17}[xX\d]|[\d]{15})$/", $idcar)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("身份证号格式有误");</script>';
        exit;
    }
    else if($password== "" || !preg_match("/^[a-zA-Z\d]{6,}$/", $password)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("密码格式有误");</script>';
        exit;
    }
    else if($pass != $password ){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("两次密码不一致");</script>';
        exit;
    }
    else if($uname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$uname)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("姓名格式有误");</script>';
        exit;
    }
    else if($schoolname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$schoolname)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("毕业学校格式有误");</script>';
        exit;
    }
    else if($tel== "" || !preg_match("/^1[34578]\d{9}$/",$tel)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("手机号码格式有误");</script>';
        exit;
    }
    else if($qq== "" || !preg_match("/^[0-9]*$/",$qq)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("QQ格式有误");</script>';
        exit;
    }
    else if($location== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2})+$/",$location)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("目前所在地仅支持中文");</script>';
        exit;
    }
    else if($fam== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$fam)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("请填写正确家长姓名");</script>';
        exit;
    }
    else if($famtel== "" || !preg_match("/^1[34578]\d{9}$/",$famtel)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("家长手机号码格式有误");</script>';
        exit;
    }
    else if($mail== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2})+$/",$mail)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("邮寄地址仅支持中文");</script>';
        exit;
    }
    else if($postal== "" || !preg_match("/^\d{6}$/",$postal)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("邮编格式有误");</script>';
        exit;
    }
    else if($sname== "" || !preg_match("/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/",$sname)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("请填写正确收件人姓名");</script>';
        exit;
    }
    else if($stel== "" || !preg_match("/^1[34578]\d{9}$/",$stel)){
        header("refresh:0;url=message.php?id=$no");
        echo '<script>alert("收件人手机号码格式有误");</script>';
        exit;
    }
    else{

        include_once('../function/function.php');
        opensql('localhost','root','woainirr@1314.++','db_lzy');
//准备sql语句
        $sql="insert into tb_message(me_number,me_name,me_sex,me_family,me_political,me_city,me_school,me_scurce,me_major,me_tel,me_qq,me_place,me_work,me_pname,me_ptel,me_site,me_podtcode,me_recipients,me_retel,ap_no,password) values('$idcar','$uname','$sex','$nation','$post1','$school','$schoolname','$sheng','$major','$tel','$qq','$location','$work','$fam','$famtel','$mail','$postal','$sname','$stel',$no,'$password')";


        $result=mysql_query($sql);
        if(!$result){
            echo "信息填写失败，请检查SQL语句";
            header("refresh:2;url=message.php");

        }else{
            echo "信息填写成功";
            header("refresh:2;url=login.php");
        }

//退出数据库
        mysql_close();
    }

}






?>







