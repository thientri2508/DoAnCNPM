<?php
session_start();
include 'pdo.php';
$username=$_POST['email'];
$sql="select * from account where username='".$username."'";
$check=pdo_query_one($sql);
if($check=='')
{
	$name=$_POST['txtname'];
	$phone=$_POST['txtphone'];
	$addr='Tỉnh/Thành Phố: '.$_POST['city'].',Quận/Huyện: '.$_POST['district'].',Phường/Xã: '.$_POST['ward'].',Ðịa chỉ: '.$_POST['txtaddress'];
	$pass=$_POST['txtpass'];
	$p=md5($pass);
	$date=date("d/m/Y");
	$role='user';
	$stt='on';
	$tt=[$username,$name,$phone,$addr,$p,$date,$role,$stt];
	$_SESSION['TTTK']=$tt;
	echo '<script>location.replace("mensport.com?verify");</script>';	
}else{
	$_SESSION['DKTC']=1;
	echo '<script>window.history.back();</script>';	
}
?>
