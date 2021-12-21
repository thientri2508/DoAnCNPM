<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
$sql="SELECT account.id FROM account,role WHERE role.name=account.job AND role.id='".$id."'";
$list=pdo_query($sql);
if(count($list)==0) {
	$sql="delete from job where id_role='".$id."'";
	pdo_execute($sql);
	$sql="delete from role where id='".$id."'";
	pdo_execute($sql);
	$_SESSION['thongbaoad']=5;
	echo '<script>location.replace("server.php?category=role");</script>';	
}else {
$_SESSION['thongbaoad']=6;
echo '<script>location.replace("server.php?category=role");</script>';	
}
?>
