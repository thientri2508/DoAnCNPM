<?php
echo '
<div style="width:38%; margin-left:33%; height:650px; background:#FFFFFF; position:fixed; margin-top:50px">
    	<h3 style="margin-top:30px; width:100%; text-align:center">Thêm Chi Tiết Thuộc Tính</h3>
        <form method="post" action="xuliaddCT_Attr.php" enctype="multipart/form-data">
        <h5 style="margin-left:60px; margin-top:40px">Tên Chi Tiết Thuộc Tính<i class="fas fa-tag" style="margin-left:40px"></i></h5>
        <div class="input-group mb-3" style="width:80%; margin-left:60px">
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="name">
        </div>
    	<div id="error" style="position:absolute; width:80%; left:60px; top:175px; height:25px; color:#FF0000"></div>
        <h5 style="margin-left:60px; margin-top:30px">Ảnh Chi Tiết Thuộc Tính<i class="far fa-images" style="margin-left:30px"></i></h5>
        <div style="width:80%; margin-left:60px">
          <input class="form-control form-control-lg" id="formFileLg1" type="file" name="image" onchange="ImagesFileAsURL1(this.id)" onclick="closeImg1()">
        </div> 
        <div id="upload3" style="width:240px; height:220px; margin:auto; margin-top:30px; background:#E8E8E8">
        </div>
        <div style="width:80%; margin:auto; height:60px; margin-top:40px">
        	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameCT_Attr();" value="Thêm"></input>
        </form>
			<button type="button" class="btn btn-danger" style="float:right; font-size:24px; width:120px" onclick="huyADD()">Hủy</button>
        </div>
    </div>';
?>