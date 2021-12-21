<?php
if(!isset($_GET['act'])) {
	include "QLSP-index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'addSP':
			include "addSP.php"; 
			break;
		case 'setupSP':
			include "setupSP.php"; 
			break;		
		case 'fixSP': 
			if(isset($_GET['ID'])&&($_GET['ID']>0)){
				$sql="select * from product where id=".$_GET['ID'];
				$sp=pdo_query_one($sql);
				extract($sp);
			}
			include "fixSP.php"; 
			break;
		default:
			break;
		
	}
}
?>
