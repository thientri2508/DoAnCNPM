<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="select id from product where id_category='".$id."'";
$list=pdo_query($sql);
if(count($list)==0) {
	$sql="delete from category where id='".$id."'";
	pdo_execute($sql);
	$_SESSION['thongbaoad']=8;
	echo '<script>location.replace("server.php?category=qldm");</script>';	
}else {
$_SESSION['thongbaoad']=9;
echo '<script>location.replace("server.php?category=qldm");</script>';	
}
?>
