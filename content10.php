<script>
document.getElementById("slide").style.display='none';
document.title='My Account';
document.getElementById("content").style.height='900px';
</script>
<div class="left">
	<ul class="acc">
		<li>
			<a href="mensport.com?profile"><div class="chitietdanhmuc" style="margin-top:100px" id="myaccount">Tài Khoản Của Tôi</div></a>
			<a href="mensport.com?profile&changeInfor"><div class="chitietdanhmuc" id="changeinfor">Chỉnh Sửa Thông Tin Cá Nhân</div></a>
			<a href="mensport.com?profile&deliveryAddress"><div class="chitietdanhmuc" id="address">Địa Chỉ</div></a>
			<a href="mensport.com?profile&changePass"><div class="chitietdanhmuc" id="changepass">Đổi Mật Khẩu</div></a>
		</li>
	</ul>
</div>
<div class="right">
	<?php
		if(isset($_GET['changeInfor'])) {
			include 'changeInfor.php';
		} 
			else if(isset($_GET['changePass'])){
				include 'changePass.php';
			}
				else if(isset($_GET['deliveryAddress'])){
					include 'deliveryAddress.php';
				}
					else include 'MyAccount.php';
	?>
</div>