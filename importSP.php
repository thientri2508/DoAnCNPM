<?php
$ID = $_REQUEST["ID"];
include "pdo.php";
session_start();
if(!isset($_SESSION['myimport'])) {$_SESSION['myimport']=[];}
if(!isset($_SESSION['TotalImport'])) {$_SESSION['TotalImport']=0;}
$flag=true;
$size='35';
$free='freesize';
$price=0;
$qty=1;
$total=0;
$sql="SELECT product_type.size FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$ID;
$sz=pdo_query_one($sql);
$sql="select * from product where id='".$ID."'";
$sp=pdo_query_one($sql);
extract($sp);

//if(count($_SESSION['myimport'])>0){
//	foreach($_SESSION['myimport'] as &$sp){
//		if($sp[7]==$id) {
//			$sp[4]=$sp[4]+1;
//			$flag=false;
//			break;
//		}
//	}
//}
//
//if($flag==true) {
//	if($id_category==1){
//	$import=[$name,$price,$image,$size,$qty,$total,$id_category,$id];}
//	else {$import=[$name,$price,$image,$free,$qty,$total,$id_category,$id];}
//	array_unshift($_SESSION['myimport'],$import);
//}
if($sz["size"]=='number'){
	$import=[$name,0,$image,$size,$qty,0,$id_category,$id];}
	else {$import=[$name,0,$image,$free,$qty,0,$id_category,$id];}
	array_unshift($_SESSION['myimport'],$import);
?>
