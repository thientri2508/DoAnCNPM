<?php
include 'pdo.php';
session_start();
$id = $_REQUEST["id"];
$sql="select * from order_ticket where id_order=".$id;
$check=pdo_query_one($sql);
if($check!='') {
	$nv=$_SESSION['adminlogin'];
	$date=date("Y-m-d");
	$day = strtotime(date("Y-m-d", strtotime($date)) . " +3 day");
	$day = strftime("%Y-%m-%d", $day);
	$stt='đã xác nhận';
	$sql="update order_ticket set status='".$stt."',date_ship='".$day."',id_staff=".$nv[7].",date_confirm='".$date."' where id_order=".$id;	
	pdo_execute($sql);
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=order");</script>';	
}else{
	$_SESSION['thongbaoad']=5;
	echo '<script>location.replace("server.php?category=order");</script>';	
}
?>