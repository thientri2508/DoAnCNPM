<script>
document.getElementById("qllsp").style.background="#E8E8E8";
function CT_attr(id){
	document.getElementById('delSP').style.display='block';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("delSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "detail_properties.php?id=" + id , true);
    xmlhttp.send();
}
function AddDetailAttr(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddDetailAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "AddDetailAttr.php", true);
    xmlhttp.send();
	document.getElementById('AddDetailAttr').style.display='block';
}
function AddAttr(){
	document.getElementById('AddAttr').style.display='block';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "AddAttr.php", true);
    xmlhttp.send();
}
function FixAttr(id){
	document.getElementById('AddAttr').style.display='block';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "FixAttr.php?id=" + id, true);
    xmlhttp.send();
}
function huyADD(){
	document.getElementById('AddDetailAttr').style.display='none';
	document.getElementById('AddAttr').style.display='none';
}	
function huyFIX(){
	document.getElementById('AddAttr').style.display='none';
	document.getElementById('AddAttr').innerHTML="";
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Thất Bại - Tên File Ảnh Bị Trùng</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Thất Bại - File Ảnh Không Phù Hợp</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Chi Tiết Thuộc Tính Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==4){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Thất Bại - Tên File Ảnh Bị Trùng</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==5){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Thất Bại - File Ảnh Không Phù Hợp</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==6){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Chi Tiết Thuộc Tính Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==7){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Chi Tiết Thuộc Tính Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==8){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Chi Tiết Thuộc Tính Thất Bại - Thuộc Tính Này Đã Được Setup</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==9){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Tên Thuộc Tính Này Đã Tồn Tại - Vui Lòng Nhập Tên Khác</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==10){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Thuộc Tính Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==11){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Thuộc Tính Sản Phẩm Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==12){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Thuộc Tính Thất Bại - Thuộc Tính Này Đã Được Setup</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==13){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Thuộc Tính Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==14){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Tên Chi Tiết Thuộc Tính Này Đã Tồn Tại - Vui Lòng Nhập Tên Khác</b>";
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
<h1 class="titleFont1">THUỘC TÍNH SẢN PHẨM</h1>
<div style="width:90%; margin:auto; height:60px; margin-top:80px">
	<button type="button" class="btn btn-light" style="float:left;width:150px; height:60px; font-size:30px" onclick="AddAttr()"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button>
	<button type="button" class="btn btn-dark" style="float:right;width:150px; height:60px; font-size:30px" onclick="AddDetailAttr()"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button>
</div>
<div style="width:43%; height:870px; margin-left:60px; float:left; margin-top:40px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH THUỘC TÍNH</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    <?php
		$sql="select * from properties";
		$list=pdo_query($sql);
		foreach($list as $l){
		extract($l);
    	echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:65%; height:100%">
            	<h5 style="margin-left:20px; margin-top:15px;">Mã Thuộc Tính</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">'.$id.'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Tên Thuộc Tính</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px; color:#ff5f17">'.$name.'</div>
            </div>
            <div style="float:right; width:35%; height:100%">
				<button type="button" class="btn btn-info" style="height:50px; width:130px" onclick="CT_attr('.$id.')"><b>Xem Chi Tiết</b></button></br>
				<button type="button" class="btn btn-success" style="height:50px; margin-top:10px; width:130px" onclick="FixAttr('.$id.')"><b>Chỉnh Sửa</b></button></br>
                <button type="button" class="btn btn-danger" style="height:50px; margin-top:10px; width:130px" onclick="xoaAttr('.$id.')"><b>Xóa</b></button>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
		}
	?>	
	</div>
</div>

<div style="width:43%; height:600px; float:right; margin-right:50px; margin-top:40px">
	<h4 style="font-size:22px; width:100%; background:#000; color:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH CHI TIẾT THUỘC TÍNH</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    	<?php
		$sql="select * from detail_properties";
		$list=pdo_query($sql);
		foreach($list as $l){
		extract($l);
		$n="'".$name."'";
		$img="'".$image."'";
    	echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:65%; height:100%">
                <div style="margin-left:40px; margin-top:10px; font-size:24px; color:#ff5f17">'.$name.'</div>
				<img src="photo/'.$image.'" style="width:100px; height:100px; margin-left: 40px; margin-top:10px" />
            </div>
            <div style="float:right; width:35%; height:100%">
				<button type="button" class="btn btn-success" style="height:50px; margin-top:22px; width:130px" onclick="fixCT_Attr('.$id.','.$n.','.$img.')"><b>Chỉnh Sửa</b></button></br>
                <button type="button" class="btn btn-danger" style="height:50px; margin-top:22px; width:130px" onclick="xoaCT_Attr('.$id.')"><b>Xóa</b></button>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
		}
	?>	
    </div>
</div>
</div>
