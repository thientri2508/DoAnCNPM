<?php
session_start();
include 'pdo.php';
if(isset($_FILES['filephp']['name'])&&$_FILES['filephp']['name']!="") {
	$file_path= $_FILES['filephp']['name'];
	$flag=true;
	if(file_exists($file_path)) {
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	$flag=false;
	}
	$ex = array('php');
	$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
	if(!in_array($file_type,$ex)) {
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	$flag=false;
	}
	if($flag){
	$file=$_FILES['filephp']['name'];
	$id=$_POST['idDM'];
	$idfix=$_POST['IDDM'];
	$name=$_POST['name'];
	$c=true;
	$sql="select * from category where id!='".$id."'";
	$a=pdo_query($sql);
	foreach($a as $v){
		if($v["name"]==$name) {
			$c=false;
			break;
		}
		if($v["id"]==$idfix) {
			$c=false;
			break;
		}
	}
	if($c==true){
		move_uploaded_file($_FILES['filephp']['tmp_name'],$file_path);
		$type=$_POST['productType'];
		$stt=$_POST['stt'];
		if($type=='none') $IDtype=0;
		else {
			$sql="select * from product_type where name='".$type."'";
			$t=pdo_query_one($sql);
			$IDtype=$t["id"];
		}
		$sql="update category set id='".$idfix."', name='".$name."',file_name='".$file."',idProductType='".$IDtype."',stt='".$stt."' where id='".$id."'";	
		pdo_execute($sql);
		$_SESSION['thongbaoad']=3;	
		echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	}else{
		$_SESSION['thongbaoad']=4;
		echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	}
	}
}else{
	$file=$_FILES['filephp']['name'];
	$name=$_POST['name'];
	$id=$_POST['idDM'];
	$idfix=$_POST['IDDM'];
	$c=true;
	$sql="select * from category where id!='".$id."'";
	$a=pdo_query($sql);
	foreach($a as $v){
		if($v["name"]==$name) {
			$c=false;
			break;
		}
		if($v["id"]==$idfix) {
			$c=false;
			break;
		}
	}
	if($c==true){
		$type=$_POST['productType'];
		$stt=$_POST['stt'];
		if($type=='none') $IDtype=0;
		else {
			$sql="select * from product_type where name='".$type."'";
			$t=pdo_query_one($sql);
			$IDtype=$t["id"];
		}
		if($file=='') $sql="update category set id='".$idfix."', name='".$name."',idProductType='".$IDtype."',stt='".$stt."' where id='".$id."'";	
		else $sql="update category set id='".$idfix."', name='".$name."',file_name='".$file."',idProductType='".$IDtype."',stt='".$stt."' where id='".$id."'";	
		pdo_execute($sql);
		$_SESSION['thongbaoad']=3;	
		echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	}else{
		$_SESSION['thongbaoad']=4;
		echo '<script>location.replace("server.php?category=qldm&&act=fixDM&&ID='.$_POST['idDM'].'");</script>';	
	}
}
?>