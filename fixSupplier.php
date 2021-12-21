<?php
include 'pdo.php';
session_start();
if(isset($_REQUEST['name'])) {
	$name=$_REQUEST['name'];
	$sql="insert into supplier(name) values('$name')";
	pdo_execute($sql);
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=supplier");</script>';	
}
else {
	$id=$_REQUEST['id'];
	$sql="delete from supplier where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=supplier");</script>';	
}
?>
