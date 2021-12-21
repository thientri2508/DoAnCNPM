<?php 
session_start();
include 'pdo.php';
$id=$_REQUEST['id'];
$role='staff';
$sql="update account set role='".$role."' where id=".$id;
pdo_execute($sql);
$_SESSION['thongbaoad']=4;
?>
