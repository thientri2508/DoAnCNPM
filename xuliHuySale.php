<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select * from product where id=".$id;
$sp=pdo_query_one($sql);
extract($sp);
$normal=$price_sale;
$sale=0;
$sql="update product set price=".$normal.",price_sale=".$sale." where id=".$id;
pdo_execute($sql);	
$sql="update detail_product set id_detail_properties=0 where id_product=".$id." AND id_properties=2";
pdo_execute($sql);	
echo '<script>location.replace("server.php?category=sale-off&&act=saleSP");</script>';
?>
