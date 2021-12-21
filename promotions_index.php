<script>
document.getElementById("ctkm").style.background="#E8E8E8";
function applyCTKM(id,status){
	location.replace("applyCTKM.php?id=" + id + "&&status=" + status);
}
function DetailPromotions(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddDetailAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "DetailPromotions.php?id=" +id, true);
    xmlhttp.send();
	document.getElementById('AddDetailAttr').style.display='block';
}
function closeDetailPromotions(){
	document.getElementById('AddDetailAttr').style.display='none';
	document.getElementById('AddPromotionsContent').style.display='none';
}
function checkPriceSale(){
	var price=[];
	price=document.getElementById("price_sale").value;
	var t=document.getElementById("price_sale").value;
	if(t=="") {document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Số tiền khuyến mãi không được bỏ trống';
			return false;	}
	else {document.getElementById("error1").innerHTML="";}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error1").innerHTML="";
	return true;
}	
function checkPriceApply(){
	var price=[];
	price=document.getElementById("apply").value;
	var t=document.getElementById("apply").value;
	if(t=="") {document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Điều kiện khuyến mãi không được bỏ trống';
			return false;	}
	else {document.getElementById("error2").innerHTML="";}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error2").innerHTML="";
	return true;
}	
function checkContentCTKM(){
var check1=checkPriceSale();
var check2=checkPriceApply();
if(check1==true&&check2==true) return true;
else return false;
}
function AddPromotionsContent(){
	var s="";
	s+='<div style="width:40%; margin-left:32%; height:500px; background:#FFFFFF; position:fixed; margin-top:110px">';
	s+='<h3 style="margin-top:30px; width:100%; text-align:center"><b>Thêm Nội Dung Chương Trình</b></h3>';
	s+='<form method="post" action="xuliAddPromotionsContent.php">';
	s+='<h5 style="margin-left:75px; margin-top:50px">Số Tiền Khuyến Mãi</h5>';
	s+='<input type="text" class="form-control" style="width:75%; margin-left:75px"  name="price_sale" id="price_sale" placeholder="VNĐ">';
	s+='<div id="error1" style="position:absolute; width:80%; left:75px; top:185px; height:25px; color:#FF0000"></div>';
	s+='<h5 style="margin-left:75px; margin-top:30px">Áp Dụng Cho Hóa Đơn Từ</h5>';
	s+='<input type="text" class="form-control" style="width:75%; margin-left:75px"  name="apply" id="apply" placeholder="VNĐ">';
	s+='<div id="error2" style="position:absolute; width:80%; left:75px; top:285px; height:25px; color:#FF0000"></div>';
	s+='<input type="submit" class="btn btn-success" style="float:left; height:50px; width:120px; margin-left:75px; margin-top:80px" value="Thêm Mới" onclick="return checkContentCTKM();"></input>';
	s+='<button type="button" class="btn btn-danger" style="float:right; height:50px; width:120px; margin-right:75px; margin-top:80px" onclick="closeDetailPromotions()">Hủy</button>';
	s+='</form>';
	s+='</div>';
	document.getElementById("AddPromotionsContent").innerHTML=s;
	document.getElementById('AddPromotionsContent').style.display='block';
}
function XoaPromotionsContent(id){
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this content?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delPromotionsContent('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
document.getElementById('delSP').style.display='block';
}
function delPromotionsContent(id){
	location.replace("delPromotionsContent.php?id=" + id);
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Áp Dụng Chương Trình Khuyến Mãi Thất Bại!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Áp Dụng Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==3) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Hủy Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==4) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Nội Dung Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==5) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==6) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thay Đổi Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==7) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Nội Dung Chương Trình Khuyến Mãi Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==8) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Nội Dung Chương Trình Thất Bại  Nội Dung Này Đã Được Áp Dụng</b>";
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
<h1 class="titleFont1">CHƯƠNG TRÌNH KHUYẾN MÃI</h1>
<div style="width:90%; margin:auto; height:60px; margin-top:80px">
	<a href="server.php?category=ctkm&&act=addCTKM"><button type="button" class="btn btn-light" style="float:left;width:150px; height:60px; font-size:30px"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button></a>
	<button type="button" class="btn btn-dark" style="float:right;width:150px; height:60px; font-size:30px" onClick="AddPromotionsContent();"><b><i class="fas fa-plus-circle"></i>&nbspThêm</b></button>
</div>
<div style="width:55%; height:870px; margin-left:60px; float:left; margin-top:40px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH CHƯƠNG TRÌNH</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    <?php
		$sql="select * from promotions";
		$list=pdo_query($sql);
		$on="'"."off"."'";
		$off="'"."on"."'";
		foreach($list as $l){
    	echo '<div style="width:100%">
        	<div style="width:70%; float: left; margin-bottom:20px">
            	<h5 style="margin-left:20px; margin-top:15px;">Tên Chương Trình</h5>
                <div style="margin-left:20px; font-size:18px;color:#ff5f17">'.$l["name"].'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Trạng Thái</h5>';
				if($l["status"]=='on') echo  '<div style="margin-left:20px; font-size:18px;color:#ff5f17">Đang áp dụng</div>';
                else echo '<div style="margin-left:20px; font-size:18px;color:#ff5f17">Không áp dụng</div>';
                echo '<h5 style="margin-left:20px; margin-top:15px;">Ngày Bắt Đầu</h5>
                <div style="margin-left:20px; font-size:18px;color:#ff5f17">'.$l["date_begin"].'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Ngày Kết Thúc</h5>
                <div style="margin-left:20px; font-size:18px;color:#ff5f17">'.$l["date_end"].'</div>
            </div>
            <div style="width:30%; float: right; margin-bottom:20px">
            	<button type="button" class="btn btn-info" onclick="DetailPromotions('.$l["id"].')" style="height:50px; width:130px; margin-top:30px; margin-left:30px"><b>Xem Chi Tiết</b></button>';
				if($l["status"]=='on') echo  '<button type="button" onclick="applyCTKM('.$l["id"].','.$on.')" class="btn btn-success" style="height:50px; margin-top:30px; width:130px; margin-left:30px"><b>Hủy Áp Dụng</b></button>';
                else echo '<button type="button" onclick="applyCTKM('.$l["id"].','.$off.')" class="btn btn-success" style="height:50px; margin-top:30px; width:130px; margin-left:30px"><b>Áp Dụng</b></button>';
				if($l["fix"]=='on') echo '<a href="server.php?category=ctkm&&act=fixCTKM&&ID='.$l["id"].'"><button type="button" class="btn btn-warning" style="height:50px; margin-top:30px; width:130px; margin-left:30px"><b>Chỉnh Sửa</b></button></a>';
            echo '</div>
            <div style="width:100%; border-top:dashed 2px; opacity:0.5; clear:both"></div>
        </div>';
        }
     ?> 
	</div>
</div>

<div style="width:33%; height:600px; float:right; margin-right:50px; margin-top:40px">
	<h4 style="font-size:22px; width:100%; background:#000; color:#FFF; height:50px; line-height:50px; text-align:center"><b>DANH SÁCH NỘI DUNG</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    	<?php
		$sql="select * from promotions_content";
		$content=pdo_query($sql);
		foreach($content as $c){
			echo '<div style="width:100%; height:120px; margin-top:20px">
					<div style="width:65%; height:100%; float:left">
						<h5 style="margin-left:20px;color:#ff5f17"><i>Giảm: '.$c["price_sale"].' VNĐ</i></h5>
						<h5 style="margin-left:20px; margin-top:20px;color:#ff5f17"><i>Áp dụng cho đơn hàng từ: '.$c["apply"].' VNĐ</i></h5>
					</div>		
					<div style="width:35%; height:100%; float:right">
						<button type="button" class="btn btn-danger" style="margin-left:15px; width:102px; margin-top:30px" onclick="XoaPromotionsContent('.$c["id"].')"><b>Xóa</b></button>
					</div>
				</div>
				<div style="width:100%; border-top:dashed 2px; opacity:0.5; clear:both"></div>';
		}
		?>
        
        
    </div>
</div>
</div>