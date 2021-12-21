<?php
include 'pdo.php';
session_start();
$id = $_REQUEST["id"];
$sql="select status from order_ticket where id_order=".$id;
$stt=pdo_query_one($sql);
extract($stt);
if($status=='chờ xác nhận'){
$sql="select * from detail_order_ticket where id_order=".$id;
$del=pdo_query($sql);
foreach($del as $up){
	extract($up);
	$sql="select amount from warehouse where id_product=".$id_product." and size='".$size."'";
	$sl=pdo_query_one($sql);
	$a=$sl["amount"];
	$newSL=$a+$amount;
	$sql="update warehouse set amount=".$newSL." where id_product=".$id_product." and size='".$size."'";
	pdo_execute($sql);	
}
$sql="delete from detail_order_ticket where id_order=".$id;
pdo_execute($sql);
$sql="delete from order_ticket where id_order=".$id;
pdo_execute($sql);
$_SESSION['tb']=4;}
else {
	$_SESSION['tb']=5;
}
echo '<script>location.replace("mensport.com?DS_order");</script>';	
?>
