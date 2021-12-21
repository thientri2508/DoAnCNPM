<?php
session_start();
$id = $_REQUEST["id"];
$per= $_REQUEST['percent'];
$i=1;
foreach($_SESSION['CTKM'] as &$sale)
{
	if($i==$id) {$sale[4]=$per;
	break;}
	$i++;
}
unset($sale);
?>
