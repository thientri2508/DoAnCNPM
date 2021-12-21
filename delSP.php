<?php
session_start();
include 'pdo.php';
$id = $_REQUEST["id"];
//$sql="delete from warehouse where id_product=".$id;
//pdo_execute($sql);
$sql = "select COUNT(*) from detail_import where id_product=".$id;
$check1=pdo_query_one($sql);
$sql = "select COUNT(*) from detail_order_ticket where id_product=".$id;
$check2=pdo_query_one($sql);
if($check1["COUNT(*)"]==0&&$check2["COUNT(*)"]==0) {
    $sql="update product set del='del' where id=".$id;
    pdo_execute($sql);
    $_SESSION['thongbaoad']=5;
}else {
    $_SESSION['thongbaoad']=6;
}
echo '<script>location.replace("server.php?category=qlsp");</script>';	
?>
