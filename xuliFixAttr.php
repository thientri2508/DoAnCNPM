<?php
session_start();
include 'pdo.php';
$name=$_POST['name'];
$ID=$_POST['id'];
$sql="select name from properties where id!=".$_POST['id'];
$list=pdo_query($sql);
$check=true;
foreach($list as $l){
	if($l["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="update properties set name='".$name."' where id=".$ID;
	pdo_execute($sql);
	$sql="SELECT detail_properties.id,detail_properties.name FROM detail_properties,properties,set_properties WHERE properties.id=set_properties.id_properties AND set_properties.id_detail_properties=detail_properties.id AND properties.id=".$_POST['id'];
	$res=pdo_query($sql);
	foreach($res as $r){
		$n='detail-'.$r["id"];
		if(!isset($_POST[$n])) {
			$sql="delete from set_properties where id_properties=".$_POST['id']." AND id_detail_properties=".$r['id'];
			pdo_execute($sql);
		}
	}
	$sql="select * from detail_properties";
	$list1=pdo_query($sql);
	foreach($list1 as $l1){
		$sql="select * from set_properties where id_detail_properties=".$l1['id'];
		$check=pdo_query($sql);
		if(count($check)==0){
			$n='detail-'.$l1["id"];
			if(isset($_POST[$n])) {
				$id_detail=$l1["id"];
				$sql="insert into set_properties(id_properties,id_detail_properties) values ('$ID','$id_detail')";
				pdo_execute($sql);
			}
		}
	}
	$_SESSION['thongbaoad']=11;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}else{
	$_SESSION['thongbaoad']=9;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
}
?>