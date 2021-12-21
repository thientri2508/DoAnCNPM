<script>
document.getElementById("role").style.background="#E8E8E8";
</script>
<?php
if(!isset($_GET['act'])) {
	include "role-index.php";
}
else {	
	$act=$_GET['act'];
	switch ($act){
		case 'addRole':
			include "addRole.php"; 
			break;
		case 'fixRole':
			include "fixRole.php"; 
			break;
		default:
			break;
		
	}
}
?>
