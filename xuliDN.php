<?php
include 'pdo.php';
session_start();
$tk=$_REQUEST['tk'];
$mk=md5($_REQUEST['mk']);
$sql="SELECT * FROM account WHERE username='".$tk."' AND password='".$mk."' AND role='user' AND del!='del'";
$check=pdo_query($sql);
if(count($check)>0){
	$sql="select * from account where username='".$tk."'";
	$acc=pdo_query_one($sql);
	extract($acc);
	if($status=='on'){
	$_SESSION['userlogin']=array($username,$password,$fullname,$phone,$address,$role,$datesignup,$id);
	$_SESSION['tb']=1;
	echo '<script>location.replace("mensport.com");</script>';
	}
	else {$_SESSION['tb']=9;
	echo '<script>location.replace("mensport.com?dangnhap");</script>';	}
}else {
	$_SESSION['tb']=10;
	echo '<script>location.replace("mensport.com?dangnhap");</script>';
}
?>
