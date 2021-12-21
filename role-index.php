<script>
function CT_role(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CT_role").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "CT_role.php?id=" + id , true);
    xmlhttp.send();
}
function xoaRole(id){
document.getElementById('delSP').style.display='block';
var ID="'"+id+"'";
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this role?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delRole('+ID+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function delRole(id){
var url="delRole.php?id="+id;
location.replace(url);
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Mới Quyền Truy Cập Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Mới Quyền Truy Cập Thất Bại - Mã Hoặc Tên Quyền Đã Tồn Tại!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==3) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Quyền Truy Cập Thất Bại - Tên Quyền Đã Tồn Tại!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==4) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Quyền Truy Cập Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==5) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Quyền Truy Cập Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==6) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Quyền Truy Cập Thất Bại - Quyền Này Đã Được Sử Dụng</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
}
?>
<div style="width:100%; height:1250px">
<h1 class="titleFont1">QUẢN LÝ QUYỀN TRUY CẬP</h1>
<div style="width:90%; margin:auto; height:60px; margin-top:80px">
	<a href="server.php?category=role&&act=addRole"><button type="button" class="btn btn-light" style="float:left;width:150px; height:60px; font-size:30px"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button></a>
</div>
<div style="width:43%; height:870px; margin-left:60px; float:left; margin-top:40px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH QUYỀN TRUY CẬP</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    <?php
		$sql="select * from role";
		$list=pdo_query($sql);
		$n="'";
		foreach($list as $l){
		extract($l);
    	echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:65%; height:100%">
            	<h5 style="margin-left:20px; margin-top:15px;">Mã Quyền</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">'.$id.'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Tên Quyền</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px; color:#ff5f17">'.$name.'</div>
            </div>
            <div style="float:right; width:35%; height:100%">
				<button type="button" class="btn btn-info" style="height:50px; width:130px" onclick="CT_role('.$n.$id.$n.')"><b>Xem Chi Tiết</b></button></br>
				<a href="server.php?category=role&&act=fixRole&&ID='.$id.'"><button type="button" class="btn btn-success" style="height:50px; margin-top:10px; width:130px"><b>Chỉnh Sửa</b></button></br></a>
                <button type="button" class="btn btn-danger" style="height:50px; margin-top:10px; width:130px" onclick="xoaRole('.$n.$id.$n.')"><b>Xóa</b></button>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
		}
	?>	
    </div>
</div>
<div style="width:43%; height:600px; float:right; margin-right:50px; margin-top:40px">
	<h4 style="font-size:22px; width:100%; background:#000; color:#FFF; height:50px; line-height:50px; text-align:center"><b>CHI TIẾT QUYỀN TRUY CẬP</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15)" id="CT_role">
	</div>
</div>
</div>