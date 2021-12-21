<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select * from properties where id=".$id;
$attr=pdo_query_one($sql);
$sql="SELECT detail_properties.name,detail_properties.image FROM detail_properties,properties,set_properties WHERE properties.id=".$id." AND set_properties.id_properties=properties.id AND set_properties.id_detail_properties=detail_properties.id";
$list=pdo_query($sql);
$width=225*count($list);
echo '
<div style="width:100%; height:700px; position:fixed">
	<div style="width:100%; height:120px">
		<button type="button" class="btn btn-danger" style="width:120px; height:60px; float:right; margin-top:30px; margin-right:50px" onclick="cancel()">CLOSE</button>
	</div>
	<div style="width:100%; height:500px; background:#ffc107">
		<div style="width:50%; height:150px; margin:auto">
			<h3 style="width:180px; height:60px; margin-top:60px; margin-left:27%; float:left">Thuộc Tính</h3>
			<button type="button" class="btn btn-success" style="width:200px; height:60px; font-size:24px; margin-top:50px; margin-left:20px; float:left"><b>'.$attr["name"].'</b></button>
		</div>
		<div style="width:900px; height:270px; margin:auto; background:#000000; overflow-x: scroll">
			<div style="width:'.$width.'px; height:100%">';
			foreach($list as $l){
				echo '<div style="width:200px; height:90%; margin-left:20px; float:left">
						<img src="photo/'.$l["image"].'" style="width:160px; height:160px; margin-top:25px; margin-left:20px"  />
						<h5 style="color:#FFF; margin-top:20px; width:100%; text-align: center">'.$l["name"].'</h5>
					  </div>';
			}	
			echo '</div>
		</div>
	</div>
</div>';
?>