<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select * from promotions where id=".$id;
$promotions=pdo_query_one($sql);
echo '
<div style="width:60%; margin-left:22%; height:600px; background:#FFFFFF; position:fixed; margin-top:60px">
<h3 style="margin-top:30px; width:100%; text-align:center"><b>Chi Tiết Chương Trình Khuyến Mãi</b></h3>
<div style="width:50%; float:left; height:400px; margin-top:20px">
	<h5 style="margin-left:100px; margin-top:15px;">Tên Chương Trình</h5>
    <div style="margin-left:100px; font-size:18px;color:#ff5f17">'.$promotions["name"].'</div>
	 <h5 style="margin-left:100px; margin-top:15px;">Trạng Thái</h5>';
	if($promotions["status"]=='on') echo  '<div style="margin-left:100px; font-size:18px;color:#ff5f17">Đang áp dụng</div>';
    else echo '<div style="margin-left:100px; font-size:18px;color:#ff5f17">Không áp dụng</div>';
    echo '<h5 style="margin-left:100px; margin-top:15px;">Ngày Bắt Đầu</h5>
    <div style="margin-left:100px; font-size:18px;color:#ff5f17">'.$promotions["date_begin"].'</div>
    <h5 style="margin-left:100px; margin-top:15px;">Ngày Kết Thúc</h5>
    <div style="margin-left:100px; font-size:18px;color:#ff5f17">'.$promotions["date_end"].'</div>
</div>
<div style="width:50%; float:right; height:400px; margin-top:20px">
	<h5 style="margin-left:120px; margin-top:15px;">Nội Dung Chương Trình</h5>
	<div style="width:80%; height:330px; margin-left:40px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15)">';
		$sql="SELECT promotions_content.price_sale,promotions_content.apply FROM promotions_content,promotions,set_promotions WHERE promotions.id=set_promotions.id_promotions AND promotions_content.id=set_promotions.id_content AND promotions.id=".$id;
		$content=pdo_query($sql);
		foreach($content as $c){
			echo '<div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">- Giảm '.$c["price_sale"].' VNĐ cho hóa đơn tối thiểu '.$c["apply"].' VNĐ</div>';
		}
	echo '</div>
</div>
<button type="button" class="btn btn-danger" style="margin-left:42%; width:120px; height:50px; margin-top:30px" onclick="closeDetailPromotions()"><b>CLOSE</b></button>
</div>';
?>