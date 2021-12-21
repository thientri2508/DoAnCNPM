<?php
session_start();
include 'pdo.php';
$user=$_SESSION['userlogin'];
$name=$_POST['namead'];
$phone=$_POST['phonead'];
//$pass=md5($_POST['passad']);
$sql="update account set fullname='".$name."',phone='".$phone."' where id=".$user[7];	
pdo_execute($sql);
$_SESSION['userlogin']=array($user[0],$user[1],$name,$phone,$user[4],$user[5],$user[6],$user[7]);
$_SESSION['tb']=6;
echo '<script>location.replace("mensport.com?profile&changeInfor");</script>';	
?>
