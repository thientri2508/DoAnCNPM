<script>
document.getElementById("sale").style.background="#E8E8E8";
function saleoff(id){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    document.getElementById("test").innerHTML = this.responseText;
      }
    };
xmlhttp.open("GET", "addsaleSP.php?id=" + id , true);
xmlhttp.send();
	document.getElementById("thongbaoad").innerHTML="<b>Đã Thêm Vào Chương Trình Khuyến Mãi!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="green";
	setTimeout(closeTBAD,3000);
}
function closeTBAD(){
document.getElementById("thongbaoad").style.display="none";
}
function searchSPadmin(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listSPadmin").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "searchSPadmin1.php?s=" +searchSP , true);
    xmlhttp.send();
	}
}
function slspSearch(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("KQsearchSale").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "slspSearch1.php?s=" +searchSP , true);
    xmlhttp.send();
	}
}
</script>
<div style="width:100%; height:1150px">
<h1 class="titleFont1">GIẢM GIÁ SẢN PHẨM</h1>
<div style="width:100%; height:90px; margin-top:30px">
<div style="float:left; margin-top:40px; margin-left:75px; width:40%">
    <div class="d-flex" style="margin-left:10px">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchAD">
      <button class="btn btn-outline-success" type="submit" style="width:120px;" onClick="slspSearch();searchSPadmin();"><i class="fab fa-searchengin fa-2x"></i></button>
    </div>   
</div>
<a href="server.php?category=sale-off&&act=saleSP"><button type="button" class="btn btn-light" style="float:right; color:#000000;width:200px; height:60px; margin-right:100px; margin-top:30px; font-size:30px"><b>CTKM&nbsp;&nbsp;</b><img src="photo/price-tag.png" style="width:45px; height:45px; margin-top:-5px" /></button></a>
</div>
 <h4 id="KQsearchSale"></h4>
<h4 style="width:40%; margin:auto; text-align:center; margin-top:40px;">DANH SÁCH SẢN PHẨM</h4>
<div style="width:85%; margin:auto; margin-top:30px; background:#6C7B8B; color:#fff;border: 1px solid rgba(0,0,0,0.15); height:60px">
	<h4 style="width:8%; float:left; margin-left:20px; margin-top:13px">ID</h4>
    <h4 style="width:11%; float:left; margin-top:13px">Image</h4>
    <h4 style="width:30%; float:left; margin-left:8px; margin-top:13px">Name</h4>
    <h4 style="width:20%; float:left; margin-left:-16px; margin-top:13px">Price</h4>
    <h4 style="width:15%; float:left; margin-left:-20px; margin-top:13px">Status</h4>
    <h4 style="width:14%; float:left; margin-left:18px; margin-top:13px">Sale</h4>
</div>
<div id="listSPadmin">
	<?php
	$s1='<div style="width:100%; height:130px; background-color: #C6E2FF;">';
	$s2='<div style="width:100%; height:130px; background-color: #B9D3EE;">';
	$s='';
	$sql="SELECT id_product from detail_product WHERE id_detail_properties=18";
	$id_sale=pdo_query($sql);
	foreach($id_sale as $sale){
		extract($sale);
		$s.=" AND id!=".$id_product;
	}
	$sql="select * from product where del!='del'".$s;
	$product=pdo_query($sql);
	for($i=0;$i<count($product);$i++){
		  extract($product[$i]);
		  $sql="SELECT detail_properties.name as 'status' FROM detail_properties,detail_product WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $tt=pdo_query_one($sql);
		  if($i%2==0) {echo $s1;}
		  else {echo $s2;}
		  echo '<div style="width:8%;padding-left:15px" class="listItem"><b>'.$id.'</b></div>
        <div style="width:11%; background:#fff" class="listItem">
		<img src="photo/'.$image.'" style="width:100%; height:100%" />		
        </div>
        <div style="width:30%; padding-left:30px;" class="listItem"><b>'.$name.'</b></div>
        <div style="width:20%;padding-left:20px;" class="listItem"><b>'.$price.'</b></div>
        <div style="width:15%" class="listItem"><b>'.$tt["status"].'</b></div>
        <div style="width:15%; padding-left:18px" class="listItem">
		<img src="photo/discount.png" style="width:50px; height:50px" onclick="saleoff('.$id.')" />
        </div>
    </div>';
	}
	?>
</div> 
<div id="test"></div>
</div>