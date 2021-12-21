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
    document.getElementById("address").style.background='#E8E8E8';
function checkCity(){
	var city=document.getElementById("city").value;
	if(city=="Tỉnh/Thành Phố") {document.getElementById("kt7").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng chọn Tỉnh/Thành Phố';
		return false;	}
	else {document.getElementById("kt7").innerHTML="";}
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
function checkAddr(){
var check3=checkAddress();
var check7=checkCity();
var check8=checkDistrict();
var check9=checkWard();
if(check7==true&&check8==true&&check9==true&&check3==true) return true;
else return false;
}
function selectAddr(addr){
    location.replace("xuliSelectAddr.php?addr="+addr);
}
function delAddr(addr){
    location.replace("xuliDelAddr.php?addr="+addr);
}
</script>
<div style="width:100%; height:80%; margin-top:50px; background: #E8E8E8; position: relative">
    <h3 style="margin-top:20px; padding-top:20px; padding-left:40px">Địa Chỉ</h3>
    <div style="width:50%; height:85%; float:left; margin-top: 40px"> 
        <p style="margin-left:40px; font-size:18px"><b>Địa Chỉ Giao Hàng Mặc Định</b></p>
        <p style="margin-left:40px; font-size:17px"><?php echo $user[4] ?></p>
        <p style="margin-left:40px; font-size:18px;margin-top: 40px"><b>Danh Sách Địa Chỉ Giao Hàng Của Tôi</b></p>
        <div style="width:82%; height:65%;margin-left:40px; overflow-y:scroll">
            <?php
            $sql="select * from delivery_address where id_user=".$user[7];
            $list=pdo_query($sql);
            foreach($list as $l)
            {
                $a="'".$l["address"]."'";
                echo '<div style="width:100%">
                        <p style="font-size:17px; width:70%; float:left">';
                            $arr = explode(",",$l["address"]);
                            echo $arr[0].'</br>'.$arr[1].'</br>'.$arr[2].'</br>'.$arr[3];
                        echo '</p>
                        <div style="width:30%; float:right">
                            <p class="addr" onclick="selectAddr('.$a.')"><i>Đặt làm mặc định</i></p>
                            <p class="addr" onclick="delAddr('.$a.')"><i>Xóa địa chỉ</i></p>
                        </div>
                </div>';
            }
            ?> 
        </div>
    </div>
    <div style="width:50%; height:85%; float:right; margin-top: 40px; position: relative"> 
    <p style="margin-left:40px; font-size:18px"><b>Thêm Địa Chỉ Giao Hàng</b></p>
    <form method="post" action="addAddr.php">
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
    <div id="kt7" style="position:absolute; width:77%; height:20px; top:103px; left:35px;color:#FF0000"></div>	
    <select class="form-select" aria-label="Default select example" id="district" name="district" onchange="selectDistrict()" style="width:77%; margin-left:35px; margin-top:35px">
        <option selected>Quận/Huyện</option>
    </select>
    <div id="kt8" style="position:absolute; width:77%; height:20px; top:175px; left:35px;color:#FF0000"></div>
    <select class="form-select" aria-label="Default select example" id="ward" name="ward" style="width:77%; margin-left:35px; margin-top:35px">
        <option selected>Phường/Xã</option>
    </select>
    <div id="kt9" style="position:absolute; width:77%; height:20px; top:248px; left:35px;color:#FF0000"></div>
    <div class="input-group mb-3" style="width:77%; margin-left:35px; margin-top:35px">
         <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtaddress" id="txtaddress" placeholder="Địa chỉ"   /> 
    </div>
    <div id="kt3" style="position:absolute; width:77%; height:20px; top:324px; left:35px;color:#FF0000"></div>	
    <input type="submit" class="btn btn-danger" style="width:100px; height:40px; margin-left:40px; font-size:17px; margin-top:70px" value="Lưu Lại" onclick="return checkAddr();"></input>
    </div>
    </form>
</div>
<style>
.addr{
    font-size:13px; 
    margin-top:20px;
    cursor: pointer;
}
.addr:hover{
    color:#ff5f17
}
</style>