<?php
session_start();
include 'pdo.php';
$user=$_SESSION['userlogin'];
$addr='Tỉnh/Thành Phố: '.$_POST['city'].',Quận/Huyện: '.$_POST['district'].',Phường/Xã: '.$_POST['ward'].',Ðịa chỉ: '.$_POST['txtaddress'];
$sql="select * from delivery_address where id_user=".$user[7]." AND address='".$addr."'";	
$check=pdo_query_one($sql);
if($check=='')
{
    $sql="insert into delivery_address(id_user,address) VALUES ('$user[7]','$addr')";
    pdo_execute($sql);
    $_SESSION['tb']=12;
}else{
    $_SESSION['tb']=13;
}
echo '<script>location.replace("mensport.com?profile&deliveryAddress");</script>';	
?>
