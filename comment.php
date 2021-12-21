<?php
include 'pdo.php';
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$user=$_SESSION['userlogin'];
$c=$_REQUEST['c'];
$id=$_REQUEST['id'];
$date=date('d/m/Y - H:i:s');
$sql="insert into comment(id_account,name,id_product,date,content) values('$user[7]','$user[2]','$id','$date','$c')";	
pdo_execute($sql);
?>
