<?php
session_start();
include 'pdo.php';
$name=$_POST['name'];
$ID=$_POST['id'];
$size=$_POST['size'];
$sql="select name from product_type where id!=".$_POST['id'];
$list=pdo_query($sql);
$check=true;
foreach($list as $l){
	if($l["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="update product_type set name='".$name."', size='".$size."' where id=".$ID;
	pdo_execute($sql);
	$sql="select * from properties";
	$list1=pdo_query($sql);
	$sql="select * from properties_of_product_type where id_ProductType=".$ID;
	$list2=pdo_query($sql);
	foreach($list1 as $l1){
		$kt=true;
		foreach($list2 as $l2){
			if($l1["id"]==$l2["id_Properties"]) {
				$kt=false;
				break;
			}
		}
		if($kt){
			$n='attr-'.$l1["id"];
			if(isset($_POST[$n])) {
			$id_Properties=$l1["id"];
			$sql="insert into properties_of_product_type(id_ProductType,id_Properties) values ('$ID','$id_Properties')";
			pdo_execute($sql);}
		}else{
			$n='attr-'.$l1["id"];
			if(!isset($_POST[$n])) {
				$sql="delete from properties_of_product_type where id_ProductType=".$ID." AND id_Properties=".$l1["id"];
				pdo_execute($sql);}
		}
	}
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=qllsp");</script>';	
}else{
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qllsp");</script>';	
}
?>