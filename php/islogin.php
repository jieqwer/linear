<meta charset="utf-8">
<?php

if(empty($_GET['id'])){
    echo '<script type="text/javascript">alert("登录后才能进入");</script>';
    header("refresh:0;url=mlogin.php");
    die();
}
?>