<?php
if(!isset($_GET['act'])) {
	include "promotions_index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'addCTKM':
			include "addPromotions.php"; 
			break;
		case 'fixCTKM':
			include "fixPromotions.php"; 
			break;
		default:
			break;
	}
}
?>
