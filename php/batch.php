
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/admin_left.css" />
    <link rel="stylesheet" href="../style/admin_top.css" />
    <link rel="icon"  href="../img/guan%20(2).ico">
</head>

<body>

<?php
session_start();

if(empty($_SESSION['username'])){
    header("refresh:0;url=404.php");
    die();
}
include_once("admin.php");

?>
<div class="beijing">
    <div class="topbotright">欢迎您  <?php echo $_SESSION['username']?>
    <p> &nbsp;</p>
    <p>进</p>
    <p>入</p>
    <p>后</p>
    <p>台</p>
    <p>管</p>
    <p>理</p>
    <p>系</p>
    <p>统</p>

    </div>
</div>


</body>
</html>