<?php
$q = $_REQUEST["q"];
$category = $_REQUEST["category"];
$attr = $_REQUEST["attr"];
 include "pdo.php";
 session_start();
 $_SESSION['page']=$q;
 	$s="";
	$product=array();
 	$sql="SELECT id_product from detail_product WHERE id_detail_properties=18";
	$id_sale=pdo_query($sql);
	foreach($id_sale as $sale){
		extract($sale);
		$s.=" AND id!=".$id_product;
	}
	if($attr!="") {
		$IDattribute=explode(' ', $attr);
		$sql='SELECT id_product,COUNT(id_product) from detail_product WHERE ';
		for($i=0;$i<count($IDattribute);$i++)
		{
			if($i==count($IDattribute)-1) $sql.='id_detail_properties='.$IDattribute[$i]. ' GROUP BY id_product';
			else $sql.='id_detail_properties='.$IDattribute[$i].' OR ';
		}
		$temp=pdo_query($sql);
		foreach($temp as $t){
			if($t["COUNT(id_product)"]==count($IDattribute)) {
				$sql="select * from product where id_category='".$category."' AND del!='del' AND id=".$t['id_product'];
				$sp=pdo_query_one($sql);
				if($sp!='') {
					$sql="SELECT detail_product.id_detail_properties from detail_product WHERE detail_product.id_product=".$sp['id']." AND detail_product.id_properties=2";
					$check=pdo_query_one($sql);
					if($check["id_detail_properties"]!=18) array_push($product,$sp);
				}
			}
		}
	}else{
		$sql="select * from product where id_category='".$category."' AND del!='del'".$s;
    	$product=pdo_query($sql);
	}
	echo '<div style="width:100%; margin:auto; height:475px">';
	$start=($q-1)*12;
	$end=$start+12;
	$product=array_reverse($product);
	if($end>count($product)) {$end=count($product);}
    	for($i=$start;$i<$end;$i++)
   		{
		  extract($product[$i]);
		  $sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $stt=pdo_query_one($sql);
		  echo '<div class="SP" style="float:left; margin-left:13px" id="img'.$id.'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="mensport.com?product-detail='.$id.'"><div class="imgSP"> 
            	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$id.'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>';
			if($stt=='') echo '<p class="status"></p>';
            else echo '<p class="status">'.$stt["name"].'</p>';
            echo '<div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:10px"></div>
            <a href="mensport.com?product-detail='.$id.'"><h5 class="nameSP"><b>'.$name.'</b></h5></a>
            <h5 class="price"><b>'.number_format($price).' VND</b></h5>
       		</div>';
		}
		if(count($product)==0) echo '<img src="photo/empty.jpg" style="margin-left:28%; width:50%" />
										<h4 style="margin-left:33.5%; margin-top:-40px">Không Tìm Thấy Sản Phẩm Nào!</h4>';
	echo '</div>';
?>
