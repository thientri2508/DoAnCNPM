<script>
function TKDT(){
window.location.assign("server.php?category=revenue");
}
</script>
<div style="width:100%; height:900px">
<div class="titleFont">Men Sport Server</div>
<div style="width 100%; margin-top:90px">
    <a href="server.php?category=qlsp"><div class="card text-white bg-primary mb-3" style="width: 18rem; height:140px; margin-left:75px; margin-top:40px; float:left">
      <div class="card-body" style="position:relative">
        <h4>Tổng Sản Phẩm<i class="fas fa-box fa-2x text-gray-300" style="position:absolute; right:20px"></i></h4>
        <?php
		$sqlproduct = "select * from product";
		$sanpham = pdo_query($sqlproduct);
		$sohang = count($sanpham);
		echo '<h3 style="margin-top:30px">'.$sohang.'</h3>';
		?>
      </div>
    </div></a>
   <div class="btn-group" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
  <button type="button" class="btn btn-secondary" style="width:220px" onClick="TKDT()">
  <h4 style="margin-left:-130px; margin-top:-5px">Doanh Thu<i class="fas fa-money-check-alt fa-2x text-gray-300" style="position:absolute; right:15px; top:15px"></i></h4>
        <?php
		$sqlorder = "SELECT SUM(total) FROM order_ticket WHERE status = 'đã xác nhận' ";
		$total = pdo_query_value($sqlorder);
		$total1 = round($total / 23033,2);
		echo '<h3 style="margin-top:30px;margin-left:-160px">'. $total1 .'$</h3>';
		?>
  </button>
 
</div>
    <a href="server.php?category=order"><div class="card text-white bg-success mb-3" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
      <div class="card-body">
        <h4>Đơn Hàng<i class="fas fa-receipt fa-2x text-gray-300" style="position:absolute; right:20px"></i></h4>
        <?php
		$sqlorder = "select * from order_ticket";
		$ticket = pdo_query($sqlorder);
		$sohang = count($ticket);
		echo '<h3 style="margin-top:30px">'.$sohang.'</h3>';
		?>	
      </div>
    </div></a>
    <a href="server.php?category=staff_management"><div class="card text-white bg-danger mb-3" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
      <div class="card-body">
        <h4>Nhân Viên<i class="fas fa-user-tie fa-2x" style="position:absolute; right:20px"></i></h4>
        <?php
		$sql = "select * from account where role!='user'";
		$ticket = pdo_query($sql);
		$sohang = count($ticket);
		echo '<h3 style="margin-top:30px">'.$sohang.'</h3>';
		?>	
      </div>
    </div></a>
    <a href="server.php?category=top10seller"><div class="card text-dark bg-warning mb-3" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
      <div class="card-body">
        <h4>TOP BÁN CHẠY</h4>
        <img src="photo/seller.png" style="position:absolute; right:10px; top:12px" >
        <h6 style="margin-top:30px; width:90%">Xem Chi Tiết TOP 10 Sản Phẩm Bán Chạy Nhất</h6>
      </div>
    </div></a>
    <a href="server.php?category=user_management"><div class="card text-dark bg-info mb-3" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
      <div class="card-body">
        <h4>Khách Hàng<i class="fas fa-users fa-2x" style="position:absolute; right:20px"></i></h4>
        <?php
		$sql = "select * from account where role='user'";
		$ticket = pdo_query($sql);
		$sohang = count($ticket);
		echo '<h3 style="margin-top:30px">'.$sohang.'</h3>';
		?>	
      </div>
    </div></a>
    
    <a href="server.php?category=sale-off"><div class="card text-dark bg-light mb-3" style="width: 18rem; height:140px; margin-left:75px;margin-top:40px; float:left">
      <div class="card-body">
        <h5 class="card-title">Sản Phẩm Giảm Giá</h5>
        <img src="photo/price-tag.png" style="width:50px; height:50px; position:absolute; top:10px; right:15px">
        <?php
		$sql = "select * from product where price_sale!=0";
		$sale = pdo_query($sql);
		$c = count($sale);
		echo '<h3 style="margin-top:30px">'.$c.'</h3>';
		?>	
      </div>
    </div></a>
</div>
</div>