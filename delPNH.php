<?php
include 'pdo.php';
session_start();
$id = $_REQUEST["id"];
$sql="delete from detail_import where id_import=".$id;
pdo_execute($sql);
$sql="delete from import where id=".$id;
pdo_execute($sql);
$_SESSION['thongbaoad']=1;
echo '<script>location.replace("server.php?category=DS_import");</script>';	
?>
