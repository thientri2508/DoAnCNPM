<?php 
session_start();
include 'pdo.php';
$id=$_REQUEST['id'];
$role=$_REQUEST['role'];
$sql="update account set job='".$role."' where id=".$id;
pdo_execute($sql);
$_SESSION['thongbaoad']=4;
echo '<script>location.replace("server.php?category=staff_management");</script>';	
?>
