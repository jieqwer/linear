<?php
if(!(empty($_COOKIE['username']))){
    $username=$_COOKIE['username'];
}else{
    $username='';
}
if(!(empty($_COOKIE['password']))){
    $password=$_COOKIE['password'];
}else{
    $password='';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="../style/style1.css" type="text/css">

</head>
<body style="background:rgba(51,238,211,.3);">
<div class="top">
    <div>泸州技师学院2017报名</div>
    <p> </p>
    <a href="http://www.lzy.edu.cn/">【学院首页】</a>
</div>
<div class="center">
    <h1>管理登录</h1>
    <form action="mlogin_check.php" method="post">
        <table class="tab">
            <tr><td> <label for="username" class="lab">用户名：</label><input type="text" name="username" value="<?php  echo $username; ?>"  placeholder="请输入管理员账号" ><span>这是你的管理员账号</span></td></tr>
            <tr ><td><label for="password">密&nbsp;&nbsp; 码：</label><input type="password" name="password" value="<?php  echo $password; ?>" pattern="^[\da-zA-Z]{6,18}$"  placeholder="密码"><span>忘记密码</span></td></tr>
            <tr><td><label for="text">验证码：</label><input type="text" name="text" pattern="^[\d]{4}$" placeholder="验证码"><canvas width="80px" height="30px"  id="canvas-vcode"></canvas></td></tr>
            <tr><td> <input  type="submit" value="登录" class="sub"></td></tr>
        </table>
    </form>
</div>
<div class="footer">
    <div><span></span></div>
    <p>泸州技师学院 地址：泸州市龙马潭区长桥路2号 邮编：646000</p>
    <p>热线：0830-3152281 </p>
</div>
<!--随机产生验证码-->


<script type="text/javascript" src="jq.js"></script>
<script type="text/javascript">
    $().ready(function () {  //页面就绪执行函数
        $("#canvas-vcode").click(function() {  //点击向后台执行一次请求，并返回值
            $.ajax({
                type:"GET",
                url:"code.php",
                success:function (msg) {
                    var obj= JSON.parse(msg);
                    drawCode(obj);
                }
            });
        });

        function drawCode(code) {
            var c=document.getElementById("canvas-vcode");
            var ctx=c.getContext("2d");
            ctx.clearRect(0, 0, c.width, c.height);//每次产生验证码时先清除画布的内容
            ctx.font="20px 微软雅黑";
            ctx.fillStyle="red";
            ctx.textAlign="center";
            ctx.textBaseline="middle";
            ctx.strokeRect(0,0,80,30);
            ctx.fillText(code ,40,15);

            for(var i=0;i<20;i++){
                var x=Math.ceil(Math.random()*80);
                var y=Math.ceil(Math.random()*30);
                var z=Math.ceil(Math.random()*3);
                var r=Math.ceil(Math.random()*255);
                var g=Math.ceil(Math.random()*255);
                var b=Math.ceil(Math.random()*255);
                ctx.fillStyle="rgb("+r+","+g+","+b+")";
                ctx.beginPath();
                ctx.arc(x,y,z,0,Math.PI*2,false);
                ctx.closePath();
                ctx.fill();

            }
            for(var j=0;j<4;j++){
                var a=Math.ceil(Math.random()*80);
                var b=Math.ceil(Math.random()*30);
                var m=Math.ceil(Math.random()*80);
                var n=Math.ceil(Math.random()*30);
                ctx.moveTo(a,b);
                ctx.lineTo(m,n);
                ctx.lineWidth=2;
                ctx.stroke();
                var r=Math.ceil(Math.random()*255);
                var g=Math.ceil(Math.random()*255);
                var b=Math.ceil(Math.random()*255);
                ctx.strokeStyle="rgb("+r+","+g+","+b+")";
            }
        }
        $("#canvas-vcode").trigger("click");//手动触发一次change事件
    });
</script>

</body>
</html>