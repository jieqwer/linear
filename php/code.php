<?php

$randNum = rand(1000, 9999);

session_start();

$_SESSION['code'] = $randNum;

$code=json_encode($randNum);
echo $code;
?>