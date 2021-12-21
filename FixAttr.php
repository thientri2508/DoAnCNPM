<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select name from properties where id=".$id;
$name=pdo_query_one($sql);
$sql="select * from detail_properties";
$list=pdo_query($sql);
echo '<div style="width:38%; margin-left:33%; height:650px; background:#FFFFFF; position:fixed; margin-top:50px">
    	<h3 style="margin-top:30px; width:100%; text-align:center">Chỉnh Sửa Thuộc Tính Sản Phẩm</h3>
        <form method="post" action="xuliFixAttr.php">
		<input type="hidden" name="id" value="'.$id.'" >
        <h5 style="margin-left:60px; margin-top:40px">Tên Thuộc Tính<i class="fas fa-tag" style="margin-left:40px"></i></h5>
        <div class="input-group mb-3" style="width:80%; margin-left:60px">
          <input type="text" class="form-control" aria-label="Sizing example input" value="'.$name["name"].'" aria-describedby="inputGroup-sizing-default" name="name" id="nameAttr">
        </div>
    	<div id="err" style="position:absolute; width:80%; left:60px; top:175px; height:25px; color:#FF0000"></div>
        <h5 style="margin-left:60px; margin-top:30px">Chọn Chi Tiết Thuộc Tính</h5>
       <div style="width:80%; height:270px; margin-left:60px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15);">';
$sql="SELECT detail_properties.id,detail_properties.name FROM detail_properties,properties,set_properties WHERE properties.id=set_properties.id_properties AND set_properties.id_detail_properties=detail_properties.id AND properties.id=".$id;
$res=pdo_query($sql);
foreach($res as $r){
	echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="detail-'.$r["id"].'" checked>
              <label class="form-check-label" for="flexCheckDefault"><b>'.$r["name"].'</b></label>
           </div>';
}
foreach($list as $l){
	$sql="select * from set_properties where id_detail_properties=".$l['id'];
	$check=pdo_query($sql);
	if(count($check)==0){
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="detail-'.$l["id"].'">
              <label class="form-check-label" for="flexCheckDefault"><b>'.$l["name"].'</b></label>
            </div>';
	}
}
echo ' </div>
        <div style="width:80%; margin:auto; height:60px; margin-top:40px">
        	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameAttr();" value="Cập Nhật"></input>
        </form>
			<button type="button" class="btn btn-danger" style="float:right; font-size:24px; width:120px" onclick="huyFIX()">Hủy</button>
        </div>
    </div>';
?>