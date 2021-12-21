<?php
session_start();
include 'pdo.php';
$ad=$_SESSION['adminlogin'];
$name=$_POST['namead'];
$phone=$_POST['phonead'];
$addr=$_POST['addressad'];
$pass=md5($_POST['passad']);
$sql="update account set fullname='".$name."',phone='".$phone."',address='".$addr."',password='".$pass."' where id=".$ad[7];	
pdo_execute($sql);
$_SESSION['adminlogin']=array($ad[0],$pass,$name,$phone,$addr,$ad[5],$ad[6],$ad[7]);
$_SESSION['thongbaoad']=5;
echo '<script>location.replace("server.php?category=profile");</script>';	
?>
