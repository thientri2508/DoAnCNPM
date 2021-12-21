<script>
document.getElementById("qlncc").style.background="#E8E8E8";
function addSupplier(){
	var name=document.getElementById("supp").value;
	var t=[];
	t=document.getElementById("supp").value;
	if(name!=""){
		for(var i=0;i<t.length;i++)
		{
			if(t[i]=="'"||t[i]=='"') 
			{
				document.getElementById("thongbaoad").innerHTML="<b>Thêm Nhà Cung Cấp Thất Bại - Không Được Nhập Ký Tự Đặc Biệt</b>";
				document.getElementById("thongbaoad").style.display="block";
				document.getElementById("thongbaoad").style.color="#FF0000";
				setTimeout(closeTB1,3000);
				return false;
			}
		}
		location.replace("fixSupplier.php?name=" + name);
	}else{
		document.getElementById("thongbaoad").innerHTML="<b>Thêm Nhà Cung Cấp Thất Bại - Tên Nhà Cung Cấp Không Được Bỏ Trống</b>";
		document.getElementById("thongbaoad").style.display="block";
		document.getElementById("thongbaoad").style.color="#FF0000";
		setTimeout(closeTB1,3000);
	}
}
function delSupplier(id){
	location.replace("fixSupplier.php?id=" + id);
}
function closeTB1(){
	document.getElementById("thongbaoad").style.display="none";
}
function xoaSupp(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this supplier?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delSupplier('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Nhà Cung Cấp Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Nhà Cung Cấp Thành Công</b>";
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
<div style="width:100%; height:900px">
<h1 class="titleFont1">NHÀ CUNG CẤP</h1>
<div style="float:left; width:50%; height:530px; margin-top:100px; margin-left:60px">
<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; padding-left:30px"><b>DANH SÁCH NHÀ CUNG CẤP</b></h4>
<div style="overflow-y:scroll; margin-top:30px; height:450px; width:100%; border: 1px solid rgba(0,0,0,0.15)">
	<?php
	$sql="select * from supplier";
	$supp=pdo_query($sql);
	foreach($supp as $s)
	{
		extract($s);
		echo '<div style="width:100%; height:180px; position:relative; border-bottom:2px solid">
			<div style="margin-left:30px; margin-top:15px; font-size:20px"><b>ID Nhà Cung Cấp</b></div>
			<div style="margin-left:30px; margin-top:5px; font-size:18px; color:#ff5f17">'.$id.'</div>
			<div style="margin-left:30px; margin-top:15px; font-size:20px"><b>Tên Nhà Cung Cấp</b></div>
			<div style="margin-left:30px; margin-top:5px; font-size:18px; color:#ff5f17">'.$name.'</div>
			<button type="button" class="btn btn-danger" style="position:absolute; left:450px; height:40px; top:40px; height:60px; width:100px" onclick="xoaSupp('.$id.')"><b>Xóa</b></button>
		</div>';
	}
	?>
</div>
</div>
<div style="float:right; width:30%; height:300px; background:#000000; margin-top:100px; margin-right:60px">
<h4 style=" font-size:22px; width:100%; background:#000; height:50px; line-height:50px; padding-left:60px; color:#FFFFFF; border-bottom:3px solid #FFFFFF"><b>THÊM NHÀ CUNG CẤP</b></h4>
<div style="font-size:18px; margin-left:30px; margin-top:30px; color:#FFFFFF"><b>Tên Nhà Cung Cấp</b></div>
<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="supp" style="width:82%; margin-left:30px; margin-top:10px" >
<button type="button" class="btn btn-success" id="supplier" onclick="addSupplier()"><b>THÊM</b></button>
</div>
<div id="test"></div>
</div>