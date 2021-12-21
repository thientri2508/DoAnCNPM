<?php
$ID = $_REQUEST["ID"];
$qty = $_REQUEST["qty"];
$size = $_REQUEST["size"];
$flag=true;
include "pdo.php";
$sql="select amount from warehouse where id_product=".$ID." and size='".$size."'";
$slsp=pdo_query_one($sql);
extract($slsp);
session_start();
if(!isset($_SESSION['mycartMini'])) {$_SESSION['mycartMini']=[];}
$sql="select * from product where id='".$ID."'";
$sp=pdo_query_one($sql);
extract($sp);

if(count($_SESSION['mycartMini'])>0){
	foreach($_SESSION['mycartMini'] as &$sp){
		if($sp[6]==$id&&$size==$sp[3]) {
			if($sp[4]+$qty<=$amount) {
				$sp[4]=$sp[4]+$qty;
				$sp[5]=$sp[4]*$price;
				}
			$flag=false;
			break;
		}
	}
	unset($sp);
}
if($flag==true){
	$total=$qty * $price;
	$cart=[$name,$price,$image,$size,$qty,$total,$id];
	array_unshift($_SESSION['mycartMini'],$cart);
}

foreach($_SESSION['mycartMini'] as $sp) {
	echo '<div style="width:100%">
     <div style="float:left; width:77px; margin-top:7px; height:77px; background:#E8E8E8">
	<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
	</div>
      <div style="float:left; width:64%; margin-top:7px; margin-left:12px">
      <div style="font-size:13px; color:#000"><b>'.$sp[0].'</b></div>
       <div style="font-size:11px; margin-top:12px; color:#000"><b>'.number_format($sp[1]).' VND</b></div>
       <div style="width:100%; height:15px">
      <div style="font-size:11px; float:left; color:#000">Size:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[3].'</div>
       </div>
       <div style="width:100%; height:15px; clear:both;">
         <div style="font-size:11px; float:left; color:#000">Số lượng:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[4].'</div>
        </div>
        </div>
       <div style="width:100%; border-top: dashed 2px #000; clear:both"></div>
        </div>';
}
?>
