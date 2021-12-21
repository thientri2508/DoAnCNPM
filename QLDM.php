<?php
if(!isset($_GET['act'])) {
	include "QLDM-index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'addDM':
			include "addDM.php"; 
			break;
		case 'fixDM':
			include "fixDM.php"; 
			break;
		default:
			break;
		
	}
}
?>
