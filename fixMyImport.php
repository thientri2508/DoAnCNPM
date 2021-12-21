<?php
if(isset($_REQUEST['size'])) {
$id = $_REQUEST["id"];
$size = $_REQUEST["size"];
session_start();
$i=1;
foreach($_SESSION['myimport'] as &$sp)
{
	if($i==$id) { $sp[3]=$size;
	break;}
	$i++;
}
unset($sp);
}
else if(isset($_REQUEST['sl'])) {
$id = $_REQUEST["id"];
$sl = $_REQUEST["sl"];
session_start();
$i=1;
foreach($_SESSION['myimport'] as &$sp)
{
	if($i==$id) {$sp[4]=$sl;
	break;}
	$i++;
}
unset($sp);
}
?>
