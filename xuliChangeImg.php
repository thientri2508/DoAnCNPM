<?php
include 'pdo.php';
session_start();
$id1=$_REQUEST['id1'];
$id2=$_REQUEST['id2'];
$sql="update adv set id_img=".$id1." where id_adv=1 AND id_img=".$id2;
pdo_execute($sql);
$_SESSION['thongbaoad']=3;
echo '<script>location.replace("server.php?category=image");</script>';	
?>