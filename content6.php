<script>
document.getElementById("slide").style.display='none';
document.title='Đăng Ký';
document.getElementById("content").style.height='850px';
function checkNameAcc(){
	var ten=[];
	ten=document.getElementById("txtname").value;
	var name=document.getElementById("txtname").value;
	if(name=="")	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên người dùng không được bỏ trống';
			return false;	}
	else {document.getElementById("kt1").innerHTML="";}
	
	if(ten.length>20)	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản không được quá 20 kí tự';
			return false;	}
	else {document.getElementById("kt1").innerHTML="";}
	for(var i=0;i<ten.length;i++)
	{
		if(ten[i]=="'"||ten[i]=='"') 
		{
			document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("kt2").innerHTML="";
	return true;
}
function checkPhone(){
	var sdt=[];
	sdt=document.getElementById("txtphone").value;
	var phone=document.getElementById("txtphone").value;
	if(phone=="")	{document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không được bỏ trống';
			return false;	}
	else {document.getElementById("kt2").innerHTML="";}
	if(sdt.length!=10)	{document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không hợp lệ';
			return false;	}
	else {document.getElementById("kt2").innerHTML="";}
	for(var i=0;i<sdt.length;i++)
	{
		if(sdt[i].charCodeAt()<48||sdt[i].charCodeAt()>57) 
		{
			document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không hợp lệ';
			return false;
		}
	}
	document.getElementById("kt2").innerHTML="";
	return true;
}
function checkAddress(){
	var a=[];
	a=document.getElementById("txtaddress").value;
	var add=document.getElementById("txtaddress").value;
	if(add=="")	{document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Địa chỉ không được bỏ trống';
			return false;	}
	else {document.getElementById("kt3").innerHTML="";}
	for(var i=0;i<a.length;i++)
	{
		if(a[i]=="'"||a[i]=='"') 
		{
			document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("kt3").innerHTML="";
	return true;
}
function checkUsername(){
	var user=[];
	var check=true;
	user=document.getElementById("email").value;
	var name=document.getElementById("email").value;
	if(name=="")	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Email không được bỏ trống';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	for(var i=0;i<user.length;i++)
	{
		if(user[i]=="'"||user[i]=='"') 
		{
			document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Email không tồn tại';
			return false;
		}
	}
	document.getElementById("kt4").innerHTML="";
	if(name.indexOf("@")==-1) {
		document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Email không tồn tại';
		return false;
	}
	document.getElementById("kt4").innerHTML="";
	return true;
}
function checkPass(){
	var mk=[];
	mk=document.getElementById("txtpass").value;
	var pass=document.getElementById("txtpass").value;
	if(pass=="")	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu không được bỏ trống';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	if(mk.length<6)	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu phải từ 6 ký tự trở lên';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	for(var i=0;i<mk.length;i++)
	{
		if(mk[i]=="'"||mk[i]=='"') 
		{
			document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("kt5").innerHTML="";
	return true;
}
function checkPrePass(){
	var pass=document.getElementById("txtprepass").value;
	var mk=document.getElementById("txtpass").value;
	if(pass=="")	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng xác nhận lại mật khẩu';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	if(pass!=mk)	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Xác nhận lại mật khẩu không khớp';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	return true;
}
function checkCity(){
	var city=document.getElementById("city").value;
	if(city=="Tỉnh/Thành Phố") {document.getElementById("kt7").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng chọn Tỉnh/Thành Phố';
		return false;	}
	else {document.getElementById("kt7").innerHTML="";}
	return true;
}
function checkDistrict(){
	var district=document.getElementById("district").value;
	if(district=="Quận/Huyện") {document.getElementById("kt8").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng chọn Quận/Huyện';
		return false;	}
	else {document.getElementById("kt8").innerHTML="";}
	return true;
}
function checkWard(){
	var ward=document.getElementById("ward").value;
	if(ward=="Phường/Xã") {document.getElementById("kt9").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng chọn Phường/Xã';
		return false;	}
	else {document.getElementById("kt9").innerHTML="";}
	return true;
}
function checkAcc(){
var check1=checkNameAcc();
var check2=checkPhone();
var check3=checkAddress();
var check4=checkUsername();
var check5=checkPass();
var check6=checkPrePass();
var check7=checkCity();
var check8=checkDistrict();
var check9=checkWard();
if(check1==true&&check2==true&&check3==true&&check4==true&&check5==true&&check6==true&&check7==true&&check8==true&&check9==true) return true;
else return false;
}
function selectCity(){
var city = document.getElementById("city").value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
      document.getElementById("district").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "selectCity.php?city=" + city , true);
xmlhttp.send();
document.getElementById("ward").innerHTML="<option selected>Phường/Xã</option>";
}
function selectDistrict(){
	var city = document.getElementById("city").value;
	var district = document.getElementById("district").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ward").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "selectDistrict.php?district=" + district + "&&city=" + city, true);
xmlhttp.send();
}
</script>
<?php
if(isset($_SESSION['DKTC'])) {
		echo '<script>document.getElementById("thongbao").innerHTML="<b>Đăng Ký Tài Khoản Thất Bại - Email Này Đã Được Sử Dụng</b>";
		document.getElementById("thongbao").style.color="red";
		document.getElementById("thongbao").style.display="block";
		document.getElementById("thongbao").style.fontSize="18px";
		function closeTB(){
			document.getElementById("thongbao").style.display="none";
		}
		setTimeout(closeTB,3000);
		</script>';
		unset($_SESSION['DKTC']);
}
?>
<div style="width:100%; height:850px;">
	<h4 style="font-feature-settings: 'kern'; margin-top:30px; width:100%; font-size:20px; height:40px; line-height:40px; padding-left:20px; margin-bottom:40px"><b>TẠO MỚI TÀI KHOẢN KHÁCH HÀNG</b></h4>
    <div style="width:100%; height:600px">
        <div style="width:46%; height:550px; float:left; background-color:#E8E8E8; margin-left:30px; position:relative">
            <p style="font-size:18px; margin:0px; margin-left:35px; margin-top:25px">THÔNG TIN CÁ NHÂN</p>
            <hr style="margin:0px; width:85%; margin-left:35px; margin-top:8px; opacity:0.2"  />
            <form method="post" action="xuliDK.php">
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:30px">
             <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtname" id="txtname" placeholder="HỌ TÊN"   />
            </div>
            <div id="kt1" style="position:absolute; width:77%; height:20px; top:130px; left:35px;color:#FF0000"></div>
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:35px">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtphone" id="txtphone" placeholder="Số điện thoại"   />
            </div>
            <div id="kt2" style="position:absolute; width:77%; height:20px; top:203px; left:35px;color:#FF0000"></div>
            <select class="form-select" aria-label="Default select example" style="width:77%; margin-left:35px; margin-top:35px" id="city" name="city" onchange="selectCity()">
              <option selected>Tỉnh/Thành Phố</option>
              <?php
			  $sql="select * from province";
			  $tp=pdo_query($sql);
			  foreach($tp as $t){
			  	echo '<option>'.$t["_name"].'</option>';
			  }
			  ?>
            </select>
            <div id="kt7" style="position:absolute; width:77%; height:20px; top:277px; left:35px;color:#FF0000"></div>	
            <select class="form-select" aria-label="Default select example" id="district" name="district" onchange="selectDistrict()" style="width:77%; margin-left:35px; margin-top:35px">
              <option selected>Quận/Huyện</option>
            </select>
            <div id="kt8" style="position:absolute; width:77%; height:20px; top:348px; left:35px;color:#FF0000"></div>
            <select class="form-select" aria-label="Default select example" id="ward" name="ward" style="width:77%; margin-left:35px; margin-top:35px">
              <option selected>Phường/Xã</option>
            </select>
            <div id="kt9" style="position:absolute; width:77%; height:20px; top:420px; left:35px;color:#FF0000"></div>
            <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:35px">
             <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtaddress" id="txtaddress" placeholder="Địa chỉ"   /> 
            </div>
            <div id="kt3" style="position:absolute; width:77%; height:20px; top:497px; left:35px;color:#FF0000"></div>	
        </div>
    	<div style="width:46%; height:550px; float:right;  background-color:#E8E8E8; margin-right:30px; position:relative">
            <p style="font-size:18px; margin:0px; margin-left:35px; margin-top:25px">THÔNG TIN ĐĂNG NHẬP</p>
            <hr style="margin:0px; width:85%; margin-left:35px; margin-top:8px; opacity:0.2"  />
             <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:30px">
            <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" id="email" placeholder="Địa chỉ Email"   />
            </div>
            <div id="kt4" style="position:absolute; width:77%; height:20px; top:130px; left:35px;color:#FF0000"></div>
            <div class="col-sm-10" style="width:77%; margin-left:35px; margin-top:35px">
              <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Mật khẩu">
            </div>
            <div id="kt5" style="position:absolute; width:77%; height:20px; top:203px; left:35px;color:#FF0000"></div>
            <div class="col-sm-10" style="width:77%; margin-left:35px; margin-top:35px">
              <input type="password" class="form-control" name="txtprepass" id="txtprepass" placeholder="Xác nhận mật khẩu">
            </div>
            <div id="kt6" style="position:absolute; width:77%; height:20px; top:276px; left:35px;color:#FF0000"></div>
        </div>
    </div>
    <div style="clear:both; background-color:#E8E8E8; width:95%; height:100px; margin:auto; position:relative ">
    	<input type="submit" class="createAcc" name="createAcc" value="TẠO TÀI KHOẢN" onclick="return checkAcc();" />
        </form>
        <a href="mensport.com?dangnhap"><p class="back1"><i class="fas fa-undo-alt"></i>Trở lại</p></a>
    </div>
</div>
