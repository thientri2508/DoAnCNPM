<?php
session_start();
include 'pdo.php';
$username=$_REQUEST['mail'];
$sql="select * from account where username='".$username."'";
$check=pdo_query_one($sql);
if($check!=''){
	$t='123456';
	$newpass=md5($t);
	$sql="update account set password='".$newpass."' where username='".$username."'";
	pdo_execute($sql);
	$_SESSION['FP']=$username;
	echo '<script>location.replace("mensport.com?dangnhap");</script>';	
}else{
	$_SESSION['DKTC']=1;
	echo '<script>location.replace("mensport.com?forgotpassword");</script>';	
}
?>