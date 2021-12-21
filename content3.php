<script>
document.getElementById("slide").style.display='none';
document.title='Đăng Nhập';
document.getElementById("content").style.height='520px';
function ktDN(){
var check=true;
var c1=[];
c1=document.getElementById("username").value;
var c2=[];
c2=document.getElementById("inputPassword").value;
for(var i=0;i<c1.length;i++)
{
	if(c1[i]=="'"||c1[i]=='"') 
	{
		check=false;
		break;
	}
}
for(var i=0;i<c2.length;i++)
{
	if(c2[i]=="'"||c2[i]=='"') 
	{
		check=false;
		break;
	}
}
if(check==true){
	var taikhoan=document.getElementById("username").value;
	var matkhau=document.getElementById("inputPassword").value;
	//var preURL=document.referrer;
	//console.log(preURL);
	//console.log(u);
	location.replace("xuliDN.php?tk="+taikhoan+"&&mk="+matkhau);
}else{
	document.getElementById("thongbao").innerHTML="<b>Sai Địa Chỉ Email Hoặc Mật Khẩu</b>";
	document.getElementById("thongbao").style.color="red";
	document.getElementById("thongbao").style.fontSize="18px";
	document.getElementById("thongbao").style.display="block";
	setTimeout(closeTB,3000);
}
}
</script>
<?php 
if(isset($_SESSION['DKTC'])) {
		echo '<script>document.getElementById("thongbao").innerHTML="<b>Đăng Ký Tài Khoản Thành Công!</b>";
		document.getElementById("thongbao").style.color="green";
		document.getElementById("thongbao").style.display="block";
		function closeTB(){
			document.getElementById("thongbao").style.display="none";
		}
		setTimeout(closeTB,3000);
		</script>';
		unset($_SESSION['DKTC']);
}
if(isset($_SESSION['FP'])) {
		include('class.smtp.php');
		include "class.phpmailer.php"; 
		include "functions.php"; 
		$title = 'mensport.com - LẤY LẠI MẬT KHẨU TÀI KHOẢN';
		$content = 'Mật khẩu mới của bạn là: 123456   -Vui lòng thay đổi mật khẩu này để có tính bảo mật cao!';
		$nTo = '';
		$mTo = $_SESSION['FP'];
		$diachicc = $_SESSION['FP'];
		$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
		echo '<script>document.getElementById("thongbao").innerHTML="<b>Mật Khẩu Mới Đã Được Gửi Đến Email Của Bạn!</b>";
		document.getElementById("thongbao").style.color="green";
		document.getElementById("thongbao").style.fontSize="16px";
		document.getElementById("thongbao").style.display="block";
		function closeTB(){
			document.getElementById("thongbao").style.display="none";
		}
		setTimeout(closeTB,3000);
		</script>';
		unset($_SESSION['FP']);
}
?>
<div style="width:100%; height:400px">
    <div style="width:60%; height:400px; float:left; position:relative">
    <h4 style="font-feature-settings: 'kern'; margin-top:30px;background-color:#E8E8E8; width:93%; font-size:23px; height:40px; line-height:40px; padding-left:20px"><b>KHÁCH HÀNG ĐĂNG NHẬP</b></h4>
    <p style="font-size:14px; margin:0px; margin-left:10px; margin-top:25px">Khách hàng đã đăng ký</p>
    <p style="font-size:14px; margin:0px;margin-left:10px; margin-top:15px">Nếu bạn có một tài khoản, hãy đăng nhập bằng địa chỉ tài khoản của bạn.</p>
     <div class="input-group mb-3" style="width:77%; margin-left:10px; margin-top:30px">
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="username" placeholder="Nhập Email"   />
    </div>
    <div class="col-sm-10" style="width:77%; margin-left:10px; margin-top:35px">
      <input type="password" class="form-control" id="inputPassword" name="txtpass" placeholder="Mật khẩu">
    </div>
    <div style="background-color:#000000; height:40; font-size:18px; font-feature-settings: 'kern'; cursor:pointer; width:150px; color:#FFFFFF; line-height:40px; text-align:center; margin-left:10px; margin-top:40px" onclick="ktDN()"><b>ĐĂNG NHẬP</b></div>
    <a href="mensport.com?forgotpassword"><h6 class="quenMK">Quên mật khẩu?</h6></a>
    </div>
    <div style="width:40%; height:400px; float:right; background:#E8E8E8; margin-top:30px">
    <p style="font-size:14px; margin:0px; margin-left:20px; margin-top:62px">Khách hàng mới</p>
    <p style="font-size:14px; margin:0px; margin-left:20px; margin-top:15px">Tạo một tài khoản có nhiều lợi ích: kiểm tra nhanh hơn, giữ nhiều hơn một địa chỉ, theo dõi các đơn đặt hàng và nhiều hơn nữa.</p>
    <a href="mensport.com?dangki"><div style="background-color:#000000; height:40; font-size:18px; font-feature-settings: 'kern'; cursor:pointer; width:180px; color:#FFFFFF; line-height:40px; text-align:center; margin-left:20px; margin-top:35px"><b>TẠO TÀI KHOẢN</b></div></a>
    </div>	
</div>
<div id="test"></div>
