<?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
include 'pdo.php';
$sql="select * from import where date_import between '".$from."' and '".$to."'";
$im=pdo_query($sql);
$import=array_reverse($im);
foreach($import as $t)
{
	extract($t);
	$sql="select fullname from account where id=".$id_account;
	$acc=pdo_query_one($sql);
	extract($acc);
	if($status=='Đã xử lý') {
		echo '<div style="width:100%; height:210px; margin-top:30px; border-bottom: dashed 2px;border-top : dashed 2px;" id="PNH-'.$id.'"> 
				<div style="float:left; height:100%; width:37%; margin-left:20px">
					<div class="DS_TT"><b>ID Phiếu Nhập Hàng</b></div>
					<div class="DS_TT1">'.$id.'</div>
					<div class="DS_TT"><b>Nhân Viên Nhập Hàng</b></div>
					<div class="DS_TT1">'.$fullname.'</div>
					<div class="DS_TT"><b>Ngày Nhập Hàng</b></div>
					<div class="DS_TT1">'.$date_import.'</div>
				</div>
                <div style="float:left; height:100%; width:37%; margin-left:20px">
                    <div class="DS_TT"><b>Nhà Cung Cấp</b></div>
                    <div class="DS_TT1">'.$supplier.'</div>
                    <div class="DS_TT"><b>Trạng Thái</b></div>
                    <div class="DS_TT1">'.$status.'</div>
                    <div class="DS_TT"><b>Tổng Tiền</b></div>
                    <div class="DS_TT1">'.$total.' VNĐ</div>
                </div>
                <div style="float:right; height:100%; width:17%">
                    <img src="photo/PDH.png" style="width:100%; height:50%"  />
                    <img src="photo/detail.png" style="width:65px; height:65px; margin-left:25px; margin-top:20px; cursor:pointer" onclick="CTPNH('.$id.')"  />
                </div>
			</div>';
				}else{
		echo '<div style="width:100%; height:210px; margin-top:30px; border-bottom: dashed 2px;border-top : dashed 2px;" id="PNH-'.$id.'"> 
				<div style="float:left; height:100%; width:37%; margin-left:20px">
					<div class="DS_TT"><b>ID Phiếu Nhập Hàng</b></div>
					<div class="DS_TT1">'.$id.'</div>
					<div class="DS_TT"><b>Nhân Viên Nhập Hàng</b></div>
					<div class="DS_TT1">'.$fullname.'</div>
					<div class="DS_TT"><b>Ngày Nhập Hàng</b></div>
					<div class="DS_TT1">'.$date_import.'</div>
				</div>
				<div style="float:left; height:100%; width:37%; margin-left:20px">
					<div class="DS_TT"><b>Nhà Cung Cấp</b></div>
					<div class="DS_TT1">'.$supplier.'</div>
					<div class="DS_TT"><b>Trạng Thái</b></div>
					<div class="DS_TT1">'.$status.'</div>
					<div class="DS_TT"><b>Tổng Tiền</b></div>
					<div class="DS_TT1">Chờ xử lý</div>
				</div>
				<div style="float:right; height:100%; width:17%">
					<img src="photo/cancel.png" style="width:70px; height:65px; margin-left:10px; margin-top:20px; cursor:pointer" />
					<img src="photo/detail.png" style="width:65px; height:65px; margin-left:25px; margin-top:20px; cursor:pointer" onclick="CTPNH('.$id.')"  />
				</div>
			</div>';
				}
}
?>
