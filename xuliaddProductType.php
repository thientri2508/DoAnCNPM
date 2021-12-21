<?php
session_start();
include 'pdo.php';
$name=$_POST['name'];
$size=$_POST['size'];
$sql="select name from product_type";
$list=pdo_query($sql);
$check=true;
foreach($list as $l){
	if($l["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="insert into product_type(name,size) values ('$name','$size')";
	pdo_execute($sql);
	$sql="select * from product_type where id=(select MAX(id) from product_type)";
	$t=pdo_query_one($sql);
	$id=$t["id"];
	$sql="select * from properties";
	$list1=pdo_query($sql);
	foreach($list1 as $l1){
		$n='attr-'.$l1["id"];
		if(isset($_POST[$n])) {
			$id_attr=$l1["id"];
			$sql="insert into properties_of_product_type(id_ProductType,id_Properties) values ('$id','$id_attr')";
			pdo_execute($sql);
		}
	}
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qllsp");</script>';	
}else{
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qllsp");</script>';	
}
?>