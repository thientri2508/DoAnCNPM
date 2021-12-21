<?php
$city=$_REQUEST['city'];
$district=$_REQUEST['district'];
include 'pdo.php';
if($district!='Quận/Huyện'){
	$sql="SELECT ward._name FROM ward,province,district WHERE province.id=ward._province_id AND district.id=ward._district_id AND province._name='".$city."' AND district._name='".$district."';";
	$ward=pdo_query($sql);
	echo '<option selected>Phường/Xã</option>';
	foreach($ward as $w){
		echo '<option>'.$w["_name"].'</option>';
	}
}else{
	echo '<option selected>Phường/Xã</option>';
}
?>