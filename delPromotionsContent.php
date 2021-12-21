<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="select id_promotions from set_promotions where id_content=".$id;
$list=pdo_query($sql);
if(count($list)==0) {
	$sql="delete from promotions_content where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=7;
	echo '<script>location.replace("server.php?category=ctkm");</script>';	
}else {
$_SESSION['thongbaoad']=8;
echo '<script>location.replace("server.php?category=ctkm");</script>';	
}
?>
