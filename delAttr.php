<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="select id_product from detail_product where id_properties=".$id;
$list1=pdo_query($sql);
$sql="select * from properties_of_product_type where id_properties=".$id;
$list2=pdo_query($sql);
if(count($list1)==0&&count($list2)==0) {
	$sql="delete from set_properties where id_properties=".$id;
	pdo_execute($sql);
	$sql="delete from properties where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=13;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}else {
$_SESSION['thongbaoad']=12;
echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}
?>
