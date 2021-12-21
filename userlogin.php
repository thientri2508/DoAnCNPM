<?php
session_start();
$url=$_REQUEST['url'];
unset($_SESSION['userlogin']);
echo '<script>location.replace("'.$url.'");</script>';	
?>
