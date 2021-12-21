<?php
include 'pdo.php';
$id=$_POST['set'];
$sql="SELECT properties.id,properties.name FROM properties,product,category,product_type,properties_of_product_type WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND properties_of_product_type.id_Properties=properties.id AND product.id=".$id;
$properties=pdo_query($sql);
foreach($properties as $p){
	$id_attr=$p["id"];
	$detail=$_POST['attr-'.$id_attr];
	$sql="select * from detail_product where id_product=".$id." AND id_properties=".$id_attr;
	$kt=pdo_query($sql);
	if(count($kt)==0){
		if($detail=='none'){
			$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values ('$id','$id_attr','0')";
			pdo_execute($sql);	
		}else{
			$sql="select id from detail_properties where name='".$detail."'";
			$IDdetail_properties=pdo_query_one($sql);
			$ID=$IDdetail_properties["id"];
			$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values ('$id','$id_attr','$ID')";
			pdo_execute($sql);	
		}
	}else{
		if($detail=='none'){
			$sql="update detail_product set id_detail_properties='0' where id_product=".$id." AND id_properties=".$id_attr;
			pdo_execute($sql);
		}else{
			$sql="select id from detail_properties where name='".$detail."'";
			$IDdetail_properties=pdo_query_one($sql);
			$ID=$IDdetail_properties["id"];
			$sql="update detail_product set id_detail_properties='".$ID."' where id_product=".$id." AND id_properties=".$id_attr;
			pdo_execute($sql);
		}
	}
}
session_start();
$_SESSION['thongbaoad']=5;
echo '<script>location.replace("server.php?category=qlsp&&act=fixSP&&ID='.$id.'");</script>';
?>