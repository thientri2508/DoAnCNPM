<?php
session_start();
include 'pdo.php';
$price_sale=$_POST['price_sale'];
$apply=$_POST['apply'];
$sql="insert into promotions_content(price_sale,apply) values('$price_sale','$apply')";
pdo_execute($sql);
$_SESSION['thongbaoad']=4;
echo '<script>location.replace("server.php?category=ctkm");</script>';	
?>