<script>
document.getElementById("qldm").style.background="#E8E8E8";
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Chỉnh Sửa Thất Bại - Tên File Bị Trùng!!</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Chỉnh Sửa Thất Bại - File Không Phù Hợp!!</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>!!Chỉnh Sửa Thất Bại - Tên Danh Mục Đã Tồn Tại!!</b>";
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
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Chỉnh Sửa Danh Mục Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
	}
	$sql="select * from category where id='".$_GET['ID']."'";
	$dm=pdo_query_one($sql);
?>
<div style="width:100%; height:1000px">
<p style="width:35%; font-feature-settings: 'kern'; font-size:22px; text-align:center; margin:auto; margin-top:50px">THAY ĐỔI THÔNG TIN DANH MỤC<i class="fas fa-clipboard-list" style="margin-left:10px"></i></p>
<div style="width:100%; height:600px;  margin-top:40px">
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:28%; position:relative">
	<form method="post" action="xulifixDM.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $_GET['ID']; ?>" name="idDM"></input>
     <h5 style="margin-left:40px; margin-top:30px">Mã Danh Mục</h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="IDDM" id="idDM" value="<?php echo $dm['id'] ?>" >
    </div>
    <div id="error1" style="position:absolute; width:80%; left:40px; top:103px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Số Thứ Tự Danh Mục</h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stt" id="stt" value="<?php echo $dm['stt'] ?>" >
    </div>
    <div id="error2" style="position:absolute; width:80%; left:40px; top:202px; height:25px; color:#FF0000"></div>
	<h5 style="margin-left:40px; margin-top:30px">Tên Danh Mục</h5>
    <div class="input-group mb-3" style="width:75%; margin-left:40px">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="nameid" value="<?php echo $dm['name'] ?>">
    </div>
    <div id="error3" style="position:absolute; width:80%; left:40px; top:302px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Loại Sản Phẩm Thuộc Danh Mục</h5>
    <select class="form-select" aria-label="Default select example" style="width:75%; margin-left:40px" name="productType">
     	<?php
		if($dm["idProductType"]==0) echo '<option selected>none</option>';
		else {
			$sql="select * from product_type where id=".$dm['idProductType'];
			$sel=pdo_query_one($sql);
			echo '<option selected>'.$sel["name"].'</option>';
			echo '<option>none</option>';
		}
		$sql="select * from product_type where id!=".$dm['idProductType'];
		$list1=pdo_query($sql);
		$sql="select * from category";
		$list2=pdo_query($sql);
		foreach($list1 as $l1){
			$check=true;
			foreach($list2 as $l2){
				if($l1["id"]==$l2["idProductType"]){
					$check=false;
					break;
				}
			}
			if($check==true) echo '<option>'.$l1["name"].'</option>';
		}
		?>
    </select>
     <h5 style="margin-left:40px; margin-top:30px">File Include (.php)</h5>
    <div style="width:75%; margin-left:40px">
  	  <input class="form-control form-control-lg" id="formFileLg" type="file" name="filephp">
	</div> 
</div>
</div>
	<div style="width:65%; height:60px; margin:auto; margin-top:50px; position:relative">
    <input type="submit" class="btn btn-outline-success" style="float:left; height:100%; width:25%; font-size:22px; border:solid 3px" value="Cập Nhật" onclick="return checkTTDM();"></input>
    <button type="reset" class="btn btn-outline-warning" style="float:right; height:100%; width:25%; font-size:22px; border:solid 3px">Đặt Lại</button>
    </form>
    <a href="server.php?category=qldm"><div class="back"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>
<script>
function checkNameDM(){
	var ten=[];
	ten=document.getElementById("nameid").value;
	var name=document.getElementById("nameid").value;
	if(name=="")	{document.getElementById("error3").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên danh mục không dược bỏ trống';
			return false;	}
	else {document.getElementById("error3").innerHTML="";}
	for(var i=0;i<ten.length;i++)
	{
		if(ten[i]=="'"||ten[i]=='"') 
		{
			document.getElementById("error3").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error3").innerHTML="";
	return true;
}
function checkIDDM(){
	var id=[];
	id=document.getElementById("idDM").value;
	var ID=document.getElementById("idDM").value;
	if(ID=="")	{document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Mã danh mục không dược bỏ trống';
			return false;	}
	else {document.getElementById("error1").innerHTML="";}
	for(var i=0;i<id.length;i++)
	{
		if(id[i].charCodeAt()<65||(id[i].charCodeAt()>90&&id[i].charCodeAt()<97)||id[i].charCodeAt()>122) 
		{
			document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error1").innerHTML="";
	return true;
}
function checkSTT(){
	var stt=[];
	stt=document.getElementById("stt").value;
	var STT=document.getElementById("stt").value;
	if(STT=="")	{document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Thứ tự danh mục không dược bỏ trống';
			return false;	}
	else {document.getElementById("error2").innerHTML="";}
	for(var i=0;i<stt.length;i++)
	{
		if(stt[i].charCodeAt()<48||stt[i].charCodeAt()>57) 
		{
			document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error2").innerHTML="";
	return true;
}
function checkTTDM(){
	var c1=checkNameDM();
	var c2=checkIDDM();
	var c3=checkSTT();
	if(c1==true&&c2==true&&c3==true) return true;
	return false;
}
</script>


