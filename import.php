<script>
var t='';
function SLSP(id){
	document.getElementById("see-"+id).style.background="#000";
	if(t!='') {
		document.getElementById(t).style.background="";
	}
	t="see-"+id;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("SLSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "SLSP.php?id=" + id , true);
    xmlhttp.send();
}
function closeTBAD(){
document.getElementById("thongbaoad").style.display="none";
} 
function importSP(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("hidden").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "importSP.php?ID=" + id , true);
    xmlhttp.send();
	document.getElementById("thongbaoad").innerHTML="<b>Đã Thêm Vào Phiếu Nhập Hàng!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="green";
	setTimeout(closeTBAD,3000);
}
</script>
<script>
document.getElementById("qlnk").style.background="#E8E8E8";
function searchSPadmin(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("import").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "searchImport.php?s=" +searchSP , true);
    xmlhttp.send();
	}else location.reload();
}
function slspSearch(){
	var s=document.getElementById("searchAD").value;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("KQsearchImport").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "slspSearch.php?s=" +searchSP , true);
    xmlhttp.send();
	}
}
</script>
<?php
if(isset($_SESSION['thongbaoad'])) {
	if($_SESSION['thongbaoad']==1) {
	echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Cập Nhật Số Lượng Sản Phẩm Thành Công</b>";
		document.getElementById("thongbaoad").style.display="block";
		document.getElementById("thongbaoad").style.color="green";
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
<h1 class="titleFont1">KHO HÀNG</h1>
<div style="width:100%; height:90px; margin-top:30px">
<div style="float:left; margin-top:40px; margin-left:75px; width:40%">
    <div class="d-flex" style="margin-left:10px">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchAD">
      <button class="btn btn-outline-success" type="submit" style="width:120px;" onClick="slspSearch();searchSPadmin();"><i class="fab fa-searchengin fa-2x"></i></button>
    </div>   
</div>
<a href="server.php?category=import&&act=CT_import"><button type="button" class="btn btn-outline-primary" style="float:right;width:250px; height:60px; margin-right:70px; margin-top:30px; font-size:30px"><b><i class="fas fa-truck-loading"></i>&nbsp;Nhập Hàng</b></button></a>
</div>
<h4 id="KQsearchImport"></h4>
<div style="width:55%; height:870px; margin-left:86px; float:left; margin-top:40px">
<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; padding-left:30px"><b>DANH SÁCH SẢN PHẨM</b></h4>
<div id="import">
<?php
$sql="select * from product where del!='del'";
$product=pdo_query($sql);
foreach($product as $sp){
extract($sp);
echo '<div class="itemCart" style=" height:200px">
	<div style="float:left; width:140px; height:140px; background:#FFF; margin-top:18px; cursor:pointer">
		<img src="photo/'.$image.'" style="width:100%; height:100%" />
	</div>
   <div style="float:left; width:320px; height:140px; margin-top:18px; margin-left:18px">
        <h5 class="itemCartName"><b>'.$name.'</b></h5>
        <div style="font-size:16px; margin-top:20px"><b>Mã sản phẩm: '.$id.'</b></div>
        <h6 style="font-size:17px; margin-top:20px; color:#ff5f17; float:left;">Giá:&nbsp;'.$price.' VND</h6>
                    
	</div>
   <div style="float:right; width:150px; height:140px; margin-top:18px">
       <div style="border: #a3a3a3 1px solid; width:130px; height:60px; clear:both; margin-top:5px; margin-left:10px; font-size:21px; cursor:pointer; color:#ff5f17; text-align:center" onclick="SLSP('.$id.')" id="see-'.$id.'"><i class="far fa-eye fa-2x" style="margin-top:10px"></i></div>            
       <div style="border: #a3a3a3 1px solid; color:#FFFFFF; width:130px; height:60px; cursor:pointer; clear:both; margin-top:15px; margin-left:10px; background:#000; font-size:21px; text-align:center" onclick="importSP('.$id.')"><i class="fas fa-cloud-upload-alt fa-2x" style="margin-top:7px"></i></div>                
   </div>
   <div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:197px"></div>
</div> ';
}
?>              
</div>
</div>

<div style="width:34%; height:700px; float:right; background:#FFF; margin-right:20px; margin-top:40px">
<h4 style=" font-size:22px; width:100%; height:50px; line-height:50px; text-align:center"><b>SỐ LƯỢNG SẢN PHẨM</b></h4>
<div style="width:100%; border-top:solid 3px; margin-top:-8px"></div>
<div id="SLSP">

</div>

</div>
<div id="hidden"></div>
</div>