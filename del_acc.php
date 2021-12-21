<?php 
session_start();
include 'pdo.php';
$id=$_REQUEST['id'];
//$sql="select id_order from order_ticket where id_user=".$id;
//$order=pdo_query($sql);
//foreach($order as $o)
//{
//	extract($o);
//	$sql="delete from detail_order_ticket where id_order=".$id_order;
//	pdo_execute($sql);
//}
//$sql="delete from order_ticket where id_user=".$id;
//pdo_execute($sql);
$sql="update account set del='del' where id=".$id;
pdo_execute($sql);
$_SESSION['thongbaoad']=3;
echo '<script>location.replace("server.php?category=staff_management");</script>';	
?>
