<script>
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
document.getElementById("close_filterTop10").style.display="block";
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
   document.getElementById("rankrow").innerHTML = this.responseText;
    }
 };
xmlhttp.open("GET", "xulydatetopseller.php?from=" + from + "&&to=" + to , true);
xmlhttp.send();
}
function cancel_filter(){
	location.reload();
}
</script>
<div style="width:100%; height:1200px">
	<h1 class="titleFont1">TOP SẢN PHẨM BÁN CHẠY</h1>
	<div style="width:100%; height:120px; margin-top:70px">
    <div class="DS_import" style="margin-left:80px">
        <h4 style="font-feature-settings: 'kern'">Hiển Thị Theo Thời Gian<i class="far fa-clock" style="margin-left:20px; color:black"></i></h4>
        <div style="margin-top:13px">
            <div style="float:left"><b>Từ&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="from">
            <i class="fas fa-random" style="float:left; margin-left:30px; margin-top:6px"></i>
            <div style="float:left; margin-left:30px"><b>Đến&nbsp;&nbsp;</b></div>
            <input type="date" style="float:left" id="to">
        </div>
    </div>
	<button class="btn btn-light" style="height:80px; width:8%; font-size:22px; border:solid 3px; border-radius:50px; margin-top:30px; margin-left:20px" onClick="filterImport();"><i class="fas fa-filter"></i></button>
    <button type="button" class="btn-close" aria-label="Close" id="close_filterTop10" onClick="cancel_filter()"></button>
</div>
	<div style="width:85%; margin:auto; margin-top:50px; background:#2c3034; color:#fff;border: 1px solid rgba(0,0,0,0.15); height:60px">
	<h4 style="width:12%; float:left; margin-left:30px; margin-top:13px">Rank</h4>
    <h4 style="width:11%; float:left; margin-top:13px">Image</h4>
    <h4 style="width:30%; float:left; margin-left:8px; margin-top:13px">Name</h4>
    <h4 style="width:23%; float:left; margin-left:-19px; margin-top:13px">Total</h4>
    <h4 style="width:12%; float:left; margin-left:-35px; margin-top:13px">Status</h4>
    <h4 style="width:10%; float:left; margin-left:10px; margin-top:13px">Buys</h4>
	</div>
	<div style="width: 85%; margin: auto;border: 1px solid rgba(0,0,0,0.15);; overflow-y:scroll; height:700px" id="rankrow" >
		<?php
		$sql="SELECT product.id,product.name,product.image,SUM(amount),SUM(total) FROM detail_order_ticket,product WHERE detail_order_ticket.id_product=product.id GROUP BY detail_order_ticket.id_product ORDER BY SUM(amount) DESC LIMIT 10";
		$top=pdo_query($sql);
		$i=1;
		foreach($top as $sp){
		 $sql="SELECT detail_properties.name as 'status' FROM detail_properties,detail_product WHERE detail_product.id_product=".$sp['id']." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $stt=pdo_query_one($sql);
		if($i%2==0) {echo '<div style="width: 100%; height: 95px; background:#FFFFF0">';}
		else {echo '<div style="width: 100%; height: 95px; background:#EEEEE0">';}
		  echo '<div style="width:5%; float:left; margin-top:20px;;background: none;margin-left: 30px; height: 50px;"><img src="photo/top'.$i.'.png" style="height:100%; width:100%" ></div>
    		<div style="width:7%; height:75px; float:left; margin-top:9px;margin-left: 70px;background: #fff"><img src="photo/'.$sp["image"].'" style="height:100%; width:100%"></div>';
    			$tt= round($sp["SUM(total)"] / 23033,2);
				echo '<div style="width:28%; float:left; margin-left:48px; margin-top:30px">'.$sp["name"].'</div>
    			<div style="width:20%; float:left; margin-left:2px; margin-top:30px">'.$tt.'$</div>
    			<div style="width:12%; float:left; margin-left:0px; margin-top:30px">'.$stt["status"].'</div>
    			<div style="width:10%; float:left; margin-left:25px; margin-top:30px">'.$sp["SUM(amount)"].'</div>
		</div>';
		$i++;
	}
	?>
		
		
	</div>
	</div>