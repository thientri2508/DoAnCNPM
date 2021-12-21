<?php
$ID=$_REQUEST['id'];
include 'pdo.php';
$sql="select * from image_adv";
$list=pdo_query($sql);
echo '<div style="width:70%; margin-left:16%; height:660px; background:#FFFFFF; position:fixed; margin-top:40px">
		<h2 style="margin: auto; margin-top:20px; width:70%; text-align:center"><b>Chọn Hình Ảnh</b></h2>
		<div style="width:90%; height:500px; margin:auto; overflow-y: scroll">';
		foreach($list as $l){
			echo '<div style="width:440px; height:220px; margin-top:30px; margin-left:30px; position:relative; float: left" onmouseover="over1('.$l["id"].');" onmouseout="out1('.$l["id"].');">
			<img src="photo/image_adv/'.$l["name"].'" style="width:100%; height:100%" id="imgChange-'.$l["id"].'">
			<button class="btn btn-success" style="position:absolute; z-index:3; top:80px; display:none; left:170px; width:110px; height:60px" id="select-'.$l["id"].'" onclick="selectImg('.$l["id"].','.$ID.')"><b>CHỌN</b></button>
			</div>';
		}
echo 	'</div>
		<button class="btn btn-danger" style="margin-top:30px; width:130px; height:50px; margin-left:44%" onclick="closeChange()"><b>CANCEL</b></button>
	  </div>';	
?>