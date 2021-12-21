<?php
$id = $_REQUEST["id"];
include 'pdo.php';
$sql="SELECT product_type.size FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$id;
$size=pdo_query_one($sql);
$sql="select * from product where id=".$id;
$product=pdo_query_one($sql);
extract($product);
	echo '<form method="post" action="changeSLSP.php">
			<input type="hidden" name="idSP" value="'.$id.'">';
	if($size["size"]=='number') {
		$sql="select * from warehouse where id_product=".$id;
		$slsp=pdo_query($sql);
		foreach($slsp as $sl){
		extract($sl);
		echo '<div style="margin-left:24px; margin-top:30px; width:100px; height:80px;border: #a3a3a3 1px solid; float:left">
					<div style="width:100%; margin:auto; margin-top:10px ;font-size:12px; text-align:center">
						<div><b>Size: '.$size.'</b></div>
						<div style="margin-top:10px"><b>SL: </b><input type="number" value="'.$amount.'" id="quantity" name="number-'.$size.'" min="0" max="1000" style="width:50px"></div>
					</div>
			 </div>';
		}
	}
	else { $sql="select * from warehouse where id_product=".$id;
			$slsp=pdo_query_one($sql);
			extract($slsp);
		echo '<div style="margin:auto; margin-top:70px; width:120px; height:120px;border: #a3a3a3 1px solid">
					<div style="width:100%; margin:auto; margin-top:20px ;font-size:14px; text-align:center">
						<div><b>Size: '.$size.'</b></div>
						<div style="margin-top:20px"><b>SL: <input type="number" value="'.$amount.'" id="quantity" name="freesize" min="0" max="1000" style="width:50px"></b></div>
					</div>
			 </div>';
	}
    echo '</div>';
	echo '<input type="submit" class="btn btn-success" value="Cập Nhật" style="width:120px; height:50px; margin-left:35%; margin-top:60px"></form>';
?>
