<script>
document.getElementById("qllsp").style.background="#E8E8E8";
function FixProductType(id){
	document.getElementById('AddAttr').style.display='block';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "FixProductType.php?id=" + id, true);
    xmlhttp.send();
}
function huyFIX(){
	document.getElementById('AddAttr').style.display='none';
	document.getElementById('AddAttr').innerHTML="";
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Tên Loại Sản Phẩm Này Đã Tồn Tại - Vui Lòng Nhập Tên Khác</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Loại Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==3){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Loại Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==4){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Loại Sản Phẩm Thất Bại - Loại Sản Phẩm Này Đã Được Setup</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==5){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Loại Sản Phẩm Thành Công!</b>";
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
<div style="width:100%; height:1200px">
<h1 class="titleFont1">QUẢN LÍ LOẠI SẢN PHẨM</h1>

<div style="width:43%; margin-left:60px; float:left; margin-top:100px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH LOẠI SẢN PHẨM</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    <?php
		$sql="select * from product_type";
		$list=pdo_query($sql);
		foreach($list as $l){
		extract($l);
    	echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:65%; height:100%">
            	<h5 style="margin-left:20px; margin-top:15px;">Tên Loại Sản Phẩm</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">'.$name.'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Kiểu Size</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px; color:#ff5f17">'.$size.'</div>
            </div>
            <div style="float:right; width:35%; height:100%">
				<button type="button" class="btn btn-info" style="height:50px; margin-top:23px; width:130px" onclick="FixProductType('.$id.')"><b>Chỉnh Sửa</b></button></br>
                <button type="button" class="btn btn-danger" style="height:50px; margin-top:23px; width:130px" onclick="xoaProductType('.$id.')"><b>Xóa</b></button>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
		}
	?>	
	</div>
</div>

<div style="width:43%; float:right; margin-right:50px; margin-top:100px">
	<h4 style="font-size:22px; width:100%; background:#000; color:#FFF; height:50px; line-height:50px; text-align:center"><b>Thêm Mới Loại Hình Kinh Doanh</b></h4>
    <div style="margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15); position:relative">
    <form method="post" action="xuliaddProductType.php">
        <h5 style="margin-left:40px; margin-top:40px">Tên Loại Sản Phẩm<i class="fas fa-tag" style="margin-left:40px"></i></h5>
        <div class="input-group mb-3" style="width:80%; margin-left:40px">
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="nameAttr">
        </div>
        <div id="err" style="position:absolute; width:80%; left:8%; top:115px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:40px">Kiểu Size</h5>
        <select class="form-select" aria-label="Default select example" style="width:80%; margin-left:40px" name="size">
        	<option>number</option>
            <option>freesize</option>
        </select>
         <h5 style="margin-left:40px; margin-top:40px">Các Thuộc Tính</h5>
         <div style="width:80%; height:270px; margin-left:40px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15);">
         	<?php
			$sql="select * from properties";
			$list=pdo_query($sql);
			foreach($list as $l){
				echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
					  <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="attr-'.$l["id"].'">
					  <label class="form-check-label" for="flexCheckDefault"><b>'.$l["name"].'</b></label>
					</div>';
			}
			?>
         </div>
         <div style="width:80%; margin:auto; height:60px; margin-top:80px">
        	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameProductType();" value="Thêm"></input>
			<button type="reset" class="btn btn-warning" style="float:right; font-size:24px; width:120px">Đặt Lại</button>
         </form>
        </div>
    </div>
</div>
<a href="server.php?category=qllsp&&act=attribute"><button type="button" style="margin-left:60px; margin-top:40px" class="btn btn-danger">Quản Lý Thuộc Tính Sản Phẩm</button></a>
</div>