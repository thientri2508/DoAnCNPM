<script>
document.getElementById("dsdh").style.background="#E8E8E8";
var t='';
function CTDH(id){
document.getElementById("DH-"+id).style.background="#E8E8E8";
	if(t!='') {
		document.getElementById(t).style.background="";
	}
	t="DH-"+id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("CTPNH2").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "CTDH_server.php?id=" + id , true);
xmlhttp.send();
}
function xacnhanDH(id){
var t=id;
var url="xacnhanDH.php?id=" + t;
location.replace(url);
}
function loadpage(){
location.reload();
}
function note(id){
var note=document.getElementById("exampleFormControlTextarea1").value;
note=note.replace(/"/g, '');
note=note.replace(/'/g, '');
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("temp").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "note_order.php?id=" + id + "&&note=" + note , true);
xmlhttp.send();
setTimeout(loadpage,200);
}
function closeTBAD(){
document.getElementById("thongbaoad").style.display="none";
}
function xuliDate(dayFrom,dayTo)
{
	var From=dayFrom.split('-');
	var To=dayTo.split('-');
	var ddFrom=Number(From[2]);
	var mmFrom=Number(From[1]);
	var yyFrom=Number(From[0]);
	var ddTo=Number(To[2]);
	var mmTo=Number(To[1]);
	var yyTo=Number(To[0]);
	
	if(yyFrom>yyTo) return false;
	if(yyFrom==yyTo) {
		if(mmFrom>mmTo) return false
		if(mmFrom==mmTo) {
			if(ddFrom>=ddTo) return false;
		}
	}
	return true;
}
function filterImport(){
var from=document.getElementById("from").value;
var to=document.getElementById("to").value;
if(from==""||to=="") {
	document.getElementById("thongbaoad").innerHTML="<b>Thời Gian Nhập Không Hợp Lệ!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="red";
	setTimeout(closeTBAD,3000);
	return false;
}
if(xuliDate(from,to)==false) {
	document.getElementById("thongbaoad").innerHTML="<b>Thời Gian Nhập Không Hợp Lệ!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="red";
	setTimeout(closeTBAD,3000);
	return false;
} 
document.getElementById("filterOrder").style.display="block";
document.getElementById("DS_order").innerHTML="";
document.getElementById("close_filterOrder").style.display="block";
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("filterOrder").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "filterOrder.php?from=" + from + "&&to=" + to , true);
xmlhttp.send();
}
function cancel_filter(){
	location.reload();
}
</script>
<body>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==3) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xác Nhận Đơn Hàng Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==4) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Thêm Ghi Chú Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==5) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xác Nhận Đơn Hàng Thất Bại - Đơn Hàng Này Đã Bị Hủy</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="red";
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
<h2 style="font-feature-settings: 'kern'; padding-top:30px; height:80px; width:50%; margin:auto; text-align:center"><b>DANH SÁCH ĐƠN HÀNG</b></h2>
<div style="width:100%; height:120px">
    <div class="DS_import">
        <h4 style="font-feature-settings: 'kern'; color:blue;">Hiển Thị Theo Thời Gian<i class="far fa-clock" style="margin-left:20px; color:black"></i></h4>
        <div style="margin-top:13px">
            <div style="float:left"><b>Từ&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="from" />
            <i class="fas fa-random" style="float:left; margin-left:30px; margin-top:6px"></i>
            <div style="float:left; margin-left:30px"><b>Đến&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="to" />
        </div>
    </div>
	<button class="btn btn-light" style="height:80px; width:8%; font-size:22px; border:solid 3px; border-radius:50px; margin-top:30px; margin-left:20px" onClick="filterImport();"><i class="fas fa-filter"></i></button>
    <button type="button" class="btn-close" aria-label="Close" id="close_filterOrder" onClick="cancel_filter()"></button>
</div>
<div id="DS_order">
	
</div>
<div id="filterOrder">
	
</div>
<div style="background:#000; margin-left:40px; float:left; width:34%; height:1000px; margin-top:30px">
	<div style="color:#FFF; width:80%; margin:auto; text-align:center; font-size:24px; margin-top:15px; border-bottom:#FFF solid 3px; height:50px">Chi Tiết Đơn Hàng
    </div>
    <div id="CTPNH2"> 

    </div>
    <div id="temp"></div>
</div>
</div>
<script>
var start = <?php $sql="SELECT COUNT(*) FROM order_ticket";
		$o=pdo_query_one($sql);
		if($o["COUNT(*)"]<5) echo 0;
		else echo $o["COUNT(*)"] - 5; ?>;
var limit = 5;
var reachedMax = false;
var height=700;

$("#DS_order").scroll(function () {
	if ($("#DS_order").scrollTop() >= height) {
		getData();
		height+=1550;	
	}
});

$(document).ready(function () {
	getData();
});

function getData() {
	if (reachedMax)
		return;
	$.ajax({
		url: 'data.php',
		type: 'POST',
		cache: false,
		data: {
			getData: 1,
			start: start,
			limit: limit
		},
		success: function(response) {
			if (response == "reachedMax")
				reachedMax = true;
			else {
				start -= limit;
				if(start==-1){
					start=0;
					limit=4;
				}
				if(start==-2){
					start=0;
					limit=3;
				}
				if(start==-3){
					start=0;
					limit=2;
				}
				if(start==-4){
					start=0;
					limit=1;
				}
				$("#DS_order").append(response);
			}
		}
	});
}
</script>
