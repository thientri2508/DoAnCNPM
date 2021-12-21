<script>
document.getElementById("slide").style.display='none';
document.title='Forgot Password';
document.getElementById("content").style.height='600px';
</script>
<?php
if(isset($_SESSION['DKTC'])) {
		echo '<script>document.getElementById("thongbao").innerHTML="<b>Địa Chỉ Email Không Tồn Tại</b>";
		document.getElementById("thongbao").style.color="red";
		document.getElementById("thongbao").style.display="block";
		function closeTB(){
			document.getElementById("thongbao").style.display="none";
		}
		setTimeout(closeTB,3000);
		</script>';
		unset($_SESSION['DKTC']);
}
?>
<div style="width:100%; height:600px;">
	<img src="photo/back.png" class="backDK" onclick="backDK()" />
	<img src="photo/wrong-password.png" style="margin-left:45%; margin-top:70px" />
    <h2 style="font-feature-settings: 'kern'; width:70%; height:40px; line-height:40px; margin: auto; text-align:center; color:#ff5f17; margin-top:50px"><b>LẤY LẠI MẬT KHẨU</b></h2>
    <h4 style="font-feature-settings: 'kern'; width:100%; height:40px; line-height:40px; margin: auto; text-align:center; margin-top:60px">Vui lòng nhập địa chỉ Email</h4>
    <div style="width:100%; height:100px; margin-top:30px; position:relative">
    	<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="mail" placeholder="Địa chỉ Email của bạn" style="width:25%; float:left; margin-left:34%"/>
        <button type="button" class="btn btn-dark" style="width:85px" onclick="forgotpass();"><i class="fas fa-angle-double-right" style="font-size:24px"></i></button>
         <div id="kt" style="position:absolute; width:75%; height:20px; top:60px; left:515px; color:#FF0000"></div>
    </div>
</div>
<script>
function forgotpass(){
	var m=[];
	m=document.getElementById("mail").value;
	var mail=document.getElementById("mail").value;
	for(var i=0;i<m.length;i++)
	{
		if(m[i]=="'"||m[i]=='"') 
		{
			document.getElementById("kt").innerHTML='<i class="fas fa-exclamation-circle"></i> Email không hợp lệ';
			return;
		}
	}
	location.replace("xuliForgotPass.php?mail="+mail);
}
function backDK(){
window.history.back();
}
</script>