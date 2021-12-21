<?php
$q = $_REQUEST["q"];
$s = $_REQUEST["s"];
include "pdo.php";
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
$search=array();
$sql="select * from product where del!='del'";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($name), vn_to_str($s));
	if($pos!==false) {
		$t=array($id,$name,$price,$image);
		array_push($search,$t);
	}
}

	$count=0;
	echo '<div style="width:100%; margin:auto; height:530px">';
	$numItems = count($search);
	$start=($q-1)*12;
	$end=$start+12;
	if($end>$numItems) {$end=$numItems;}
    	for($i=$start;$i<$end;$i++)
   		{
			$sta='';
			$sql="SELECT detail_properties.name FROM detail_properties,detail_product WHERE detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id AND detail_product.id_product=".$search[$i][0];
			$stt=pdo_query_one($sql);
			if($stt != ''){
				$sta=$stt["name"];
			}
			echo '<div class="SPsearch" style="float:left; margin-left:10px" id="img'.$search[$i][0].'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="mensport.com?product-detail='.$search[$i][0].'"><div class="imgSPsearch"> 
            	<img src="photo/'.$search[$i][3].'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$search[$i][0].'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status">'.$sta.'</p>
            <a href="mensport.com?product-detail='.$search[$i][0].'"><h5 class="nameSP"><b>'.$search[$i][1].'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.number_format($search[$i][2]).' VND</b></h5>
       		</div>';
		}
		echo '</div>';
?>
