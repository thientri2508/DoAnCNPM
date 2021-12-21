<?php
$sql="select * from role where id='".$_GET['ID']."'";
$role=pdo_query_one($sql);
?>
<div style="width:100%; height:850px">
<h1 style="font-feature-settings: 'kern'; margin:auto; width:70%; text-align:center; margin-top:30px"><b>CHỈNH SỬA QUYỀN TRUY CẬP</b></h1>
<div style="float:left; margin-left:60px; width:40%; height:530px; border: 1px solid rgba(0,0,0,0.15); margin-top:50px; position:relative">
	<div style="width:100%; height:40px; background:#FFFFFF; font-size:18px; line-height:40px; text-align:center; color:#f15e2c"><b>Thông Tin Quyền</div>
	<h4 style="margin-left:60px; margin-top:35px">Mã Quyền</h4>
    <form method="post" action="xulifixRole.php" >
    <input type="text" class="form-control" aria-label="Sizing example input" name="idRole" id="as" aria-describedby="inputGroup-sizing-default" style="width:70%; margin-top:10px; margin-left:60px" value="<?php echo $role['id'] ?>" readonly>
    <h4 style="margin-top:30px;margin-left:60px">Tên Quyền</h4>
    <input type="text" class="form-control" aria-label="Sizing example input" name="nameRole" id="ad" aria-describedby="inputGroup-sizing-default" style="width:70%; margin-top:10px;margin-left:60px" value="<?php echo $role["name"] ?>">
     <div id="error2" style="position:absolute; width:80%; left:60px; top:260px; height:25px; color:#FF0000"></div>
</div>
<div style="float:right; margin-right:60px; width:40%;border: 1px solid rgba(0,0,0,0.15);height:530px; margin-top:50px">
<div style="width:100%; height:40px; background:#FFFFFF; font-size:18px; line-height:40px; text-align:center; color:#f15e2c"><b>Chọn Chức Năng</div>
<?php
$sql="select * from category_admin";
$cate=pdo_query($sql);
$sql="select * from job where id_role='".$_GET['ID']."'";
$list=pdo_query($sql);
foreach($cate as $a){
	$check=true;
	foreach($list as $l){
		if($a["id"]==$l["job"]){
			$check=false;
			break;
		}
	}
	if($check){
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="role-'.$a["id"].'">
              <label class="form-check-label" for="flexCheckDefault"><b>'.$a["name"].'</b></label>
            </div>';
	}else {
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="role-'.$a["id"].'" checked>
              <label class="form-check-label" for="flexCheckDefault"><b>'.$a["name"].'</b></label>
           </div>';
	}
}?>
</div>
<div style="clear:both; width:100%; height:150px">
	<input type="submit" style="margin-top:60px; font-size:22px; width:130px; margin-left:44%" class="btn btn-success" value="Cập Nhật" onClick="return checkTTRole();" > 
    </form>
</div>
</div>
<script>
function checkTTRole(){
	var c2=checkNameRole();
	if(c2==true) return true;
	return false;
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
