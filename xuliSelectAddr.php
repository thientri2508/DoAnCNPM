<?php
session_start();
include 'pdo.php';
$addr=$_REQUEST['addr'];
$user=$_SESSION['userlogin'];
$sql="update account set address='".$addr."' where id=".$user[7];
pdo_execute($sql);
$sql="update delivery_address set address='".$user[4]."' where id_user=".$user[7]." AND address='".$addr."'";
pdo_execute($sql);
$_SESSION['userlogin']=array($user[0],$user[1],$user[2],$user[3],$addr,$user[5],$user[6],$user[7]);
$_SESSION['tb']=14;
echo '<script>location.replace("mensport.com?profile&deliveryAddress");</script>';	
?>
