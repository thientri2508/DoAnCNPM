<?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
include 'pdo.php';
	$sql="select * from order_ticket where date_order between '".$from."' and '".$to."'";
	$order=pdo_query($sql);
	$dh=array_reverse($order);
	foreach($dh as $t) 
	{
	extract($t);
	$sql="select fullname,address,phone from account where id=".$id_user;
			$acc=pdo_query_one($sql);
			extract($acc);
			$sql="select * from detail_order_ticket where id_order=".$id_order;
			$slsp=pdo_query($sql);
			echo '<div style="width:100%; height:280px; margin-top:30px; border-bottom: solid 3px;border-top : solid 3px;" id="DH-'.$id_order.'"> 
				<div style="float:left; height:100%; width:30%; margin-left:20px">
					<div class="DS_TT" style="color:#808080; margin-top:40px"><b>ID Đơn Hàng</b></div>
					<div class="DS_TT1">'.$id_order.'</div>
					<div class="DS_TT" style="color:#808080"><b>Ngày Đặt Hàng</b></div>
					<div class="DS_TT1">'.$date_order.'</div>
					<div class="DS_TT" style="color:#808080"><b>Ngày Giao Hàng</b></div>
					<div class="DS_TT1">'.$date_ship.'</div>
				</div>
				 <div style="float:left; height:100%; width:40%; margin-left:20px">
					
					<div class="DS_TT" style="color:#808080; margin-top:40px"><b>Trạng Thái Đơn Hàng</b></div>
					<div class="DS_TT1">'.$status.'</div>
					<div class="DS_TT" style="color:#808080"><b>Chương Trình Khuyến Mãi</b></div>';
					if($id_promotions==0) echo '<div class="DS_TT1">không áp dụng</div>';
					else {
					    $sql="select name from promotions where id=".$id_promotions;
					    $promotions_name=pdo_query_one($sql);
					    echo '<div class="DS_TT1">'.$promotions_name["name"].'</div>';
					}
				echo '<div class="DS_TT" style="font-size:18px"><b>Tổng Tiền</b></div>
					<div class="DS_TT1" style="font-size:18px; color:#ff5f17"><b>'.$total.' VND<b></div>
				</div>
				<div style="float:right; height:100%; width:20%">
					<button type="button" class="btn btn-info" style="margin-top:40px; height:60px" onclick="CTDH('.$id_order.')"><b>Xem Chi Tiết</b></button>';
					if($status=='chờ xác nhận') echo '<button type="button" class="btn btn-warning" style="margin-top:50px; height:60px; width:120px" onclick="xacnhanDH('.$id_order.')"><b>Xác Nhận</b></button>';
					else echo '<img src="photo/checked.png" style="margin-top:25px; height:100px; width:100px; margin-left:10px" />';
				echo '</div>
				</div>';
	}

?>
