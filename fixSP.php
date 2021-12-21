<script>
document.getElementById("qlsp").style.background="#E8E8E8";
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Sửa Sản Phẩm Thất Bại - Tên File Ảnh Bị Trùng!!</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Sửa Sản Phẩm Thất Bại - File Ảnh Không Phù Hợp!!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==4){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Sửa Sản Phẩm Thất Bại</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==5){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thiết Lập Thuộc Tính Sản Phẩm Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
}
?>
<div style="width:100%; height:1000px">
<h1 style="font-feature-settings: 'kern'; margin-top:30px; margin-left:30px"><b>CÀI ĐẶT SẢN PHẨM</b></h1>
<p style="width:35%; font-feature-settings: 'kern'; font-size:22px; text-align:center; margin:auto; margin-top:50px">CHỈNH SỬA THÔNG TIN SẢN PHẨM<i class="fas fa-tools" style="margin-left:10px"></i></p>
<div style="width:100%; height:600px;  margin-top:20px">
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px; position:relative">
	<form method="post" action="xulifixSP.php" enctype="multipart/form-data">
     <h5 style="margin-left:40px; margin-top:30px">ID Sản Phẩm</h5>
     <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" readonly="readonly" aria-describedby="inputGroup-sizing-default" value="<?php echo $id; ?>" name="fixId" id="fixId">
    </div>
    <div id="error3" style="position:absolute; width:80%; left:40px; top:100px; height:25px; color:#FF0000"></div>
	<h5 style="margin-left:40px; margin-top:30px">Tên Sản Phẩm<i class="fas fa-tag" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $name; ?>" name="fixname" id="fixname">
    </div>
    <div id="error2" style="position:absolute; width:80%; left:40px; top:200px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Giá Sản Phẩm<i class="fas fa-coins" style="margin-left:40px"></i></h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $price; ?>" name="fixprice" id="fixprice">
    </div>
    <div id="error4" style="position:absolute; width:80%; left:40px; top:300px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Thuộc Tính Sản Phẩm</h5>
    <a href="server.php?category=qlsp&&act=setupSP&&ID=<?php echo $id; ?>"><button type="button" class="btn btn-danger" style="margin-left:40px; margin-top:10px; width:100px">Setup</button></a>
</div>
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px">
	<h5 style="margin-left:40px; margin-top:30px">Loại Sản Phẩm</h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="fixproductType">
     <?php
	 	$sql="SELECT product_type.id FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$id;
		$res=pdo_query_one($sql);
	 	$sql="select * from product_type";
		$list=pdo_query($sql);
		foreach($list as $type){
			if($type["id"]==$res["id"]) echo '<option selected>'.$type["name"].'</option>';
			else echo '<option>'.$type["name"].'</option>';
		}
	  ?>
    </select>
     <h5 style="margin-left:40px; margin-top:30px">Ảnh Sản Phẩm<i class="far fa-images" style="margin-left:30px"></i></h5>
    <div style="width:75%; margin-left:40px">
  	  <input class="form-control form-control-lg" id="formFileLg" type="file" name="fiximage" onchange="ImagesFileAsURLFix(this.id)" onclick="closeImgFix()">
	</div>
     <div id="upload2" style="width:240px; height:220px; margin:auto; margin-top:30px; background:#E8E8E8">
     	<?php echo '<img src="photo/'.$image.'" style="width:240px; height:220px" />'; ?>
    </div>
    <div class="form-check" style="margin-left:38%; margin-top:25px">
      <input class="form-check-input" type="checkbox" name="delImg" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Loại Bỏ Hình
      </label>
    </div>
</div>	
</div>
<div style="width:65%; height:60px; margin:auto; margin-top:50px; position:relative">
<input type="submit" class="btn btn-outline-success" style="float:left; height:100%; width:25%; font-size:22px; border:solid 3px" value="Cập Nhật" onclick="return checkFixTTSP();"></input>
<button type="reset" class="btn btn-outline-warning" style="float:right; height:100%; width:25%; font-size:22px; border:solid 3px">Đặt Lại</button>
</form>
<a href="server.php?category=qlsp"><div class="back"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>
</div>