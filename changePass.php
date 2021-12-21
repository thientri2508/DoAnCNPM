<?php
    if(isset($_SESSION['userlogin'])){
        $user=$_SESSION['userlogin'];
        $sql="select * from account where id=".$user[7];
        $acc=pdo_query_one($sql);
        extract($acc);
    }else {
    echo '<script>location.replace("mensport.com");</script>';
}
?>
<script>
    document.getElementById("changepass").style.background='#E8E8E8';
function checkOldPass(){
	var mk=[];
    var a="<?php echo $user[1] ?>";
	mk=document.getElementById("oldpass").value;
	var pass=document.getElementById("oldpass").value;
	if(pass=="")	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập mật khẩu hiện tại';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	if(mk.length<6)	{document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu hiện tại không đúng';
			return false;	}
	else {document.getElementById("kt6").innerHTML="";}
	for(var i=0;i<mk.length;i++)
	{
		if(mk[i]=="'"||mk[i]=='"') 
		{
			document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu hiện tại không đúng';
			return false;
		}
	}
	document.getElementById("kt6").innerHTML="";
    if(md5(pass)!=a) {
        document.getElementById("kt6").innerHTML='<i class="fas fa-exclamation-circle"></i> Mật khẩu hiện tại không đúng';
		return false;
    }
    document.getElementById("kt6").innerHTML="";
	return true;
}    
function checkPass(){
	var mk=[];
	mk=document.getElementById("passad").value;
	var pass=document.getElementById("passad").value;
	if(pass=="")	{document.getElementById("kt4").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập mật khẩu mới';
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
    var check1=checkPass();
    var check2=checkPrePass();
    var check3=checkOldPass()
    if(check1==true&&check2==true&&check3==true) return true;
    else return false;
}
</script>
<div style="width:100%; height:80%; margin-top:50px; background: #E8E8E8; position: relative">
    <h3 style="margin-top:20px; padding-top:20px; padding-left:40px">Đổi Mật Khẩu</h3>
    <form method="post" action="changePassUser.php">
    <p style="margin-left:40px; margin-top:60px;font-size:17px">Mật Khẩu Hiện Tại</p>
    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="oldpass" id="oldpass">
	<div id="kt6" style="position:absolute; width:77%; height:20px; top:200px; left:40px;color:#FF0000"></div>
    <p style="margin-left:40px; margin-top:30px;font-size:17px">Mật Khẩu Mới</p>
    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="passad" id="passad">
	<div id="kt4" style="position:absolute; width:77%; height:20px; top:315px; left:40px;color:#FF0000"></div>
    <p style="margin-left:40px; margin-top:30px;font-size:17px">Xác Nhận Mật Khẩu Mới</p>
    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="prepassad" id="prepassad">
	<div id="kt5" style="position:absolute; width:77%; height:20px; top:430px; left:40px;color:#FF0000"></div>
    <input type="submit" class="btn btn-danger" style="width:100px; height:40px; margin-left:40px; font-size:17px; margin-top:70px" value="Lưu Lại" onclick="return checkTTAD();"></input>
    </form>
</div>