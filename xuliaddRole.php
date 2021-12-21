<?php
include 'pdo.php';
session_start();
$id=$_POST['idRole'];
$name=$_POST['nameRole'];
$sql="select * from role";
$ds=pdo_query($sql);
$check=true;
foreach($ds as $d){
	if($d["id"]==$id||$d["name"]==$name){
		$check=false;
		break;
	}
}
if($check){
	$sql="insert into role(id,name) values('$id','$name')";
	pdo_execute($sql);
	$job=[];
	$sql="select * from category_admin";
	$cate=pdo_query($sql);
	$count=count($cate);
	for($i=1;$i<=$count;$i++)
	{
		$s='check-'.$i;
		if(isset($_POST[$s])) {
			$t=$_POST[$s];
			array_push($job,$t);
		}
	}
	foreach($job as $j){
		$sql="insert into job(id_role,job) values('$id','$j')";
		pdo_execute($sql);
	}
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=role");</script>';	
}else{
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=role");</script>';	
}
?>
