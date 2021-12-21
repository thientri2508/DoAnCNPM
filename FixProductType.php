<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="select * from product_type where id=".$id;
$type=pdo_query_one($sql);
echo '<div style="width:38%; margin-left:33%; height:650px; background:#FFFFFF; position:fixed; margin-top:50px">
    	<h3 style="margin-top:30px; width:100%; text-align:center">Chỉnh Sửa Loại Sản Phẩm</h3>
        <form method="post" action="xuliFixProductType.php">
		<input type="hidden" name="id" value="'.$id.'" >
        <h5 style="margin-left:60px; margin-top:30px">Tên Loại Sản Phẩm<i class="fas fa-tag" style="margin-left:40px"></i></h5>
        <div class="input-group mb-3" style="width:80%; margin-left:60px">
          <input type="text" class="form-control" aria-label="Sizing example input" value="'.$type["name"].'" aria-describedby="inputGroup-sizing-default" name="name" id="nameAttr">
        </div>
    	<div id="err" style="position:absolute; width:80%; left:60px; top:165px; height:25px; color:#FF0000"></div>
		<h5 style="margin-left:60px; margin-top:30px">Kiểu Size</h5>
		<select class="form-select" aria-label="Default select example" style="width:80%; margin-left:60px" name="size">';
		if($type["size"]=='number') {
        	echo '<option selected>number</option>
            <option>freesize</option>';}
		else  {
        	echo '<option>number</option>
            <option selected>freesize</option>';}
        echo '</select>
        <h5 style="margin-left:60px; margin-top:30px">Các Thuộc Tính</h5>
       <div style="width:80%; height:200px; margin-left:60px; overflow-y: scroll; border: 1px solid rgba(0,0,0,0.15);">';
$sql="select * from properties";
$attr=pdo_query($sql);
$sql="select * from properties_of_product_type where id_ProductType=".$id;
$list=pdo_query($sql);
foreach($attr as $a){
	$check=true;
	foreach($list as $l){
		if($a["id"]==$l["id_Properties"]){
			$check=false;
			break;
		}
	}
	if($check){
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="attr-'.$a["id"].'">
              <label class="form-check-label" for="flexCheckDefault"><b>'.$a["name"].'</b></label>
            </div>';
	}else {
		echo '<div class="form-check" style="margin-left:40px; float:left; margin-top:20px">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="attr-'.$a["id"].'" checked>
              <label class="form-check-label" for="flexCheckDefault"><b>'.$a["name"].'</b></label>
           </div>';
	}
}
echo ' </div>
        <div style="width:80%; margin:auto; height:60px; margin-top:40px">
        	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameProductType();" value="Cập Nhật"></input>
        </form>
			<button type="button" class="btn btn-danger" style="float:right; font-size:24px; width:120px" onclick="huyFIX()">Hủy</button>
        </div>
    </div>';

?>