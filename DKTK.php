<?php
session_start();
include 'pdo.php';
$tt=$_SESSION['TTTK'];
$sql="insert into account(username,password,fullname,phone,address,role,datesignup,status) values('$tt[0]','$tt[4]','$tt[1]','$tt[2]','$tt[3]','$tt[6]','$tt[5]','$tt[7]')";	
pdo_execute($sql);
unset($_SESSION['TTTK']);
$_SESSION['DKTC']=1;
echo '<script>location.replace("mensport.com?dangnhap");</script>';	
?>