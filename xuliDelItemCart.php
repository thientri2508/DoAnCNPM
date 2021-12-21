<?php
session_start();
$id=$_GET['id'];
array_splice($_SESSION['mycart'],$id-1,1);
array_splice($_SESSION['mycartMini'],$id-1,1);
echo '<script>location.replace("mensport.com?giohang");</script>';	
?>
