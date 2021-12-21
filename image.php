<script>
document.getElementById("img").style.background="#E8E8E8";
</script>
<?php 
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm File Ảnh Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			document.getElementById("thongbaoad").style.fontSize="30px";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Hình Ảnh Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			document.getElementById("thongbaoad").style.fontSize="30px";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==3) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thay Đổi Hình Ảnh Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			document.getElementById("thongbaoad").style.fontSize="24px";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
}
?>
<div style="width:100%; height:1300px">
<h1 class="titleFont1">QUẢN LÍ GIAO DIỆN</h1>
<div style="width:100%; margin-top:60px; height:500px">
	<div style="width:42%; height:100%; background:#FFFFFF; float: left; margin-left:50px">
   		<form method="post" action="uploadFile.php" enctype="multipart/form-data">
    	<h2 style="width:100%; background:#000000; color:#FFFFFF; text-align:center; height:60px; line-height:60px">Thêm Hình Ảnh</h2>
        <h5 style="width:100%; text-align:center; margin-top:100px">Upload File Ảnh (.jpg,.png,.jpeg)<i class="far fa-images" style="margin-left:30px"></i></h5>
        <input class="form-control" type="file" name="file[]"  multiple style="margin-left:40px; margin-top:30px; width:80%">
        <input type="submit" class="btn btn-success" value="Thêm" style="width:100px; height:40px; margin-left:38%; margin-top:50px"></input>
        </form>
    </div>
    <div style="width:42%; height:100%; background:#FFFFFF; float: right; margin-right:50px">
    	<h2 style="width:100%; background:#000000; color:#FFFFFF; text-align:center; height:60px; line-height:60px">Danh Sách Hình Ảnh</h2>
        <div style="width:100%; height:400px; overflow-y:scroll">
        	<?php
			$sql="select * from image_adv";
			$image=pdo_query($sql);
			foreach($image as $i){
				echo '<div style="width:80%; height:180px; margin-left:50px; margin-top:20px; position:relative"  onmouseover="over('.$i["id"].');" onmouseout="out('.$i["id"].');">
            			<img src="photo/image_adv/'.$i["name"].'" style="width:100%; height:100%" id="img-'.$i["id"].'">
						<button class="btn btn-danger" style="position:absolute; z-index:3; display:none; top:70px; left:155px; width:100px; height:40px" id="btn-'.$i["id"].'" onclick="delImg('.$i["id"].')"><b>XÓA</b></button>
           			 </div>';
			}
			?> 
        </div>
    </div>
</div>
<h3 style="margin:auto; margin-top:80px; width:70%; text-align:center"><b>Ảnh Quảng Cáo 1</b></h3>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height:400px; width:800px; margin:auto; margin-top:20px">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <?php
	  $sql="SELECT image_adv.id,image_adv.name from image_adv,adv WHERE adv.id_adv=1 AND adv.id_img=image_adv.id";
	  $adv1=pdo_query($sql);
	  $i=1;
	  foreach($adv1 as $a){
		if($i==1) echo '<div class="carousel-item active">';
		else echo '<div class="carousel-item">';
		echo	'<img src="photo/image_adv/'.$a["name"].'" class="d-block w-100" width="800" height="400" style="position:relative">
				<button type="button" class="btn btn-outline-warning" style="position:absolute; z-index:3; top:30px; right:30px; width:100px; height:40px" id="change-'.$a["id"].'" onclick="changeImg('.$a["id"].')"><b>Change</b></button>
			</div>';
		$i++;
	  }
	  ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<script>
function over(id){
	document.getElementById("btn-"+id).style.display='block';
	document.getElementById("img-"+id).style.opacity='0.3';
}
function out(id){
	document.getElementById("btn-"+id).style.display='none';
	document.getElementById("img-"+id).style.opacity='1';
}
function over1(id){
	document.getElementById("select-"+id).style.display='block';
	document.getElementById("imgChange-"+id).style.opacity='0.3';
}
function out1(id){
	document.getElementById("select-"+id).style.display='none';
	document.getElementById("imgChange-"+id).style.opacity='1';
}
function delImg(id){
	location.replace("delImg.php?id="+id);
}
function changeImg(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("AddAttr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "changeImgAdv.php?id=" + id , true);
    xmlhttp.send();
	document.getElementById("AddAttr").style.display="block";
}
function closeChange(){
	document.getElementById("AddAttr").style.display="none";
}
function selectImg(id1,id2){
	location.replace("xuliChangeImg.php?id1="+id1+"&&id2="+id2);
}
</script>