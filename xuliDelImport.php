<?php
$id = $_REQUEST["id"];
session_start();
array_splice($_SESSION['myimport'],$id-1,1);
echo '<script>location.replace("server.php?category=import&&act=CT_import");</script>';	
?>
