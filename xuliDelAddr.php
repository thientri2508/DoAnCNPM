<?php
session_start();
include 'pdo.php';
$addr=$_REQUEST['addr'];
$user=$_SESSION['userlogin'];
$sql="delete from delivery_address where id_user=".$user[7]." AND address='".$addr."'";
pdo_execute($sql);
$_SESSION['tb']=15;
echo '<script>location.replace("mensport.com?profile&deliveryAddress");</script>';	
?>
