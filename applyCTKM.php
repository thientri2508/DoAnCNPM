<?php
session_start();
include 'pdo.php';
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
if($status=='on'){
	$sql="select * from promotions where status='on'";
	$check=pdo_query_one($sql);
	if($check==''){
		$sql="update promotions set status='".$status."',fix='off' where id=".$id;
		pdo_execute($sql);
		$_SESSION['thongbaoad']=2;
		echo '<script>location.replace("server.php?category=ctkm");</script>';	
	}else{
		$_SESSION['thongbaoad']=1;
		echo '<script>location.replace("server.php?category=ctkm");</script>';	
	}
}else {
	$sql="update promotions set status='".$status."' where id=".$id;
	pdo_execute($sql);
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=ctkm");</script>';	
}
?>