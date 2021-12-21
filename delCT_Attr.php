<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="select id_product from detail_product where id_detail_properties=".$id;
$list1=pdo_query($sql);
$sql="select * from set_properties where id_detail_properties=".$id;
$list2=pdo_query($sql);
if(count($list1)==0&&count($list2)==0) {
	$sql="delete from detail_properties where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=7;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}else {
$_SESSION['thongbaoad']=8;
echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}
?>
