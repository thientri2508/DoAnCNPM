<div style="width:100%; height:850px">
<h1 style="font-feature-settings: 'kern'; margin:auto; width:70%; text-align:center; margin-top:30px"><b>THÊM QUYỀN TRUY CẬP</b></h1>
<div style="float:left; margin-left:60px; width:40%; height:530px; border: 1px solid rgba(0,0,0,0.15); margin-top:50px; position:relative">
	<div style="width:100%; height:40px; background:#FFFFFF; font-size:18px; line-height:40px; text-align:center; color:#f15e2c"><b>Thông Tin Quyền</div>
	<h4 style="margin-left:60px; margin-top:35px">Mã Quyền</h4>
    <form method="post" action="xuliaddRole.php" >
    <input type="text" class="form-control" aria-label="Sizing example input" name="idRole" id="as" aria-describedby="inputGroup-sizing-default" style="width:70%; margin-top:10px; margin-left:60px">
     <div id="error1" style="position:absolute; width:80%; left:60px; top:155px; height:25px; color:#FF0000"></div>
    <h4 style="margin-top:30px;margin-left:60px">Tên Quyền</h4>
    <input type="text" class="form-control" aria-label="Sizing example input" name="nameRole" id="ad" aria-describedby="inputGroup-sizing-default" style="width:70%; margin-top:10px;margin-left:60px">
     <div id="error2" style="position:absolute; width:80%; left:60px; top:260px; height:25px; color:#FF0000"></div>
</div>
<div style="float:right; margin-right:60px; width:40%;border: 1px solid rgba(0,0,0,0.15);height:530px; margin-top:50px">
<div style="width:100%; height:40px; background:#FFFFFF; font-size:18px; line-height:40px; text-align:center; color:#f15e2c"><b>Chọn Chức Năng</div>
<?php
$sql="select * from category_admin";
$cate=pdo_query($sql);
foreach($cate as $c){
	extract($c);
	echo '<div class="form-check" style="margin-top:30px; margin-left:50px; float:left">
			  <input class="form-check-input" type="checkbox" value="'.$id.'" name="check-'.$id.'" id="flexCheckDefault">
			  <label class="form-check-label" for="flexCheckDefault">'.$name.'</label>
		</div>';
} 
?>
</div>
<div style="clear:both; width:100%; height:150px">
	<input type="submit" style="margin-top:60px; font-size:22px; width:130px; margin-left:44%" class="btn btn-success" value="Tạo" onClick="return checkTTRole();" > 
    </form>
</div>
</div>
<script>
function checkTTRole(){
	var c1=checkIDRole();
	var c2=checkNameRole();
	if(c1==true&&c2==true) return true;
	return false;
}
function checkIDRole(){
	var id=[];
	id=document.getElementById("as").value;
	var ID=document.getElementById("as").value;
	if(ID=="")	{document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Mã quyền không được bỏ trống';
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
function checkNameRole(){
	var ten=[];
	ten=document.getElementById("ad").value;
	var name=document.getElementById("ad").value;
	if(name=="")	{document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên quyền không được bỏ trống';
			return false;	}
	else {document.getElementById("error2").innerHTML="";}
	for(var i=0;i<ten.length;i++)
	{
		if(ten[i]=="'"||ten[i]=='"') 
		{
			document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error2").innerHTML="";
	return true;
}
</script>
