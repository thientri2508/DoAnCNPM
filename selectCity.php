<?php
$city=$_REQUEST['city'];
include 'pdo.php';
if($city!='Tỉnh/Thành Phố'){
	$sql="select district._name from district,province where province._name='".$city."' AND province.id=district._province_id";
	$district=pdo_query($sql);
	echo '<option selected>Quận/Huyện</option>';
	foreach($district as $d){
		echo '<option>'.$d["_name"].'</option>';
	}
}else{
	echo '<option selected>Quận/Huyện</option>';
}
?>