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
    document.getElementById("changeinfor").style.background='#E8E8E8';
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
function checkTTAD(){
    var check1=checkNameAcc();
    var check2=checkPhone();
    if(check1==true&&check2==true) return true;
    else return false;
}
</script>
<div style="width:100%; height:80%; margin-top:50px; background: #E8E8E8; position: relative">
    <h3 style="margin-top:20px; padding-top:20px; padding-left:40px">Chỉnh Sửa Thông Tin Cá Nhân</h3>
    <p style="margin-left:40px; margin-top:40px; font-size:20px">Thông Tin Cá Nhân</p>
    <form method="post" action="fixProfileUser.php">
    <p style="margin-left:40px; margin-top:40px;font-size:17px">Họ Tên<i class="fas fa-tag" style="margin-left:40px"></i></p>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $fullname; ?>" style="width:75%; margin-left:40px" name="namead" id="namead">
	<div id="kt1" style="position:absolute; width:77%; height:20px; top:245px; left:40px;color:#FF0000"></div>
    <p style="margin-left:40px; margin-top:30px;font-size:17px">Số Điện Thoại<i class="fas fa-phone-volume" style="margin-left:40px"></i></p>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $phone; ?>" style="width:75%; margin-left:40px" name="phonead" id="phonead">
	<div id="kt2" style="position:absolute; width:77%; height:20px; top:355px; left:40px;color:#FF0000"></div>
    <input type="submit" class="btn btn-danger" style="width:100px; height:40px; margin-left:40px; font-size:17px; margin-top:70px" value="Lưu Lại" onclick="return checkTTAD();"></input>
    </form>
</div>