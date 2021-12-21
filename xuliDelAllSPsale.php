<?php
session_start();
$_SESSION['CTKM']=[];
echo '<script>location.replace("server.php?category=sale-off&&act=saleSP");</script>';	
?>
