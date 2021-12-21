<script>
document.getElementById("slide").style.display='none';
document.title='Verify Email';
document.getElementById("content").style.height='700px';
</script>
<?php
if(!isset($_SESSION['TTTK'])) {
	echo '<script>location.replace("mensport.com");</script>';	
}else{
	$tt=$_SESSION['TTTK'];
	$maXT=rand(1000,9999);
	include('class.smtp.php');
    include "class.phpmailer.php"; 
    include "functions.php"; 
    $title = 'mensport.com - MÃ XÁC THỰC ĐĂNG KÝ TÀI KHOẢN';
    $content = 'Mã xác thật của bạn là: '.$maXT;
    $nTo = '';
    $mTo = $tt[0];
    $diachicc = $tt[0];
    $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
}
?>
<div style="width:100%; height:700px;">
	<img src="photo/back.png" class="backDK" onclick="backDK()" />
	<img src="photo/verify.png" style="margin-left:44%; margin-top:70px" />
	<h2 style="font-feature-settings: 'kern'; width:70%; height:40px; line-height:40px; margin: auto; text-align:center; color:#ff5f17; margin-top:50px"><b>XÁC MINH EMAIL</b></h2>
    <h4 style="font-feature-settings: 'kern'; width:100%; height:40px; line-height:40px; margin: auto; text-align:center; margin-top:40px">Mã xác minh đã được gửi đến Email "<?php echo $tt[0] ?>"</h4>
    <img src="photo/load-verify.gif" style="margin-left:45%; margin-top:30px; width:100px; height:100px"/>
	<div style="width:100%; height:100px; margin-top:40px; position:relative">
    	<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="opt" placeholder="Nhập mã xác minh" style="width:20%; float:left; margin-left:35%"/>
        <input type="submit" class="btn btn-dark" style="width:10%" id="verify" value="XÁC THỰC" onclick="xacthuc();" />
        <div id="kt" style="position:absolute; width:75%; height:20px; top:60px; left:490px; color:#FF0000"></div>
    </div>
</div>
<script>
var id=<?php echo $maXT ?>;
function xacthuc(){
	var i=document.getElementById("opt").value;
	if(i==id){
		location.replace("DKTK.php");
	}else{
		document.getElementById("kt").innerHTML='<i class="fas fa-exclamation-circle"></i> Mã xác minh không hợp lệ';
	}
}
function backDK(){
window.history.back();
}
</script>