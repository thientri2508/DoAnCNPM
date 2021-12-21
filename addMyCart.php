<?php
$ID = $_REQUEST["ID"];
$qty = $_REQUEST["qty"];
$size = $_REQUEST["size"];
$flag=true;
include "pdo.php";
$sql="select amount from warehouse where id_product=".$ID." and size='".$size."'";
$slsp=pdo_query_one($sql);
extract($slsp);
session_start();
if(!isset($_SESSION['mycart'])) {$_SESSION['mycart']=[];}
$sql="select * from product where id='".$ID."'";
$sp=pdo_query_one($sql);
extract($sp);

if(count($_SESSION['mycart'])>0){
	foreach($_SESSION['mycart'] as &$sp){
		if($sp[7]==$id&&$size==$sp[3]) {
			if($sp[4]+$qty<=$amount) {
				$sp[4]=$sp[4]+$qty;
				$sp[5]=$sp[4]*$price;
			}
			$flag=false;
			break;
		}
	}
}

if($flag==true) {
	$total=$qty * $price;
	$cart=[$name,$price,$image,$size,$qty,$total,$id_category,$id];
	array_unshift($_SESSION['mycart'],$cart);
	}
	$count=count($_SESSION['mycart']);
	echo $count.'<br /><i class="fas fa-shopping-bag"></i>';
?>
