<?php
session_start();
include 'pdo.php';
$user=$_SESSION['userlogin'];
$pass=md5($_POST['passad']);
$sql="update account set password='".$pass."' where id=".$user[7];	
pdo_execute($sql);
$_SESSION['userlogin']=array($user[0],$pass,$user[2],$user[3],$user[4],$user[5],$user[6],$user[7]);
$_SESSION['tb']=11;
echo '<script>location.replace("mensport.com?profile&changePass");</script>';	
?>
