<script>
document.getElementById("qlsp").style.background="#E8E8E8";
</script>
<p style="width:35%; font-feature-settings: 'kern'; font-size:22px; text-align:center; margin:auto; margin-top:50px">THIẾT LẬP THUỘC TÍNH SẢN PHẨM</p>
<form method="post" action="xuliSetupAttr.php">
<?php
$sql="SELECT properties.id,properties.name FROM properties,product,category,product_type,properties_of_product_type WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND properties_of_product_type.id_Properties=properties.id AND product.id=".$_GET['ID'];
$properties=pdo_query($sql);
foreach($properties as $p){
	echo '<div style="background:#FFFFFF; width:40%; float:left; height:100px;margin-left:75px; margin-top:40px; border-radius:20%">';
	echo '<h5 style="margin-left:40px; margin-top:13px">'.$p["name"].'</h5>';
	echo '<select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="attr-'.$p["id"].'">';
	$sql="SELECT detail_properties.id,detail_properties.name FROM set_properties,properties,detail_properties WHERE properties.id=".$p["id"]." AND properties.id=set_properties.id_properties AND set_properties.id_detail_properties=detail_properties.id";
	$detail_properties=pdo_query($sql);
	$flag=false;
	foreach($detail_properties as $detail){
		$sql="select * from detail_product where id_product=".$_GET['ID']." AND id_properties=".$p['id'];
		$ct=pdo_query_one($sql);
		if($detail['id']==$ct['id_detail_properties']) {
			echo '<option selected>'.$detail["name"].'</option>';
			$flag=true;
		} else echo '<option>'.$detail["name"].'</option>';
	}
	if($flag) echo '<option>none</option>';
	else echo '<option selected>none</option>';
	echo '</select>';
	echo '</div>';
}


?>
<input type="hidden" value="<?php echo $_GET['ID']; ?>" name="set"></input>
<div style="width:65%; height:250px; margin:auto; clear:both; position:relative">
<input type="submit" class="btn btn-outline-success" style="float:left; height:60px; width:25%; font-size:22px; border:solid 3px; margin-top:100px" value="Cập Nhật" ></input>
<button type="reset" class="btn btn-outline-warning" style="float:right; height:60px; width:25%; font-size:22px; border:solid 3px; margin-top:100px">Đặt Lại</button>
</form>
<a href="server.php?category=qlsp&&act=fixSP&&ID=<?php echo $_GET['ID']; ?>"><div class="back" style="top:115px"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>