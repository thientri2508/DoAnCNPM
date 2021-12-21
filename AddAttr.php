<?php
include 'pdo.php';
$sql="select * from detail_properties";
$list=pdo_query($sql);
echo '<div style="width:38%; margin-left:33%; height:650px; background:#FFFFFF; position:fixed; margin-top:50px">
    	<h3 style="margin-top:30px; width:100%; text-align:center">Thêm Thuộc Tính Sản Phẩm</h3>
        <form method="post" action="xuliaddAttr.php">
        <h5 style="margin-left:60px; margin-top:40px">Tên Thuộc Tính<i class="fas fa-tag" style="margin-left:40px"></i></h5>
        <div class="input-group mb-3" style="width:80%; margin-left:60px">
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="nameAttr">
        </div>
    	<div id="err" style="position:absolute; width:80%; left:60px; top:175px; height:25px; color:#FF0000"></div>
        <h5 style="margin-left:60px; margin-top:30px">Chọn Chi Tiết Thuộc Tính</h5>
       <div style="width:80%; height:270px; margin-left:60px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15);">';
$d=0;
foreach($list as $l){
	$sql="select * from set_properties where id_detail_properties=".$l['id'];
	$check=pdo_query($sql);
	if(count($check)==0){
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="detail-'.$l["id"].'">
              <label class="form-check-label" for="flexCheckDefault"><b>'.$l["name"].'</b></label>
            </div>';
		$d++;
	}
}
if($d==0) {
	echo '<h6 style="color:#FF0000">Các chi tiết thuộc tính đã được thiết lập - Vui lòng tạo thêm chi tiết thuộc tính mới!</h6>';
}
echo ' </div>
        <div style="width:80%; margin:auto; height:60px; margin-top:40px">
        	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameAttr();" value="Thêm"></input>
        </form>
			<button type="button" class="btn btn-danger" style="float:right; font-size:24px; width:120px" onclick="huyADD()">Hủy</button>
        </div>
    </div>';
?>