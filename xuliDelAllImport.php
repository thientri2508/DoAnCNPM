<?php
session_start();
$_SESSION['myimport']=[];
echo '<script>location.replace("server.php?category=import&&act=CT_import");</script>';	
?>
