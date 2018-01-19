﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>信息修改</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="../style/style5.css" type="text/css">
    <?php

    if(empty($_GET['id'])){
        echo '<script type="text/javascript">alert("登录后才能再进入");</script>';
        header("refresh:0;url=login.php");
        die();
    }
    $id=$_GET['id'];



          include_once('../function/function.php');
            //设置字符编码
            mysql_query("set names'utf8'");
            //调用函数链接数据库服务器
            opensql('localhost','root','woainirr@1314.++','db_lzy');
            //准备查询数据表classfiy1的mysql语句
            $sql="select * from tb_message where me_number=$id";
            $result=mysql_query($sql);
            //将返回的结果集的每个字段一一对应赋值给变量
            list($idcar,$uname,$sex,$nation,$post1,$school,$schoolname,$sheng,$major,$tel,$qq,$location,$work,$fam,$famtel,$mail,$postal,$sname,$stel,$meid,$ap_no,$password)=mysql_fetch_array($result);


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
    <p>考生修改报名信息</p>
    <form method="post" action="update1_check.php?id=<?php echo $id ?>" >
        <table>
            <tr><td colspan="3"><label for="idcar">身份证号：*</label><input type="text" disabled="true" required="required" value="<?php echo $id ?>" name="idcar" pattern="^[1-9]\d{5}[1-9]\d{3}((0[1-9])|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$"  placeholder="请输入身份证号码"><span>登录报名平台的用户名为身份证号码</span></td></tr>
            <tr><td colspan="3"><label for="name">考生姓名：*</label><input type="text" required="required" value="<?php echo $uname ?>" name="uname" pattern="^[/u4e00-/u9fa5]{0,}$"   placeholder="请输入您的真实姓名"><span>注意：与身份证姓名一致</span></td></tr>
            <tr><td style="width:20px;"><label for="boy">性别：</label><input type="radio" name="sex" id="boy" value="男" checked>男<input type="radio" name="sex" id="girl" value="女">女</td>
                <td><label for="nation">名族:</label>
                    <select name="nation" value="<?php echo $nation ?>">
                        <option>汉族</option>
                        <option>壮族</option>
                        <option>满族</option>
                        <option>回族</option>
                        <option>苗族</option>
                        <option>维吾尔族</option>
                        <option>土家族</option>
                        <option>彝族</option>
                        <option>蒙古族</option>
                        <option>藏族</option>
                        <option>布依族</option>
                        <option>侗族</option>
                        <option>瑶族</option>
                        <option>朝鲜族</option>
                        <option>白族</option>
                        <option>哈尼族</option>
                        <option>哈萨克族</option>
                        <option>黎族</option>
                        <option>傣族</option>
                        <option>畲族</option>
                        <option> 傈僳族</option>
                        <option>仡佬族</option>
                        <option> 东乡族</option>
                        <option> 高山族</option>
                        <option>拉祜族</option>
                        <option>水族</option>
                        <option>佤族</option>
                        <option>纳西族</option>
                        <option>羌族</option>
                        <option>土族</option>
                        <option>仫佬族</option>
                        <option>锡伯族</option>
                        <option>柯尔克孜族</option>
                        <option>达斡尔族</option>
                        <option>景颇族</option>
                        <option>毛南族</option>
                        <option>撒拉族</option>
                        <option> 布朗族</option>
                        <option>塔吉克族</option>
                        <option> 阿昌族</option>
                        <option> 普米族</option>
                        <option>鄂温克族</option>
                        <option>怒族</option>
                        <option>京族</option>
                        <option>基诺族</option>
                        <option>德昂族</option>
                        <option>保安族</option>
                        <option>俄罗斯族</option>
                        <option>裕固族</option>
                        <option>乌孜别克族</option>
                        <option> 门巴族</option>
                        <option>鄂伦春族</option>
                        <option>独龙族</option>
                        <option>塔塔尔族</option>
                        <option>赫哲族</option>
                        <option>珞巴族</option>
                    </select></td>
                <td><label for="post1">政治面貌：</label>
                    <select name="post1" value="<?php echo $post1 ?>">
                        <option>共青团员</option>
                        <option>中共预备党员</option>
                        <option>中共党员</option>
                        <option>群众</option>
                    </select></td></tr>
            <tr><td><label for="school">毕业学校：* &nbsp;&nbsp;</label><select name="school" value="<?php echo $school ?>">
                <option>泸州市</option>
                <option>成都市</option>
                <option>自贡市</option>
                <option>攀枝花市</option>
                <option>德阳市</option>
                <option>绵阳市</option>
                <option>广元市</option>
                <option>遂宁市</option>
                <option>内江市</option>
                <option>乐山市</option>
                <option>南充市</option>
                <option>眉山市</option>
                <option>宜宾市</option>
                <option>广安市</option>
                <option>达州市</option>
                <option>雅安市</option>
                <option>巴中市</option>
                <option>资阳市</option>
                <option>阿坝藏族羌族自治州</option>
                <option>甘孜藏族自治州</option>
                <option>凉山彝族自治州</option>
                <option>其它</option>
            </select></td><td colspan="2"><input type="text" required="required" name="schoolname" value="<?php echo $schoolname ?>"placeholder="学校名称"></td></tr>
            <tr><td colspan="3"><label for="stca">生源类别：*</label><input type="radio" id="stca" name="sheng" value="普高毕业生或职高未取得中级证毕业生"  checked>普高毕业生或职高未取得中级证毕业生<input type="radio" id="bing" name="sheng"  value="职业中学、技工校已取得中级工证毕业生">职业中学、技工校已取得中级工证毕业生<label for="bing"><label for="gongzhong"> 工种名称：</label><input type="text" id="gongzhong" placeholder="请输入工种名称"><select><option>【中级四级】</option><option>【高级三级】</option></select></label><input name="sheng"  type="radio" value="初中毕业生">初中毕业生</td></tr>
            <tr><td colspan="3"><label for="major">报读技师学院专业：*</label>
                <select name="major" value="<?php echo $major ?>">
                    <option>建筑施工专业【学制三年，层级高级工】</option>
                    <option>--选择专业--</option>
                    <option>数控加工专业【学制四年，层级预备技师】</option>
                    <option>电气自动化设备安装与维修【学制四年，层级预备技师】</option>
                    <option>汽修维修专业【学制四年，层级预备技师】</option>
                </select></td></tr>
            <tr><td colspan="3"><label for="tel">手机号码：*</label><input type="tel" required="required" value="<?php echo $tel ?>" pattern="^1[3|5|8][0-9]\d{4,8}$" name="tel" placeholder="请输入长期使用的号码"><span>请输入本人长期使用号码，以便联系</span></td></tr>
            <tr><td colspan="3"> <label for="qq">考生QQ号：*</label><input type="number" required="required" value="<?php echo $qq ?>" name="qq" pattern="^[1-9][0-9]{4,}$"  placeholder="请输入本人QQ号码"></td></tr>
            <tr><td><label for="location">目前所在地：*</label><input type="text" name="location" value="<?php echo $location ?>" placeholder="请填写目前所在城市"></td><td colspan="2"><label for="work">目前工作状态：</label><select name="work" value="<?php echo $work?>"><option>就业</option><option>行业</option></select></td></tr>
            <tr><td><label for="fam">家长姓名：*</label><input type="text" required="required" value="<?php echo $fam ?>"  name="fam" placeholder="请输入家长姓名" pattern="^[/u4e00-/u9fa5]{0,}$" ></td><td colspan="3"><label for="famtel">家长联系电话：*</label><input required="required"  type="tel" value="<?php echo $famtel ?>" pattern="^1[3|5|8][0-9]\d{4,8}$" name="famtel" placeholder="请输入家长长期使用的手机号"><span>请留下家长长期使用的手机号</span></td></tr>
            <tr><td><label for="mail">邮寄相关资料地址：*</label><input type="text" name="mail" value="<?php echo $mail ?>" placeholder="请输入通知书邮寄地址" required="required"></td><td colspan="3"><label for="postal">邮编：</label><input type="tel" value="<?php echo $postal ?>"name="postal" placeholder="邮编"></td></tr>
            <tr><td><label for="sname">收件人姓名：*</label><input type="text" value="<?php echo $sname ?>" name="sname" placeholder="收件人"  required="required"  pattern="^[/u4e00-/u9fa5]{0,}$" ></td><td colspan="3"><label for="stel">收件人联系电话：*</label><input required="required"  type="tel" value="<?php echo $stel ?>" name="stel" placeholder="请输入收件人联系电话" pattern="^1[3|5|8][0-9]\d{4,8}$"></td></tr>
            <tr><td colspan="2"><input type="submit" value="确认修改" id="sub"></td><td style="color: #fc4222">注意：带*的信息为必填信息哦</td></tr>
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