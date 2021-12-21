<?php
$id = $_REQUEST["id"];
session_start();
array_splice($_SESSION['CTKM'],$id-1,1);
echo '<script>location.replace("server.php?category=sale-off&&act=saleSP");</script>';	
?>
