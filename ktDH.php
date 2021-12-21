<?php
include 'pdo.php';
$sql="SELECT COUNT(*) FROM order_ticket";
$sl=pdo_query_one($sql);
echo $sl["COUNT(*)"];
?>