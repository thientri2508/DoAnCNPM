<script>
document.getElementById("qldm").style.background="#E8E8E8";
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==8) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Danh Mục Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==9){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Danh Mục Thất Bại - Danh Mục Này Đã Có Sản Phẩm</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="#FF0000";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
}
?>
<div style="width:100%; height:1100px">
<h1 class="titleFont1">QUẢN LÍ DANH MỤC</h1>
<a href="server.php?category=qldm&&act=addDM"><button type="button" class="btn btn-outline-primary" style="float:right;width:150px; height:60px; margin-right:100px; margin-top:60px; font-size:30px"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button></a>
<h4 style="width:40%; margin:auto; text-align:center; margin-top:140px;">DANH SÁCH DANH MỤC</h4>
<div style="width:85%; margin:auto; margin-top:30px; background:#2c3034; color:#fff;border: 1px solid rgba(0,0,0,0.15); height:60px">
	<h4 style="width:8%; float:left; margin-left:20px; margin-top:13px">ID</h4>
     <h4 style="width:10%; float:left; margin-left:8px; margin-top:13px">Number</h4>
    <h4 style="width:20%; float:left; margin-left:8px; margin-top:13px">Name</h4>
    <h4 style="width:18%; float:left; margin-left:-16px; margin-top:13px">File Name</h4>
    <h4 style="width:23%; float:left; margin-left:-20px; margin-top:13px">ID Product Type</h4>
    <h4 style="width:10%; float:left; margin-left:30px; margin-top:13px">Fix</h4>
    <h4 style="width:10%; float:right; margin-left:-35px; margin-top:13px">Delete</h4>
</div>
<div id="listSPadmin">
	<?php
	$s1='<div style="width:100%; height:130px; background-color: #d1e7dd;">';
	$s2='<div style="width:100%; height:130px; background-color: #bcd0c7;">';
	$s='';
	$sql="select * from category";
	$category=pdo_query($sql);
	for($i=0;$i<count($category);$i++){
		  extract($category[$i]);
		  $s="'";
		  if($i%2==0) {echo $s1;}
		  else {echo $s2;}
		  echo '<div style="width:8%;padding-left:15px" class="listItem"><b>'.$id.'</b></div>
		  <div style="width:10%; padding-left:30px;" class="listItem"><b>'.$stt.'</b></div>
        <div style="width:20%; padding-left:30px;" class="listItem"><b>'.$name.'</b></div>
        <div style="width:18%;padding-left:20px;" class="listItem"><b>'.$file_name.'</b></div>
        <div style="width:23%;padding-left:20px;" class="listItem"><b>'.$idProductType.'</b></div>
        <div style="width:10%" class="listItem">
        	<a href="server.php?category=qldm&&act=fixDM&&ID='.$id.'"><img src="photo/fix.png" class="fix"  /></a>
        </div>
        <div style="width:11%" class="listItem">
        	<img src="photo/del.png" class="fix" style="margin-left:40px" onclick="xoaDM('.$s.$id.$s.')" />
        </div>
    </div>';
	}
	?>
</div>
</div>
