<script>
document.getElementById("slide").style.display="none";
document.title="Danh Sách Đơn Đặt Hàng";
document.getElementById("content").style.height="380px";
</script>
<?php
if(isset($_SESSION['userlogin'])) {
	$user=$_SESSION['userlogin'];
	$IdUser=$user[7];
	$sql="select * from order_ticket where id_user='".$IdUser."'";
	$order=pdo_query($sql);
	if(count($order)==0) {
		echo '<div style="width:100%; height:380px">
	<h3 class="titleCart" style="width:50%"><b>DANH SÁCH ĐƠN ĐẶT HÀNG</b></h3>
	<hr size="3.5px" style="opacity:1; color:#000; background:#000"  />
	<p class="alertCart">Bạn đang không có đơn đặt hàng nào!</p>
	<a href="mensport.com?giohang"><div class="return"><b>QUAY LẠI GIỎ HÀNG</b></div></a>
	</div>';
	}
	else {
		include 'DS_order.php';
	}

}
else {
	echo '<div style="width:100%; height:380px">
	<p class="alertCart">Vui lòng đăng nhập để xem danh sách đơn đặt hàng của bạn!</p>
	<hr size="3.5px" style="opacity:1; color:#000; background:#000"  />
	<a href="mensport.com?dangnhap"><div class="return"><b>QUAY LẠI ĐĂNG NHẬP</b></div></a>
	</div>';
	}
?>
