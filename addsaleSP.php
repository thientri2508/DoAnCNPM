<?php
session_start();
include 'pdo.php';
$ID=$_REQUEST['id'];
$flag=true;
$sql="select * from product where id='".$ID."'";
$sp=pdo_query_one($sql);
extract($sp);
if(!isset($_SESSION['CTKM'])) {$_SESSION['CTKM']=[];}
if(count($_SESSION['CTKM'])==0){
$sale=[$id,$name,$image,$price,1];
array_unshift($_SESSION['CTKM'],$sale);
}
else {
	foreach($_SESSION['CTKM'] as $s){
		if($s[0]==$ID) {
			$flag=false;
			break;
		}
	}
	if($flag==true) {
		$sale=[$id,$name,$image,$price,1];
		array_unshift($_SESSION['CTKM'],$sale);
	}
}
?>
