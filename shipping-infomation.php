<?php
if(!isset($_SESSION['mycart'])||!isset($_SESSION['userlogin'])) {
	echo '<script>location.replace("mensport.com?giohang");</script>';	
}
if(count($_SESSION['mycart'])==0) {
	echo '<script>location.replace("mensport.com?giohang");</script>';	
}
$user=$_SESSION['userlogin'];
?>
<script>
document.getElementById("slide").style.display="none";
document.title="Thông Tin Mua Hàng";
document.getElementById("content").style.height="1100px";
function dathang(){
location.replace("xulithanhtoan.php");
}
</script>
<div style="width:100%; height:950px; margin-top:35px">
	 <div style="height:100%; width:60%; float:left">
     	<div style="background:#E8E8E8; width:95%; height:47px; font-feature-settings: 'kern'; font-size:22px; line-height:47px; padding-left:20px"><b>THÔNG TIN GIAO HÀNG</b></div>
        <p style="margin-top:30px; margin-left:20px; font-size:16px"><b>HỌ TÊN</b></p>
        <div style="margin-left:20px; width:75%; border:1px solid #ccc; font-size:18px; font-style:italic"><?php echo $user[2] ?></div>
        <p style="margin-top:30px; margin-left:20px; font-size:16px"><b>Số điện Thoại</b></p>
        <div style="margin-left:20px; width:75%; border:1px solid #ccc; font-size:18px; font-style:italic"><?php echo $user[3] ?></div>
        <p style="margin-top:30px; margin-left:20px; font-size:16px"><b>Email</b></p>
        <div style="margin-left:20px; width:75%; border:1px solid #ccc; font-size:18px; font-style:italic"><?php echo $user[0] ?></div>
        <p style="margin-top:30px; margin-left:20px; font-size:16px"><b>Địa chỉ</b></p>
        <div style="margin-left:20px; width:75%; border:1px solid #ccc; font-size:18px; font-style:italic"><?php echo $user[4] ?></div>
        <div style="margin-top:30px; width:95%; height:40px">
        	<i class="far fa-2x fa-edit" style="margin-left:20px; float:left"></i>
            <a href="mensport.com?profile"><p class="editTT"><b>Chỉnh Sửa Thông Tin</b></p></a>
        </div>
        
    	<div style="background:#E8E8E8; width:95%; height:47px; margin-top:40px; font-feature-settings: 'kern'; font-size:22px; line-height:47px; padding-left:20px"><b>PHƯƠNG THỨC GIAO HÀNG</b></div>
        <div style="margin-top:40px; width:95%; height:40px">
        	<i class="far fa-2x fa-check-square" style="margin-left:20px; float:left"></i>
            <p style="margin-left:40px; float:left; margin-top:4px">Tốc độ tiêu chuẩn (từ 2 - 5 ngày làm việc)</p>
            <p style="float:right; margin-top:4px"><b>Miễn Phí</b></p>
        </div>
        <div style="background:#E8E8E8; width:95%; height:47px; margin-top:40px; font-feature-settings: 'kern'; font-size:22px; line-height:47px; padding-left:20px"><b>PHƯƠNG THỨC THANH TOÁN</b></div>
        <div style="margin-top:40px; width:95%; height:40px">
        	<i class="far fa-2x fa-check-square" style="margin-left:20px; float:left"></i>
            <p style="margin-left:40px; float:left; margin-top:4px">Thanh toán trực tiếp khi giao hàng</p>
            <img src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/icon_COD.svg" style="margin-left:30px; margin-top:8px">
        </div>
     </div>
     <div style="height:950px; width:40%; float:right; background:#E8E8E8" >
     	<div style="font-size:22px;font-feature-settings: 'kern'; margin-left:20px; margin-top:15px"><b>ĐƠN HÀNG</b></div>
        <div style="margin-left:20px; width:89%; border-top:solid 2px; margin-top:10px"></div>
        <div style="margin-left:20px; width:89%; height:400px; overflow-y:scroll; margin-top:20px">
        <?php
		$tt=0;
        foreach($_SESSION['mycart'] as $sp)
		{
			$tt+=$sp[5];
        	echo '<div style="width:100%">
            	<div style="width:100%; height:auto">
                    <div style="float:left; width:60%; font-size:18px; color:#808080"><b>'.$sp[0].'</b></div>
                    <div style="float:right; width:40%; font-size:17px; color:#808080"> 
                    	<div style="float:right">'.number_format($sp[1]).' VND</div>
                    </div>
                </div>
                <div style="width:100%">
                    <div style="float:left; width:60%; margin-bottom:20px; font-size:17px; color:#808080">Size: '.$sp[3].'</div>
                    <div style="float:right; width:40%; margin-bottom:20px; font-size:17px; color:#808080">x '.$sp[4].'</div>
                </div>
            </div>';
		}
          ?>    
        </div>
        <?php
		$sql="select * from promotions where status='on'";
		$promotions=pdo_query_one($sql);
		$price_sale=0;
		$ctkm='Không áp dụng';
		if($promotions!='') {
			$sql="SELECT promotions_content.price_sale,promotions_content.apply FROM promotions,promotions_content,set_promotions WHERE promotions.id=set_promotions.id_promotions AND promotions_content.id=set_promotions.id_content AND promotions.id=".$promotions['id']." ORDER BY promotions_content.apply ASC";
			$content=pdo_query($sql);
			foreach($content as $c){
				if($tt>=$c["apply"]) {
					$price_sale=$c["price_sale"];
					$ctkm='Đang áp dụng';
				}
			}
		}
		?>
        <div style="width:89%; border-top:dashed 2px; opacity:0.5; margin-top:23px; margin-left:20px"></div>
        <div style="width:89%; margin-left:20px; margin-top:35px; height:30px">
        	<div style="float:left; width:20%; font-size:18px; color:#808080"><b>Đơn hàng</b></div>
            <div style="float:right; width:80%; font-size:18px; color:#808080">
            	<div style="float:right"><b><?php echo number_format($tt) ?> VND</b></div>
            </div>
        </div>
        <div style="width:89%; margin-left:20px; height:30px">
        	<div style="float:left; width:60%; font-size:18px; color:#808080"><b>Chương Trình Khuyến Mãi</b></div>
            <div style="float:right; width:40%; font-size:18px; color:#808080">
            	<div style="float:right"><i><?php echo $ctkm ?></i></div>
            </div>
        </div>
        <div style="width:89%; margin-left:20px; height:40px">
        	<div style="float:left; width:20%; font-size:18px; color:#808080"><b>Giảm</b></div>
            <div style="float:right; width:80%; font-size:18px; color:#808080">
				<div style="float:right">- <?php echo number_format($price_sale) ?> VND</div>
            </div>
        </div>
         <div style="width:89%; margin-left:20px; height:30px">
        	<div style="float:left; width:80%; font-size:18px"><b>Phí vận chuyển</b></div>
            <div style="float:right; width:20%; font-size:18px">
            	<div style="float:right">0 VND</div>
            </div>
        </div>
        <?php
		$tt-=$price_sale;
		?>
        <div style="width:89%; border-top:dashed 2px; opacity:0.5; margin-top:30px; margin-left:20px"></div>
        <div style="width:89%; margin-left:20px; margin-top:30px; height:30px">
        	<div style="float:left; width:30%; font-size:18px"><b>TỔNG CỘNG</b></div>
            <div style="float:right; width:70%; font-size:18px; color:#ff5f17">
            	<div style="float:right"><b><?php echo number_format($tt) ?> VND</b></div>
            </div>
        </div>
        <div style="background:#f15e2c; width:89%; height:80px; line-height:80px; text-align:center; cursor:pointer; margin-left:20px; margin-top:30px; font-size:23px; color:#FFF;font-feature-settings: 'kern'" onClick="dathang()"><b>HOÀN TẤT ĐẶT HÀNG</b></div>
     </div>
	
</div>