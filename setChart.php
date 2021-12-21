<?php
function sortDate($str){
  $day=explode('-',$str);
  $t=array_reverse($day);
  $d=implode('-',$t);
  return $d;
}
//echo '[{"d1":"20-4", "d2":"5-8", "d3":"9-7"},{"t1":100, "t2":30, "t3":45}]';
if(isset($_POST['filter'])&&isset($_POST['day']))
{
	include 'pdo.php';
	$filter=$_POST['filter'];
	if($filter=='tuan'){
		$date=$_POST['day'];
		$tuan=[];
		$revenue=[];
		for($i=0;$i<7;$i++)
		{
			$day = strtotime(date("Y-m-d", strtotime($date)) . " +".$i." day");
			$day = strftime("%Y-%m-%d", $day);
			array_push($tuan,$day);
		}
		$s='[{';
		for($i=0;$i<count($tuan);$i++)
		{
			if($i==6) {$s.='"d'.($i+1).'":"'.$tuan[$i].'"';}
			else {$s.='"d'.($i+1).'":"'.$tuan[$i].'",';}
		}
		$s.='},{';
		foreach($tuan as $t){
			$sql="SELECT SUM(total) FROM order_ticket WHERE date_confirm='".$t."' AND status='đã xác nhận' GROUP BY date_confirm";
			$tt=pdo_query($sql);
			if(count($tt)>0){
			foreach($tt as $total){
				array_push($revenue,$total["SUM(total)"]);
			}
			}else array_push($revenue,0);
		}
		for($i=0;$i<count($revenue);$i++)
		{
			if($i==6) {$s.='"t'.($i+1).'":'.$revenue[$i];}
			else {$s.='"t'.($i+1).'":'.$revenue[$i].',';}
		}
		$s.='}]';
		echo $s;
	}
	else if($filter=='thang'){
		$date=$_POST['day'];
		$thang=[];
		$revenue=[];
		$label=[];
		for($i=0;$i<4;$i++)
		{
			$day = strtotime(date("Y-m-d", strtotime($date)) . " +".$i." weeks");
			$day = strftime("%Y-%m-%d", $day);
			array_push($thang,$day);
		}
		for($i=0;$i<4;$i++)
		{
			$day = strtotime(date("Y-m-d", strtotime($thang[$i])) . " +6 day");
			$day = strftime("%Y-%m-%d", $day);
			$temp= sortDate($thang[$i]).' đến '.sortDate($day).' (Tuần '.($i+1).')';
			array_push($label,$temp);
			$sql="SELECT SUM(total) FROM order_ticket WHERE (date_confirm BETWEEN '".$thang[$i]."' AND '".$day."') AND status='đã xác nhận'";
			$tt=pdo_query($sql);
			foreach($tt as $total){
				if($total["SUM(total)"]==null) array_push($revenue,0);
				else array_push($revenue,$total["SUM(total)"]);
			}
		}
		$s='[{';
		for($i=0;$i<count($label);$i++)
		{
			if($i==3) {$s.='"d'.($i+1).'":"'.$label[$i].'"';}
			else {$s.='"d'.($i+1).'":"'.$label[$i].'",';}
		}
		$s.='},{';
		for($i=0;$i<count($revenue);$i++)
		{
			if($i==3) {$s.='"t'.($i+1).'":'.$revenue[$i];}
			else {$s.='"t'.($i+1).'":'.$revenue[$i].',';}
		}
		$s.='}]';
		echo $s;
	}
	else if($filter=='nam'){
		$y=$_POST['day'];
		$revenue=[];
		$d=$y.'-1-1';
		$day = strtotime(date("Y-m-d", strtotime($d)) . " +3 month -1 day");
		$day = strftime("%Y-%m-%d", $day);
		$sql="SELECT SUM(total) FROM order_ticket WHERE (date_confirm BETWEEN '".$d."' AND '".$day."') AND status='đã xác nhận'";
		$tt=pdo_query($sql);
		foreach($tt as $total){
			if($total["SUM(total)"]==null) array_push($revenue,0);
			else array_push($revenue,$total["SUM(total)"]);
		}
		$d=$y.'-4-1';
		$day = strtotime(date("Y-m-d", strtotime($d)) . " +3 month -1 day");
		$day = strftime("%Y-%m-%d", $day);
		$sql="SELECT SUM(total) FROM order_ticket WHERE (date_confirm BETWEEN '".$d."' AND '".$day."') AND status='đã xác nhận'";
		$tt=pdo_query($sql);
		foreach($tt as $total){
			if($total["SUM(total)"]==null) array_push($revenue,0);
			else array_push($revenue,$total["SUM(total)"]);
		}
		$d=$y.'-7-1';
		$day = strtotime(date("Y-m-d", strtotime($d)) . " +3 month -1 day");
		$day = strftime("%Y-%m-%d", $day);
		$sql="SELECT SUM(total) FROM order_ticket WHERE (date_confirm BETWEEN '".$d."' AND '".$day."') AND status='đã xác nhận'";
		$tt=pdo_query($sql);
		foreach($tt as $total){
			if($total["SUM(total)"]==null) array_push($revenue,0);
			else array_push($revenue,$total["SUM(total)"]);
		}
		$d=$y.'-10-1';
		$day = strtotime(date("Y-m-d", strtotime($d)) . " +3 month -1 day");
		$day = strftime("%Y-%m-%d", $day);
		$sql="SELECT SUM(total) FROM order_ticket WHERE (date_confirm BETWEEN '".$d."' AND '".$day."') AND status='đã xác nhận'";
		$tt=pdo_query($sql);
		foreach($tt as $total){
			if($total["SUM(total)"]==null) array_push($revenue,0);
			else array_push($revenue,$total["SUM(total)"]);
		}
		$s='{';
		for($i=0;$i<count($revenue);$i++)
		{
			if($i==3) {$s.='"t'.($i+1).'":'.$revenue[$i];}
			else {$s.='"t'.($i+1).'":'.$revenue[$i].',';}
		}
		$s.='}';
		echo $s;
	}
}
?>
