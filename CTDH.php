<?php
$id = $_REQUEST["id"];
$ID = $_REQUEST["id"];
include "pdo.php";
$sql="select * from detail_order_ticket where id_order=".$id;
$order=pdo_query($sql);
echo '<div style="width:90%; margin:auto; height:500px; margin-top:20px; overflow-y:scroll">';
foreach($order as $ct)
{
	extract($ct);
	$sql="select id, name, image from product where id=".$id_product;
	$sp=pdo_query_one($sql);
	extract($sp);
		echo '<div style="width:100%; height:140px; border-top:dashed 2px #000;border-bottom:dashed 2px #000; margin-top:15px">
        	<div style="width:23%; height:60%; float:left; background:#FFF; margin-top:25px; margin-left:10px">
            	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
            </div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #000; margin-top:12px; margin-left:10px">
            	<div class="CTDH1"><b>ID Sản Phẩm</b></div>
                <div class="CTDH1">'.$id.'</div>
                <div class="CTDH1" style="margin-top:10px"><b>Tên Sản Phẩm</b></div>
                <div class="CTDH1">'.$name.'</div>
                <div class="CTDH1" style="margin-top:10px"><b>Giá Sản Phẩm</b></div>
                <div class="CTDH1">'.number_format($price).' VND</div>
            </div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #000; margin-top:12px; margin-left:10px">
            	<div class="CTDH1"><b>SIZE</b></div>
                <div class="CTDH1">'.$size.'</div>
                <div class="CTDH1" style="margin-top:10px"><b>Số Lượng</b></div>
                <div class="CTDH1">'.$amount.'</div>
                <div class="CTDH1" style="margin-top:10px"><b>Tổng Tiền</b></div>
                <div class="CTDH1">'.number_format($total).' VND</div>
            </div>  
        </div>';
}
$sql="select * from order_ticket where id_order=".$ID;
$notee=pdo_query_one($sql);
extract($notee);
echo '</div>
		<div style="color:#000; margin-top:10px; margin-left:20px; font-size:22px"><b>Ghi Chú</b></div>
      <textarea class="form-control" id="exampleFormControlTextarea1" readonly="readonly" rows="3" style="background:#FFF; width:90%; margin:auto; height:180px; margin-top:10px">'.$note.'</textarea>';	
?>
