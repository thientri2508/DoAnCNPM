<script>
document.getElementById("ctkm").style.background="#E8E8E8";
function checkNameCTKM(){
	var name=document.getElementById("namect").value;
	var t=[];
	t=document.getElementById("namect").value;
	if(name=="")	{document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên chương trình không được bỏ trống';
			return false;	}
	else {document.getElementById("error1").innerHTML="";}
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error1").innerHTML="";
	return true;
}
function xuliDate(dayFrom,dayTo)
{
	var From=dayFrom.split('-');
	var To=dayTo.split('-');
	var ddFrom=Number(From[2]);
	var mmFrom=Number(From[1]);
	var yyFrom=Number(From[0]);
	var ddTo=Number(To[2]);
	var mmTo=Number(To[1]);
	var yyTo=Number(To[0]);
	
	if(yyFrom>yyTo) return false;
	if(yyFrom==yyTo) {
		if(mmFrom>mmTo) return false
		if(mmFrom==mmTo) {
			if(ddFrom>=ddTo) return false;
		}
	}
	return true;
}
function checkDate(){
var from=document.getElementById("start").value;
var to=document.getElementById("end").value;
if(from=="") {
	document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Ngày bắt đầu không được bỏ trống';
	return false;
}else {document.getElementById("error2").innerHTML="";}
if(to=="") {
	document.getElementById("error3").innerHTML='<i class="fas fa-exclamation-circle"></i> Ngày kết thúc không được bỏ trống';
	return false;
}else {document.getElementById("error3").innerHTML="";}

if(xuliDate(from,to)==false) {
	document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Thời gian nhập không hợp lệ';
	document.getElementById("error3").innerHTML='<i class="fas fa-exclamation-circle"></i> Thời gian nhập không hợp lệ';
	return false;
}else {document.getElementById("error2").innerHTML="";
	document.getElementById("error3").innerHTML="";}
	return true;
}
function checkCTKM(){
var check1=checkNameCTKM();
var check2=checkDate();
if(check1==true&&check2==true) return true;
else return false;
}
</script>
<div style="width:100%; height:700px">
<h2 style="font-feature-settings: 'kern'; width:70%; margin:auto; text-align:center; margin-top:50px"><b>THÊM CHƯƠNG TRÌNH KHUYẾN MÃI</b></h2>
<div style="width:100%; height:400px;  margin-top:60px">
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px; position:relative">
	<form method="post" action="xuliaddCTKM.php">
	<h5 style="margin-left:40px; margin-top:30px">Tên Chương Trình</h5>
    <input type="text" class="form-control" style="width:75%; margin-left:40px"  name="namect" id="namect">
    <div id="error1" style="position:absolute; width:80%; left:40px; top:100px; height:25px; color:#FF0000"></div>
    <h5 style="margin-left:40px; margin-top:30px">Ngày Bắt Đầu</h5>
    <input type="date" class="form-control" style="width:75%; margin-left:40px"  name="start" id="start">
    <div id="error2" style="position:absolute; width:80%; left:40px; top:200px; height:25px; color:#FF0000"></div>
     <h5 style="margin-left:40px; margin-top:30px">Ngày Kết Thúc</h5>
    <input type="date" class="form-control" style="width:75%; margin-left:40px"  name="end" id="end">
    <div id="error3" style="position:absolute; width:80%; left:40px; top:300px; height:25px; color:#FF0000"></div>
</div>
<div style="width:45%; float:left; height:100%; background:#fff; margin-left:40px">
	<h5 style="margin-left:40px; margin-top:30px">Nội Dung Chương Trình</h5>
    <div style="width:80%; height:270px; margin-left:40px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15);">
    <?php
	$sql="select * from promotions_content";
	$content=pdo_query($sql);
	foreach($content as $c){
		echo '  <div class="form-check" style="margin-left:20px; margin-top:20px">
					<input class="form-check-input" type="checkbox" name="content-'.$c["id"].'">
					<label class="form-check-label" for="flexCheckDefault">Giảm '.$c["price_sale"].' VNĐ cho hóa đơn tối thiểu '.$c["apply"].' VNĐ</label>
				</div> ';
	}
	if(count($content)==0) echo '<h6 style="color:#FF0000">Không có nội dung nào - Vui lòng tạo nội dung chương trình khuyến mãi!</h6>';
	?>
    </div>
</div>	
</div>
<div style="width:65%; height:60px; margin:auto; margin-top:50px; position:relative">
<input type="submit" class="btn btn-outline-success" style="float:left; height:100%; width:25%; font-size:22px; border:solid 3px" value="Thêm Mới" onclick="return checkCTKM();"></input>
<button type="reset" class="btn btn-outline-warning" style="float:right; height:100%; width:25%; font-size:22px; border:solid 3px">Đặt Lại</button>
</form>
<a href="server.php?category=ctkm"><div class="back"><i class="fas fa-undo-alt"></i>Trở Lại</div></a>
</div>
</div>