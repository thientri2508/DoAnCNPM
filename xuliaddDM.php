<?php
session_start();
include 'pdo.php';
if(isset($_FILES['filephp']['name'])&&$_FILES['filephp']['name']!="") {
	$file_path= $_FILES['filephp']['name'];
	$flag=true;
	if(file_exists($file_path)) {
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	$flag=false;
	}
	$ex = array('php');
	$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
	if(!in_array($file_type,$ex)) {
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	$flag=false;
	}
	if($flag){
	$file=$_FILES['filephp']['name'];
	$name=$_POST['name'];
	$IDDM=$_POST['idDM'];
	$c=true;
	$sql="select * from category";
	$a=pdo_query($sql);
	foreach($a as $v){
		if($v["name"]==$name) {
			$c=false;
			break;
		}
		if($v["id"]==$IDDM) {
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
		$sql="insert into category(id,name,file_name,idProductType,stt) values('$IDDM','$name','$file','$IDtype','$stt')";	
		pdo_execute($sql);
		$_SESSION['thongbaoad']=3;	
		echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	}else{
		$_SESSION['thongbaoad']=4;
		echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	}
	}
}else{
	$file=$_FILES['filephp']['name'];
	$name=$_POST['name'];
	$IDDM=$_POST['idDM'];
	$c=true;
	$sql="select * from category";
	$a=pdo_query($sql);
	foreach($a as $v){
		if($v["name"]==$name) {
			$c=false;
			break;
		}
		if($v["id"]==$IDDM) {
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
		$sql="insert into category(id,name,file_name,idProductType,stt) values('$IDDM','$name','$file','$IDtype','$stt')";	
		pdo_execute($sql);
		$_SESSION['thongbaoad']=3;	
		echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	}else{
		$_SESSION['thongbaoad']=4;
		echo '<script>location.replace("server.php?category=qldm&&act=addDM");</script>';	
	}
}
?>