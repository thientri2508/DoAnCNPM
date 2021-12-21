<?php
include 'pdo.php';
$user=$_POST['user'];
$sql="select * from account where username='".$user."'";
$c=pdo_query($sql);
if(count($c)>0) echo '0';
else echo '1';
?>
