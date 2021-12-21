<?php
include 'pdo.php';
echo '<div style="width:40%; height:550px; position:fixed; margin-top:80px; background:#FFFF; margin-left:30%;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; border-radius:10%">';
echo '<h2 style="font-family: Tahoma; width:80%; margin:auto; text-align:center; margin-top:30px"><b>Thay Đổi Địa Chỉ</b></h2>';
echo '<form method="post" action="xuliFixAddress.php">';
echo '<select class="form-select" aria-label="Default select example" style="width:70%; margin-left:90px; margin-top:60px" id="city" name="city" onchange="selectCity()">
      	<option selected>Tỉnh/Thành Phố</option>';
$sql="select * from province";
$tp=pdo_query($sql);
foreach($tp as $t){
	echo '<option>'.$t["_name"].'</option>';
}
echo '</select>
<div id="kt1" style="position:absolute; width:77%; height:20px; top:168px; left:95px;color:#FF0000"></div>	
            <select class="form-select" aria-label="Default select example" id="district" name="district" onchange="selectDistrict()" style="width:70%; margin-left:90px; margin-top:30px">
              <option selected>Quận/Huyện</option>
            </select>
            <div id="kt2" style="position:absolute; width:70%; height:20px; top:235px; left:95px;color:#FF0000"></div>
            <select class="form-select" aria-label="Default select example" id="ward" name="ward" style="width:70%; margin-left:90px; margin-top:30px">
              <option selected>Phường/Xã</option>
            </select>
            <div id="kt3" style="position:absolute; width:77%; height:20px; top:305px; left:95px;color:#FF0000"></div>
            <div class="input-group mb-3" style="width:70%; margin-left:90px; margin-top:30px">
             <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="txtaddress" id="txtaddress" placeholder="Địa chỉ" style="margin-bottom:60px"  /> 
            </div>
            <div id="kt4" style="position:absolute; width:70%; height:20px; top:372px; left:95px;color:#FF0000"></div>';
echo '<div style="width: 70%; margin: auto; height:50px">
      <input type="submit" class="btn btn-success" type="button" style="height:50px; float:left; width:130px" value="Cập Nhật" onclick="return checkFixAddress();">
	  </form>
      <button class="btn btn-danger" type="button" style="height:50px;float:right; width:130px" onclick="cancel_xoaDH()">Hủy</button>
    </div>
</div>';
?>