<?php
session_start();
include 'pdo.php';
foreach($_SESSION['CTKM'] as $sale){
	$p=$sale[3];
	$price=$p-(($p*$sale[4])/100);
	$sql="update product set price=".$price.",price_sale=".$sale[3]." where id=".$sale[0];
	pdo_execute($sql);	
	$sql="update detail_product set id_detail_properties=18 where id_product=".$sale[0]." AND id_properties=2";
	pdo_execute($sql);	
}
$_SESSION['CTKM']=[];
$_SESSION['thongbaoad']=1;
echo '<script>location.replace("server.php?category=sale-off&&act=saleSP");</script>';
?>
