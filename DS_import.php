<script>
document.getElementById("qlpnh").style.background="#E8E8E8";
var t='';
function CTPNH(id){
document.getElementById("PNH-"+id).style.background="#E8E8E8";
	if(t!='') {
		document.getElementById(t).style.background="";
	}
	t="PNH-"+id;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("CTPNH1").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "CTPNH.php?id=" + id , true);
xmlhttp.send();
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
function huyPNH(id){
document.getElementById('delSP').style.display='block';
var s="";
var ID="'"+id+"'";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to cancel this ticket?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delPNH('+ID+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function delPNH(id){
var url="delPNH.php?id="+id;
location.replace(url);
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
document.getElementById("filterImport").style.display="block";
document.getElementById("DS_import").innerHTML="";
document.getElementById("close_filterImport").style.display="block";
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("filterImport").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "filterImport.php?from=" + from + "&&to=" + to , true);
xmlhttp.send();
}
function cancel_filter(){
	location.reload();
}
</script>
<?php
if(isset($_SESSION['thongbaoad'])) {
	if($_SESSION['thongbaoad']==1) {
	echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Hủy Phiếu Nhập Hàng Thành Công</b>";
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
<div style="width:100%; height:1200px">
<h2 style="font-feature-settings: 'kern'; padding-top:30px; height:80px; width:50%; margin:auto; text-align:center"><b>DANH SÁCH PHIẾU NHẬP HÀNG</b></h2>
<div style="width:100%; height:120px">
    <div class="DS_import">
        <h4 style="font-feature-settings: 'kern'; color:green;">Hiển Thị Theo Thời Gian<i class="far fa-clock" style="margin-left:20px; color:black"></i></h4>
        <div style="margin-top:13px">
            <div style="float:left"><b>Từ&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="from" />
            <i class="fas fa-random" style="float:left; margin-left:30px; margin-top:6px"></i>
            <div style="float:left; margin-left:30px"><b>Đến&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="to" />
        </div>
    </div>
	<button class="btn btn-light" style="height:80px; width:8%; font-size:22px; border:solid 3px; border-radius:50px; margin-top:30px; margin-left:20px" onClick="filterImport();"><i class="fas fa-filter"></i></button>
    <button type="button" class="btn-close" aria-label="Close" id="close_filterImport" onClick="cancel_filter()"></button>
</div>
<div id="DS_import">
	
</div>
<div id="filterImport">
	
</div>
<div style="background:#000; margin-left:40px; float:left; width:34%; height:850px; margin-top:30px">
	<div style="color:#FFF; width:80%; margin:auto; text-align:center; font-size:24px; margin-top:15px; border-bottom:#FFF solid 3px; height:50px">Chi Tiết Phiếu Nhập Hàng
    </div>
    <div id="CTPNH1">
        
            
        
    </div>
</div>
</div>
<script>
var start = <?php $sql="SELECT COUNT(*) FROM import";
		$o=pdo_query_one($sql);
		if($o["COUNT(*)"]<5) echo 0;
		else echo $o["COUNT(*)"] - 5; ?>;
var limit = 5;
var reachedMax = false;
var height=350;

$("#DS_import").scroll(function () {
	if ($("#DS_import").scrollTop() >= height) {
		getData();
		height+=1200;
	}
});

$(document).ready(function () { 
	getData();
});

function getData() {
	if (reachedMax)
		return;
	$.ajax({
		url: 'data1.php',
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
				$("#DS_import").append(response);
			}
		}
	});
}
</script>