<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="select id from category where idProductType=".$id;
$list=pdo_query($sql);
if(count($list)==0) {
	$sql="delete from properties_of_product_type where id_ProductType=".$id;
	pdo_execute($sql);
	$sql="delete from product_type where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=5;
	echo '<script>location.replace("server.php?category=qllsp");</script>';	
}else {
$_SESSION['thongbaoad']=4;
echo '<script>location.replace("server.php?category=qllsp");</script>';	
}
?>
