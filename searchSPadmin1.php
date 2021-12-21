<?php
include 'pdo.php';
function vn_to_str ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
$t=strtolower($str);
}
return $t;
 
}
$s=$_REQUEST['s'];
$search=array();
$s1='<div style="width:100%; height:130px; background-color: #C6E2FF;">';
$s2='<div style="width:100%; height:130px; background-color: #B9D3EE;">';
$sql="SELECT id_product from detail_product WHERE id_detail_properties=18";
	$str='';
	$id_sale=pdo_query($sql);
	foreach($id_sale as $sale){
		extract($sale);
		$str.=" AND id!=".$id_product;
	}
	$sql="select * from product where del!='del'".$str;
	$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($name), vn_to_str($s));
	if($pos!==false) {
		$t=array($id,$name,$price,$image);
		array_push($search,$t);
	}
}
$i=0;
foreach($search as $t){
		$sql="SELECT detail_properties.name as 'status' FROM detail_properties,detail_product WHERE detail_product.id_product=".$t[0]." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  $tt=pdo_query_one($sql);
		  if($i%2==0) {echo $s1;}
		  else {echo $s2;}
		 echo '<div style="width:8%;padding-left:15px" class="listItem"><b>'.$t[0].'</b></div>
        <div style="width:11%; background:#fff" class="listItem">
		<img src="photo/'.$t[3].'" style="width:100%; height:100%" />		
        </div>
        <div style="width:30%; padding-left:30px;" class="listItem"><b>'.$t[1].'</b></div>
        <div style="width:20%;padding-left:20px;" class="listItem"><b>'.$t[2].'</b></div>
        <div style="width:15%" class="listItem"><b>'.$tt["status"].'</b></div>
        <div style="width:15%; padding-left:18px" class="listItem">
		<img src="photo/discount.png" style="width:50px; height:50px" onclick="saleoff('.$t[0].')" />
        </div>
    </div>';
	$i++;
	}


?>
