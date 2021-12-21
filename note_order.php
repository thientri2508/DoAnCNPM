<?php
$id=$_REQUEST['id'];
$note=$_REQUEST['note'];
session_start();
include 'pdo.php';
$sql="update order_ticket set note='".$note."' where id_order=".$id;	
pdo_execute($sql);
$_SESSION['thongbaoad']=4;
?>
