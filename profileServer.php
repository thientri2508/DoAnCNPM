<script>
document.getElementById("admin").style.background="#E8E8E8";
document.title="Thông Tin Cá Nhân";
function DNprofile(){
var pass=document.getElementById("inputPassword").value;
var passAdmin="<?php $admin=$_SESSION['adminlogin']; echo $admin[1]; ?>";
if(md5(pass)==passAdmin) {
	var id=<?php $admin=$_SESSION['adminlogin']; echo $admin[7]; ?>;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	   document.getElementById("profile").innerHTML = this.responseText;
		}
	 };
	xmlhttp.open("GET", "DN_Profile.php?id=" + id , true);
	xmlhttp.send();
	}
else alert("Sai Mật Khẩu!");
}
function checkNameAcc(){
	var ten=[];
	ten=document.getElementById("namead").value;
	var name=document.getElementById("namead").value;
	if(name=="")	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên người dùng không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt1").innerHTML="";}
	if(ten.length>20)	{document.getElementById("kt1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên tài khoản không dược quá 20 kí tự';
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
	document.getElementById("kt1").innerHTML="";
	return true;
}
function checkPhone(){
	var sdt=[];
	sdt=document.getElementById("phonead").value;
	var phone=document.getElementById("phonead").value;
	if(phone=="")	{document.getElementById("kt2").innerHTML='<i class="fas fa-exclamation-circle"></i> Số điện thoại không dược bỏ trống';
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
	var t=[];
	t=document.getElementById("addressad").value;
	var add=document.getElementById("addressad").value;
	if(add=="")	{document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Địa chỉ không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt3").innerHTML="";}
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("kt3").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("kt3").innerHTML="";
	return true;
}
function checkPass(){
	var mk=[];
	mk=document.getElementById("passad").value;
	var pass=document.getElementById("passad").value;
	if(pass=="")	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu không dược bỏ trống';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	if(mk.length<6)	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu phải từ 6 ký tự trở lên';
			return false;	}
	else {document.getElementById("kt4").innerHTML="";}
	for(var i=0;i<mk.length;i++)
	{
		if(mk[i]=="'"||mk[i]=='"') 
		{
			document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("kt4").innerHTML="";
	return true;
}
function checkPrePass(){
	var pass=document.getElementById("prepassad").value;
	var mk=document.getElementById("passad").value;
	if(pass=="")	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng xác nhận lại mật khẩu';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	if(pass!=mk)	{document.getElementById("kt5").innerHTML='<i class="fas fa-exclamation-circle"></i> Xác nhận lại mật khẩu không khớp';
			return false;	}
	else {document.getElementById("kt5").innerHTML="";}
	return true;
}
function checkTTAD(){
var check1=checkNameAcc();
var check2=checkPhone();
var check3=checkAddress();
var check4=checkPass();
var check5=checkPrePass();
if(check1==true&&check2==true&&check3==true&&check4==true&&check5==true) return true;
else return false;
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==5) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Cập Nhật Thông Tin Cá Nhân Thành Công!</b>";
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
<div id="profile"> 
	<div class="profileLogin"> 
    	<h3 style="text-align:center; margin-top:20px"><b><i class="fas fa-key"></i>&nbsp;&nbsp;Vui Lòng Nhập Mật Khẩu&nbsp;&nbsp;<i class="fas fa-lock"></i></b></h3>
		<input type="password" class="form-control" id="inputPassword" style="width:70%; margin:auto; margin-top:20px">
        <button class="btn btn-light" style="width:25%; margin-left:38%; height:45px; font-size:24px; margin-top:30px" onclick="DNprofile()"><i class="fas fa-unlock-alt"></i></button>
        <div style="width:30%; margin:auto; text-align:center; margin-top:30px">
    		<i class="fas fa-spinner fa-2x"></i>
        </div>
    </div>
    
</div>
</div>
