<script src="Chart.min.js"></script>
<?php
function sortDate($str){
  $day=explode('-',$str);
  $t=array_reverse($day);
  $d=implode('-',$t);
  return $d;
}
$tuan=[];
$revenue=[];
$date=date("Y-m-d");
for($i=0;$i<7;$i++)
{
	$day = strtotime(date("Y-m-d", strtotime($date)) . " -".$i." day");
	$day = strftime("%Y-%m-%d", $day);
	array_unshift($tuan,$day);
}
foreach($tuan as $t){
	$sql="SELECT SUM(total) FROM order_ticket WHERE date_confirm='".$t."' AND status='đã xác nhận' GROUP BY date_order";
	$tt=pdo_query($sql);
	if(count($tt)>0){
	foreach($tt as $total){
		array_push($revenue,$total["SUM(total)"]);
	}
	}else array_push($revenue,0);
}
$tt=0;
foreach($revenue as $re){
	$tt+=$re;
}
?>
<script>
function sortDay(str){
var day=str.split('-');
var d='';
for(var i=2;i>=0;i--){
	if(i==0) {d+=day[i];}
	else {d+=day[i]+"-";}
}
return d;
}
function thongke(id){
document.getElementById("TK0").style.display="none";
if(id==1){
	document.getElementById("TK1").style.display="block";
	document.getElementById("TK2").style.display="none";
	document.getElementById("TK3").style.display="none";
}
else if(id==2){
	document.getElementById("TK1").style.display="none";
	document.getElementById("TK2").style.display="block";
	document.getElementById("TK3").style.display="none";
}
else{
	document.getElementById("TK1").style.display="none";
	document.getElementById("TK2").style.display="none";
	document.getElementById("TK3").style.display="block";
}
}
function closeTBAD(){
document.getElementById("thongbaoad").style.display="none";
}
function TKWeek(t){
var date=document.getElementById("day").value;
if(date=="") {
	document.getElementById("thongbaoad").innerHTML="<b>Thời Gian Nhập Không Hợp Lệ!</b>";
	document.getElementById("thongbaoad").style.display="block";
	document.getElementById("thongbaoad").style.paddingTop="40px";
	document.getElementById("thongbaoad").style.color="red";
	setTimeout(closeTBAD,3000);
	return false;
	}
else{
	$.ajax({
	url: "setChart.php",
	type: 'POST',
	cache: false,
	data:{
		day:date,
		filter:t
	},
	success: function(string){
		var obj=JSON.parse(string);
		var tt=obj[1].t1+obj[1].t2+obj[1].t3+obj[1].t4+obj[1].t5+obj[1].t6+obj[1].t7;
		document.getElementById("total").innerHTML='Tổng Doanh Thu: '+tt+' VNĐ&nbsp;&nbsp;&nbsp;&asymp;&nbsp;&nbsp;&nbsp;'+Math.round((tt/23033)*1000)/1000+' $';
		document.getElementById("chart").innerHTML='<i class="fas fa-dollar-sign fa-2x" style="position:absolute; left:30px; top:0px"></i><canvas id="buyers" width="1050" height="500" style="margin-top:40px"></canvas>';
		var buyerData = {
			labels : [sortDay(obj[0].d1),sortDay(obj[0].d2),sortDay(obj[0].d3),sortDay(obj[0].d4),sortDay(obj[0].d5),sortDay(obj[0].d6),sortDay(obj[0].d7)],
			datasets : [
				{
					fillColor : "rgba(172,194,132,0.4)",
					strokeColor : "#ACC26D",
					pointColor : "#fff",
					pointStrokeColor : "#9DB86D",
					data : [obj[1].t1/23033,obj[1].t2/23033,obj[1].t3/23033,obj[1].t4/23033,obj[1].t5/23033,obj[1].t6/23033,obj[1].t7/23033]
				}
			]
		}
		var buyers = document.getElementById('buyers').getContext('2d');
		new Chart(buyers).Line(buyerData);
	}
})
}
}
function TKMonth(t){
var m=document.getElementById("TKTuan1").value;
var y=document.getElementById("TKTuan2").value;
var date=y+"-"+m+"-01";
$.ajax({
	url: "setChart.php",
	type: 'POST',
	cache: false,
	data:{
		day:date,
		filter:t
	},
	success: function(string){
		var obj=JSON.parse(string);
		var tt=obj[1].t1+obj[1].t2+obj[1].t3+obj[1].t4;
		document.getElementById("total").innerHTML='Tổng Doanh Thu: '+tt+' VNĐ&nbsp;&nbsp;&nbsp;&asymp;&nbsp;&nbsp;&nbsp;'+Math.round((tt/23033)*1000)/1000+' $';
		document.getElementById("chart").innerHTML='<i class="fas fa-dollar-sign fa-2x" style="position:absolute; left:100px; top:0px"></i><canvas id="buyers" width="1050" height="500" style="margin-top:40px"></canvas>';
		var buyerData = {
			labels : [obj[0].d1,obj[0].d2,obj[0].d3,obj[0].d4],
			datasets : [
				{
					fillColor : "rgba(172,194,132,0.4)",
					strokeColor : "#ACC26D",
					pointColor : "#fff",
					pointStrokeColor : "#9DB86D",
					data : [obj[1].t1/23033,obj[1].t2/23033,obj[1].t3/23033,obj[1].t4/23033]
				}
			]
		}
		var buyers = document.getElementById('buyers').getContext('2d');
		new Chart(buyers).Line(buyerData);
	}
})
}
function TKYear(t){
var y=document.getElementById("TKNam").value;
$.ajax({
	url: "setChart.php",
	type: 'POST',
	cache: false,
	data:{
		day:y,
		filter:t
	},
	success: function(string){
		var obj=JSON.parse(string);
		var tt=obj.t1+obj.t2+obj.t3+obj.t4;
		document.getElementById("total").innerHTML='Tổng Doanh Thu: '+tt+' VNĐ&nbsp;&nbsp;&nbsp;&asymp;&nbsp;&nbsp;&nbsp;'+Math.round((tt/23033)*1000)/1000+' $';
		document.getElementById("chart").innerHTML='<i class="fas fa-dollar-sign fa-2x" style="position:absolute; left:100px; top:0px"></i><canvas id="buyers" width="1050" height="500" style="margin-top:40px"></canvas>';
		var buyerData = {
			labels : ["Quý 1 (Tháng 1 - 2 - 3)","Quý 2 (Tháng 4 - 5 - 6)","Quý 3 (Tháng 7 - 8 - 9)","Quý 4 (Tháng 10 - 11 - 12)"],
			datasets : [
				{
					fillColor : "rgba(172,194,132,0.4)",
					strokeColor : "#ACC26D",
					pointColor : "#fff",
					pointStrokeColor : "#9DB86D",
					data : [obj.t1/23033,obj.t2/23033,obj.t3/23033,obj.t4/23033]
				}
			]
		}
		var buyers = document.getElementById('buyers').getContext('2d');
		new Chart(buyers).Line(buyerData);
	}
})
}
</script>
<div style="width:100%; height:1200px">
<h1 class="titleFont1">THỐNG KÊ DOANH THU</b></h1>
<div style="margin-left:80px; margin-top:80px; width:90%; height:100px">
	<h4 style="float:left; margin-top:10px; color:#CD5C5C">Thống Kê Tình Hình Kinh Doanh Theo:</h4>
    <button type="button" class="btn btn-info" style="float:left; margin-left:60px; font-size:24px; width:130px; color:white" onclick="thongke(1)"><b>Tuần</b></button>
    <button type="button" class="btn btn-warning" style="float:left; margin-left:60px; font-size:24px; width:130px;color:white" onclick="thongke(2)"><b>Tháng</b></button>
    <button type="button" class="btn btn-success" style="float:left; margin-left:60px; font-size:24px; width:130px" onclick="thongke(3)"><b>Năm</b></button>
</div>
<div style="width:100%; height:80px">
	<div id="TK0"><b>BIỂU ĐỒ THỐNG KÊ TỔNG DOANH THU TỪ NGÀY <?php echo sortDate($tuan[0]) ?> ĐẾN NGÀY <?php echo sortDate($tuan[6]) ?></b></div>
	<div id="TK1">
    	<h5 style="float:left; margin-top:25px; margin-left:50px">Từ Ngày</h5>
        <input type="date" style="float:left; margin-left:30px; margin-top:25px" id="day">
        <button type="button" class="btn btn-outline-danger" style="float:left; margin-left:70px; margin-top:20px; font-size:18px; width:100px" id="tuan" onclick="TKWeek(this.id)"><b>XEM</b></button>
    </div>
    <div id="TK2">
    	<h5 style="float:left; margin-top:25px; margin-left:50px">Tháng:</h5>
        <select class="form-select" aria-label="Default select example" style="width:80px; float:left; margin-top:20px; margin-left:15px" id="TKTuan1">
          <?php
		  	for($j=1;$j<=12;$j++)
			{
				echo '<option>'.$j.'</option>';
			}
		  ?>
        </select>
        <h5 style="float:left; margin-top:25px; margin-left:30px">Năm:</h5>
        <select class="form-select" aria-label="Default select example" style="width:100px; float:left; margin-top:20px; margin-left:15px" id="TKTuan2">
        <?php
			$y=date("Y");
			$year=intval($y);
			for($j=$year;$j>=2021;$j--)
			{
				echo '<option>'.$j.'</option>';
			}
		?>
        </select>
        <button type="button" class="btn btn-outline-danger" style="float:left; margin-left:60px; margin-top:20px; font-size:18px; width:100px" id="thang" onclick="TKMonth(this.id)"><b>XEM</b></button>
    </div>
    <div id="TK3">
    	<h5 style="float:left; margin-top:25px; margin-left:50px">Năm:</h5>
        <select class="form-select" aria-label="Default select example" style="width:100px; float:left; margin-top:20px; margin-left:15px" id="TKNam">
        <?php
			$y=date("Y");
			$year=intval($y);
			for($j=$year;$j>=2021;$j--)
			{
				echo '<option>'.$j.'</option>';
			}
		?>
        </select>
        <button type="button" class="btn btn-outline-danger" style="float:left; margin-left:60px; margin-top:20px; font-size:18px; width:100px" id="nam" onclick="TKYear(this.id)"><b>XEM</b></button>
    </div>
</div>
<div id="chart">
<i class="fas fa-dollar-sign fa-2x" style="position:absolute; left:30px; top:0px"></i>
	<canvas id="buyers" width="1050" height="500" style="margin-top:40px"></canvas>
    <script>
    var buyerData = {
    labels : [ <?php
					foreach($tuan as $t){
						echo '"'.sortDate($t).'",';
					}
				?>
	],
    datasets : [
        {
            fillColor : "rgba(172,194,132,0.4)",
            strokeColor : "#ACC26D",
            pointColor : "#fff",
            pointStrokeColor : "#9DB86D",
            data : [ <?php
					foreach($revenue as $r){
						
						$money= round($r / 23033,2);
						echo $money.',';
					}
					?>
			]
        }
    ]
}
    var buyers = document.getElementById('buyers').getContext('2d');
    new Chart(buyers).Line(buyerData);
</script>
</div>
<h4 style="margin-left:120px; margin-top:30px" id="total">Tổng Doanh Thu: <?php echo $tt; ?> VNĐ&nbsp;&nbsp;&nbsp;&asymp;&nbsp;&nbsp;&nbsp;<?php echo round($tt / 23033,2);?> $</h4>
</div>