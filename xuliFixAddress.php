<?php
session_start();
include 'pdo.php';
$user=$_SESSION['userlogin'];
$addr='Tỉnh/Thành Phố: '.$_POST['city'].',Quận/Huyện: '.$_POST['district'].',Phường/Xã: '.$_POST['ward'].',Ðịa chỉ: '.$_POST['txtaddress'];
$sql="update account set address='".$addr."' where id=".$user[7];	
pdo_execute($sql);
$_SESSION['userlogin']=array($user[0],$user[1],$user[2],$user[3],$addr,$user[5],$user[6],$user[7]);
$_SESSION['tb']=6;
echo '<script>location.replace("mensport.com?profile");</script>';	
?>