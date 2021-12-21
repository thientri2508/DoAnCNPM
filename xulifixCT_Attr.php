<?php
	session_start();
	include 'pdo.php';
	$folder_path='photo/';
	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!="") {
	$file_path= $folder_path.$_FILES['image']['name'];
	$flag=true;
	if(file_exists($file_path)) {
	$_SESSION['thongbaoad']=4;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	$flag=false;
	}
	$ex = array('jpg','png','jpeg');
	$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
	if(!in_array($file_type,$ex)) {
	$_SESSION['thongbaoad']=5;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	$flag=false;
	}
	if($_FILES['image']['size']>500000){
	$_SESSION['thongbaoad']=5;
	echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	$flag=false;
	}
	if($flag){
	$id=$_POST['id'];
	$img=$_FILES['image']['name'];
	$name=$_POST['name'];
	$sql="select name from detail_properties where id!=".$id;
	$list=pdo_query($sql);
	$check=true;
	foreach($list as $l){
		if($l["name"]==$name){
			$check=false;
			break;
		}
	}
	if($check){
		move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
		$sql="update detail_properties set name='".$name."',image='".$img."' where id=".$id;
		pdo_execute($sql);
		$_SESSION['thongbaoad']=6;
		echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	}else {
		$_SESSION['thongbaoad']=14;
		echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	}
	}
}else{
	$img=$_FILES['image']['name'];
	$name=$_POST['name'];
	$id=$_POST['id'];
	$sql="select name from detail_properties where id!=".$id;
	$list=pdo_query($sql);
	$check=true;
	foreach($list as $l){
		if($l["name"]==$name){
			$check=false;
			break;
		}
	}
	if($check){
		$sql="update detail_properties set name='".$name."',image='".$img."' where id=".$id;
		pdo_execute($sql);
		$_SESSION['thongbaoad']=6;
		echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	}else {
		$_SESSION['thongbaoad']=14;
		echo '<script>location.replace("server.php?category=qlsp&&act=attribute");</script>';	
	}
}
?>
