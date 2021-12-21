<?php
session_start();
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select * from image_adv where id=".$id;
$image=pdo_query_one($sql);
$file='photo/image_adv/'.$image["name"];
unlink($file);
$sql="delete from image_adv where id=".$id;
pdo_execute($sql);
$_SESSION['thongbaoad']=2;
echo '<script>location.replace("server.php?category=image");</script>';	
?>