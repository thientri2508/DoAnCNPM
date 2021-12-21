<?php
session_start();
include 'pdo.php';
$name=$_POST['name'];
$sql="select name from properties";
$list=pdo_query($sql);
$check=true;
foreach($list as $l){
	if($l["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="insert into properties(name) values ('$name')";
	pdo_execute($sql);
	$sql="select * from properties where id=(select MAX(id) from properties)";
	$t=pdo_query_one($sql);
	$id=$t["id"];
	$sql="select * from detail_properties";
	$list1=pdo_query($sql);
	foreach($list1 as $l1){
		$sql="select * from set_properties where id_detail_properties=".$l1['id'];
		$check=pdo_query($sql);
		if(count($check)==0){
			$n='detail-'.$l1["id"];
			if(isset($_POST[$n])) {
				$id_detail=$l1["id"];
				$sql="insert into set_properties(id_properties,id_detail_properties) values ('$id','$id_detail')";
				pdo_execute($sql);
			}
		}
	}
	$_SESSION['thongbaoad']=10;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}else{
	$_SESSION['thongbaoad']=9;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}
?>