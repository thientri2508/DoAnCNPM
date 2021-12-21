<?php
$q = $_REQUEST["q"];
include "pdo.php";
$sql="SELECT product.id,product.name,product.price,product.image,product.price_sale FROM product,detail_product WHERE del!='del' AND product.id=detail_product.id_product AND detail_product.id_properties=2 AND detail_product.id_detail_properties=18";
$sp=pdo_query($sql);
	echo '<div style="width:100%; margin:auto; height:530px">';
	$numItems = count($sp);
	$start=($q-1)*12;
	$end=$start+12;
	if($end>$numItems) {$end=$numItems;}
    	for($i=$start;$i<$end;$i++)
   		{
			extract($sp[$i]);
			$sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $stt=pdo_query_one($sql);
		  	echo '<div class="SPsearch" style="float:left; margin-left:10px" id="img'.$id.'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="mensport.com?product-detail='.$id.'"><div class="imgSPsearch"> 
            	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$id.'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status">'.$stt["name"].'</p>
            <a href="mensport.com?product-detail='.$id.'"><h5 class="nameSP"><b>'.$name.'</b></h5></a>
            <div class="priceSPsearch"><b>'.number_format($price_sale).' VND</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<del style="color:#808080; font-size:16px">'.number_format($price).' VND</del></div>
       		</div>';
			
			
		
		}
	echo '</div>';
?>
