<?php
include 'pdo.php';
session_start();
$id=$_POST['idRole'];
$name=$_POST['nameRole'];
$sql="select * from role where id!='".$id."'";
$ds=pdo_query($sql);
$check=true;
foreach($ds as $d){
	if($d["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="update role set name='".$name."' where id='".$id."'";
	pdo_execute($sql);
	$sql="select * from category_admin";
	$list1=pdo_query($sql);
	$sql="select * from job where id_role='".$id."'";
	$list2=pdo_query($sql);
	foreach($list1 as $l1){
		$kt=true;
		foreach($list2 as $l2){
			if($l1["id"]==$l2["job"]) {
				$kt=false;
				break;
			}
		}
		if($kt){
			$n='role-'.$l1["id"];
			if(isset($_POST[$n])) {
			$id_cate=$l1["id"];
			$sql="insert into job(id_role,job) values ('$id','$id_cate')";
			pdo_execute($sql);}
		}else{
			$n='role-'.$l1["id"];
			if(!isset($_POST[$n])) {
				$sql="delete from job where id_role='".$id."' AND job=".$l1["id"];
				pdo_execute($sql);}
		}
	}
	$_SESSION['thongbaoad']=4;
	echo '<script>location.replace("server.php?category=role");</script>';	
}else{
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=role");</script>';	
}
?>
