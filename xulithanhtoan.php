<?php
session_start();
include 'pdo.php';
$user=$_SESSION['userlogin'];
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[5];
}
$sql="select * from promotions where status='on'";
$promotions=pdo_query_one($sql);
$ctkm=0;
$price_sale=0;
if($promotions!='') {
	$sql="SELECT promotions_content.price_sale,promotions_content.apply FROM promotions,promotions_content,set_promotions WHERE promotions.id=set_promotions.id_promotions AND promotions_content.id=set_promotions.id_content AND promotions.id=".$promotions['id']." ORDER BY promotions_content.apply ASC";
	$content=pdo_query($sql);
	foreach($content as $c){
		if($tt>=$c["apply"]) {
			$price_sale=$c["price_sale"];
			$ctkm=1;
		}
	}
}
$tt-=$price_sale;		
$date=date("Y-m-d");
$dateship='chờ xác nhận';
$sql="insert into order_ticket(id_user,date_order,date_ship,total,status,note,id_staff,date_confirm,id_promotions) values('$user[7]','$date','$dateship','$tt','$dateship','','0','0000-00-00','$ctkm')";	
pdo_execute($sql);
$sql="select id_order from order_ticket where id_user=".$user[7];
$t=pdo_query($sql);
foreach($t as $temp)
{
	extract($temp);
	$ID=$id_order;
}
foreach($_SESSION['mycart'] as $o){
$sql="insert into detail_order_ticket(id_order,id_product,size,amount,price,total) values('$ID','$o[7]','$o[3]','$o[4]','$o[1]','$o[5]')";
pdo_execute($sql);
$sql="select amount from warehouse where id_product=".$o[7]." and size='".$o[3]."'";
$sl=pdo_query_one($sql);
$a=$sl["amount"];
$newSL=$a-$o[4];
$sql="update warehouse set amount=".$newSL." where id_product=".$o[7]." and size='".$o[3]."'";
pdo_execute($sql);	
}
$_SESSION['tb']=2;
$_SESSION['mycart']=[];
$_SESSION['mycartMini']=[];
echo '<script>location.replace("mensport.com?giohang");</script>';	
?>