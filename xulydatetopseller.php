<?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
include 'pdo.php';
$sql="SELECT product.id,product.name,product.image,SUM(amount),SUM(detail_order_ticket.total) FROM detail_order_ticket,order_ticket,product WHERE detail_order_ticket.id_order=order_ticket.id_order AND (order_ticket.date_order BETWEEN '".$from."' AND '".$to."') AND detail_order_ticket.id_product=product.id GROUP BY id_product ORDER BY SUM(amount) DESC LIMIT 10";
		$top=pdo_query($sql);
		$i=1;
		foreach($top as $sp){
		$sql="SELECT detail_properties.name as 'status' FROM detail_properties,detail_product WHERE detail_product.id_product=".$sp['id']." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $stt=pdo_query_one($sql);
		if($i%2==1) {echo '<div style="width: 100%; height: 95px; background:#FFFFF0">';}
		else {echo '<div style="width: 100%; height: 95px; background:#EEEEE0">';}
		  echo '<div style="width:5%; float:left; margin-top:20px;;background: none;margin-left: 30px; height: 50px;"><img src="photo/top'.$i.'.png" height="100%" width="100%"></div>
    			<div style="width:7%; float:left;height:75px; margin-top:9px;margin-left: 70px;background: #fff;"><img src="photo/'.$sp["image"].'" height="100%" width="100%"></div>
    			<div style="width:28%; float:left; margin-left:48px; margin-top:30px">'.$sp["name"].'</div>';
				$tt= round($sp["SUM(detail_order_ticket.total)"] / 23033,2);
    			echo '<div style="width:20%; float:left; margin-left:2px; margin-top:30px">'.$tt.'$</div>
    			<div style="width:12%; float:left; margin-left:0px; margin-top:30px">'.$stt["status"].'</div>
    			<div style="width:10%; float:left; margin-left:25px; margin-top:30px">'.$sp["SUM(amount)"].'</div>
		</div>';
		$i++;
	}
?>