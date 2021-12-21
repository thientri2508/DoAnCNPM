<script>
document.getElementById("sale").style.background="#E8E8E8";
function delSPsale(a){
var b=a;
var t=a.split('-');
var id=t[1];
var url="xuliDelSPsale.php?id=" + id;
location.replace(url);
}
function delAllSPsale(){
location.replace("xuliDelAllSPsale.php");
}
function changePercent(a){
var t=a.split('-');
var id=t[1];
var p=[];
var per=document.getElementById("percent-"+id).value;
var c=parseInt(per);
var flag=true;
p=document.getElementById("percent-"+id).value;
for(var i=0;i<p.length;i++)
	{
		if(p[i].charCodeAt()<48||p[i].charCodeAt()>57) 
		{
			flag= false;
		}
	}
if(p=="") {flag=false;}
if(c>=80) {flag=false;}
if(flag==true) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixPercent.php?id=" + id + "&&percent=" + per, true);
    xmlhttp.send();}
else alert("% Giảm Giá Không Hợp Lệ!");
}
function checkPercent(a){
var p=[];
p=document.getElementById(a).value;
var price = document.getElementById(a).value;
if(price=="") return false;
if(price=="0") return false;
if(price==0) return false;
for(var i=0;i<p.length;i++)
	{
		if(p[i].charCodeAt()<48||p[i].charCodeAt()>57) 
		{
			return false;
		}
	}
return true;
}
function checkNum(a){
var price = document.getElementById(a).value;
var p=parseInt(price);
if(p>=80) return false;
return true;
}
function checkSale(){
var sl=<?php if(isset($_SESSION['CTKM'])){echo count($_SESSION['CTKM']);}
else echo 0; ?>;
if(sl==0) return false;
for(var i=1;i<=sl;i++)
{
	var check=checkPercent("percent-"+i);
	var check1=checkNum("percent-"+i);
	if(check==false) {alert("% Giảm Giá Không Hợp Lệ");
	return false;}
	if(check1==false) {alert("% Giảm Giá Không Hợp Lệ");
	return false;}
}
return true;
}
function saleSP(){
var check=checkSale();
if(check==true) {
location.replace("xuliCTKM.php");}
}
function huySale(id){
var url="xuliHuySale.php?id="+id;
location.replace(url);
}
</script>
<body>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Giảm Giá Sản Phẩm Thành Công</b>";
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
<div style="width:100%; height:1100px">
<h2 style="font-feature-settings: 'kern'; padding-top:30px; height:80px; width:50%; margin:auto; text-align:center"><b>CHƯƠNG TRÌNH KHUYẾN MÃI</b></h2>
<div style="float:left; width:42%; margin-top:60px; margin-left:60px; height:750px">
<h4 style="width:100%; height:50px; background:#FFFFFF; line-height:50px; padding-left:30px"><b>SẢN PHẨM ĐƯỢC CHỌN</b><i class="far fa-hand-pointer" style="margin-left:20px"></i></h4>
<div style="overflow-y:scroll; width:100%; height:89%;border: 1px solid rgba(0,0,0,0.15);margin-top:30px">
	<?php
	$j=1;
	if(isset($_SESSION['CTKM'])) {
	foreach($_SESSION['CTKM'] as $s){
	echo '<div style="width:100%; height:220px; margin-top:20px;border-bottom: dashed 2px; position:relative">
    	<div style="float:left; width:130px; height:130px; background:#FFFFFF">
        	<img src="photo/'.$s[2].'" style="width:100%; height:100%"  />
        </div>
		<div style="border: #a3a3a3 1px solid; width:130px; height:40px; background:#000000;color:#ffff; font-size:21px; text-align:center;cursor:pointer; position:absolute; top:150px" id="sale-'.$j.'" onclick="delSPsale(this.id)"><i class="far fa-trash-alt" style="margin-top:8px"></i></div>
        <div style="float:left; width:320px; height:130px; margin-left:20px">
        	<h5 style="width:100%"><b>'.$s[1].'</b></h5>
            <h5 style="color:#ff5f17; margin-top:30px; width:100%">Giá:&nbsp;'.$s[3].' VND</h6>
            <h5 style="margin-top:30px"><b>%Sale</b></h5>
            <input class="form-control" type="text" placeholder="Nhập % Giảm Giá" aria-label="default input example" id="percent-'.$j.'" style="width:200px; position:absolute; top:100px; left:230px" onchange="changePercent(this.id)">
        </div>
    </div>';
	$j++;
	}
	}
	?>
</div>
</div>
<div style="float:right; width:42%;margin-top:60px; margin-right:60px; height:750px">
<h4 style="width:100%; height:50px; background:#000; color:#fff; line-height:50px; padding-left:30px"><b>SẢN PHẨM ĐANG GIẢM GIÁ</b></h4>
<div style="overflow-y:scroll; width:100%; height:89%;border: 1px solid rgba(0,0,0,0.15);margin-top:30px; background:#000">
	<?php
	$sql="SELECT product.id,product.name,product.image,product.price,product.price_sale,detail_properties.name as 'status' FROM product,detail_product,detail_properties WHERE product.id=detail_product.id_product AND detail_product.id_detail_properties=detail_properties.id AND detail_properties.name='Sale Off' AND product.del!='del'";
	$CTKM=pdo_query($sql);
	foreach($CTKM as $s){
	extract($s);
	echo '<div style="width:100%; height:220px; margin-top:20px;border-bottom: dashed 2px #fff; position:relative">
    	<div style="float:left; width:130px; height:130px; background:#FFFFFF; margin-left:20px">
        	<img src="photo/'.$image.'" style="width:100%; height:100%"  />
        </div>
		<button type="button" class="btn btn-danger" style="width:130px; height:40px;position:absolute; top:150px; left:20px" onclick="huySale('.$id.')">Hủy KM</button>
        <div style="float:left; width:300px; height:130px; margin-left:20px;">
        	<h5 style="width:100%;color:#fff"><b>'.$name.'</b></h5>
            <h5 style="color:#ff5f17; margin-top:30px; width:100%;color:#fff">Giá Cũ:&nbsp;'.$price_sale.' VND</h6>
            <h5 style="margin-top:30px;color:red"><b>Giá Sale:&nbsp;'.$price.' VND</b></h5>
        </div>
    </div>';
	}
	?>
</div>
</div>
<div style="clear:both; width:90%; height:120px;margin:auto; position:relative">
	<div class="btnCart" style="top:60px; width:200px; position:absolute; left:0px" onClick="delAllSPsale()"><b>XÓA HẾT</b></div>
    <div class="btnCart" style="top:60px; width:200px; position:absolute; left:300px; background:#ff5f17" onClick="saleSP()"><b>XÁC NHẬN</b></div>
    <a href="server.php?category=sale-off"><div class="btnCart" style="top:60px; width:200px; position:absolute; right:0px"><b>QUAY LẠI</b></div></a>
</div>
<div id="test"></div>
</div>
