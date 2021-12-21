<script>
document.getElementById("qlsp").style.background="#E8E8E8";
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Thêm Sản Phẩm Thất Bại - Tên File Ảnh Bị Trùng!!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Thêm Sản Phẩm Thất Bại - File Ảnh Không Phù Hợp!!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
}
?>
<div style="width:100%; height:900px">
<h1 style="font-feature-settings: 'kern'; margin-top:30px; margin-left:30px"><b>THÊM SẢN PHẨM MỚI</b></h1>
<p style="width:35%; font-feature-settings: 'kern'; font-size:22px; text-align:center; margin:auto; margin-top:50px">THIẾT LẬP THÔNG TIN SẢN PHẨM<i class="fas fa-clipboard-list" style="margin-left:10px"></i></p>
<div style="width:100%; height:550px;  margin-top:20px">
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px; position:relative">
	<form method="post" action="xuliaddSP.php" enctype="multipart/form-data">
	<h5 style="margin-left:40px; margin-top:30px">Tên Sản Phẩm<i class="fas fa-tag" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="namesp" id="namesp">
    </div>
    <div id="error1" style="position:absolute; width:80%; left:40px; top:100px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Giá Sản Phẩm<i class="fas fa-coins" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price" id="price">
    </div>
    <div id="error" style="position:absolute; width:80%; left:40px; top:200px; height:25px; color:#FF0000"></div>
</div>
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px">
	<h5 style="margin-left:40px; margin-top:30px">Loại Sản Phẩm</h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="productType">
     	<?php
		$sql="select name from product_type";
		$list=pdo_query($sql);
		foreach($list as $type){
			echo '<option>'.$type["name"].'</option>';
		}
		?>
    </select>
    <h5 style="margin-left:40px; margin-top:30px">Ảnh Sản Phẩm<i class="far fa-images" style="margin-left:30px"></i></h5>
    <div style="width:75%; margin-left:40px">
  	  <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" onchange="ImagesFileAsURL(this.id)" onclick="closeImg()">
	</div> 
    <div id="upload1" style="width:240px; height:220px; margin:auto; margin-top:30px; background:#E8E8E8">
    </div>
</div>	
</div>
<div style="width:65%; height:60px; margin:auto; margin-top:50px; position:relative">
<input type="submit" class="btn btn-outline-success" style="float:left; height:100%; width:25%; font-size:22px; border:solid 3px" value="Thêm Mới" onclick="return checkTTSP();"></input>
<button type="reset" class="btn btn-outline-warning" style="float:right; height:100%; width:25%; font-size:22px; border:solid 3px">Đặt Lại</button>
<?php 
if(isset($tb)) echo '<script>setTimeout(function(){
    alert("Thêm Sản Phẩm Thành Công!");
}, 100);</script>';
?>
</form>
<a href="server.php?category=qlsp"><div class="back"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>
<div id="temp"></div>
</div>