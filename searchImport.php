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
$s1='<div style="width:100%; height:130px; background-color: #d1e7dd;">';
$s2='<div style="width:100%; height:130px; background-color: #bcd0c7;">';
$sql="select * from product where del!='del'";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($name), vn_to_str($s));
	if($pos!==false) {
		echo '<div class="itemCart" style=" height:200px">
	<div style="float:left; width:140px; height:140px; background:#FFF; margin-top:18px; cursor:pointer">
		<img src="photo/'.$image.'" style="width:100%; height:100%" />
	</div>
   <div style="float:left; width:320px; height:140px; margin-top:18px; margin-left:18px">
        <h5 class="itemCartName"><b>'.$name.'</b></h5>
        <div style="font-size:16px; margin-top:20px"><b>Mã sản phẩm: '.$id.'</b></div>
        <h6 style="font-size:17px; margin-top:20px; color:#ff5f17; float:left;">Giá:&nbsp;'.$price.' VND</h6>
                    
	</div>
   <div style="float:right; width:150px; height:140px; margin-top:18px">
       <div style="border: #a3a3a3 1px solid; width:130px; height:60px; clear:both; margin-top:5px; margin-left:10px; font-size:21px; cursor:pointer; color:#ff5f17; text-align:center" onclick="SLSP('.$id.')" id="see-'.$id.'"><i class="far fa-eye fa-2x" style="margin-top:10px"></i></div>            
       <div style="border: #a3a3a3 1px solid; color:#FFFFFF; width:130px; height:60px; cursor:pointer; clear:both; margin-top:15px; margin-left:10px; background:#000; font-size:21px; text-align:center" onclick="importSP('.$id.')"><i class="fas fa-cloud-upload-alt fa-2x" style="margin-top:7px"></i></div>                
   </div>
   <div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:197px"></div>
</div> ';
	}
}
?>