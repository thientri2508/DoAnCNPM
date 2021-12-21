<?php
$id = $_REQUEST["id"];
$ID = $_REQUEST["id"];
include "pdo.php";
$sql="select * from detail_import where id_import=".$id;
$import=pdo_query($sql);
echo '<div style="width:90%; margin:auto; height:500px; margin-top:20px; overflow-y:scroll">';
foreach($import as $ct)
{
	extract($ct);
	$sql="select id, name, image from product where id=".$id_product;
	$sp=pdo_query_one($sql);
	extract($sp);
		echo '<div style="width:100%; height:140px; border-top:dashed 2px #FFFFFF;border-bottom:dashed 2px #FFFFFF; margin-top:15px">
        	<div style="width:23%; height:60%; float:left; background:#FFF; margin-top:25px; margin-left:10px">
            	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
            </div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #FFFFFF; margin-top:12px; margin-left:10px">
            	<div class="CTPNH"><b>ID Sản Phẩm</b></div>
                <div class="CTPNH">'.$id.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Tên Sản Phẩm</b></div>
                <div class="CTPNH">'.$name.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Giá Nhập Sản Phẩm</b></div>';
            if($price==0) echo '<div class="CTPNH">Chờ xử lý</div>';
            else echo '<div class="CTPNH">'.$price.' VNĐ</div>';    
            echo '</div>
            <div style="width:33%; height:80%; float:left; border-left:solid 1px #FFFFFF; margin-top:12px; margin-left:10px">
            	<div class="CTPNH"><b>SIZE</b></div>
                <div class="CTPNH">'.$size.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Số Lượng</b></div>
                <div class="CTPNH">'.$amount.'</div>
                <div class="CTPNH" style="margin-top:10px"><b>Tổng Tiền</b></div>';
            if($total==0) echo '<div class="CTPNH">Chờ xử lý</div>';
            else echo '<div class="CTPNH">'.$total.' VNĐ</div>';    
            echo '</div>  
        </div>';
}
$sql="select * from import where id=".$ID;
$notee=pdo_query_one($sql);
extract($notee);
echo '</div>
		<div style="color:#fff; margin-top:10px; margin-left:20px; font-size:22px"><b>Ghi Chú</b></div>
      <textarea class="form-control" id="exampleFormControlTextarea1" readonly="readonly" rows="3" style="background:#FFF; width:90%; margin:auto; height:180px; margin-top:10px">'.$note.'</textarea>';	
?>
