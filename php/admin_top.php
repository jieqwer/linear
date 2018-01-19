
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/admin_top.css">

</head>
 <body>
 <div class="topleft">
     <div class="topleft1">
         <h2><a href="batch.php">后台管理系统</a></h2>
         <div><span></span><a>新增</a><i></i></div><span id="admin" onclick="add()" ><i></i>用户</span>
     </div>
     <div class="topright">
         <h3>管理员</h3>
         <div>admin <i></i></div><span><a href="addminsession.php">退出</a></span>
     </div>
 </div>

 <div id="div1" style="background:rgba(0,0,0,.3);width: 800px;height: 500px;position: absolute;top:50%;left: 50%;
    margin-left:-400px;margin-top:-250px;transform: scale(0);z-index: 1000">
<img src="../img/close.png" id="img1">

     <form action="add_admin.php" method="post">
         <table width="700" height="400" style="margin: 20px auto;color: white">
             <tr><td><label for="username">用 户 名 ：</label><input type="text" id="username" name="username"></td><td>用户名为字母加数字</td></tr>
             <tr><td><label for="password">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label><input type="password" id="password" name="password"></td><td>密码为字母符号加数字</td></tr>
             <tr><td><label for="adid">管&nbsp;理&nbsp;ID：</label><input type="text" id="adid" name="adid"></td><td>可不填</td></tr>
             <tr><td><label for="time">添加时间 :</label><input type="text" id="time" name="time"></td><td>选填</td></tr>
             <tr><td><label for="state">状 &nbsp;&nbsp;&nbsp;&nbsp;态：</label><input type="number"  max="2" min="1" id="state" name="state"></td><td>1不禁用2禁用</td></tr>
             <tr><td><label for="class">类 &nbsp;&nbsp;&nbsp;&nbsp;别：</label><input type="number" max="2" min="1" id="class" name="class"></td><td>1为普通管理员2为超级管理员</td></tr>
             <tr><td><input type="submit" class="tijiao" value="提交"></td><td><input type="reset" class="chongzhi" value="重置"></td></tr>
         </table>
     </form>

 </div>

 <script type="text/javascript">
 var admin=document.getElementById("admin");
 var div1=document.getElementById("div1");
 var img=document.getElementById("img1");
 admin.onclick=function () {
     div1.style.transform="scale(1)";
 }
img.onclick=function () {
    div1.style.transform="scale(0)";
}




 </script>

</body>
</html>
