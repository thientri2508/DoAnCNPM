<?php
if(!isset($_GET['act'])) {
	include "QLLSP-index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'attribute':
			include "attribute.php"; 
			break;	
		default:
			break;
		
	}
}
?>
