<?php
include 'pdo.php';
session_start();
$id=$_REQUEST['id'];
$stt=$_REQUEST['stt'];
if($stt==1) {$sta='off';
	$_SESSION['thongbaoad']=1;}
else {$sta='on';
	$_SESSION['thongbaoad']=2;}
$sql="update account set status='".$sta."' where id=".$id;
pdo_execute($sql);
?>
