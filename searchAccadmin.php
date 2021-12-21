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
$role=$_REQUEST['role'];
if($role=='user') {
$sql="select * from account where role='".$role."'";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($fullname), vn_to_str($s));
	if($pos!==false) {
		echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:50%; height:100%">
            	<h5 style="margin-left:20px; margin-top:15px;">Tên Người Dùng</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">'.$fullname.'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Tên Tài Khoản</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px; color:#ff5f17">'.$username.'</div>
            </div>
            <div style="float:right; width:50%; height:100%">
            	<div style="float:left; width:50%; height:100%">
                	<button type="button" class="btn btn-info" style="width:130px; height:50px; margin-top:20px" onclick="CT_acc('.$id.')"><b>Xem Chi Tiết</b></button>
                    <button type="button" class="btn btn-success" style="width:130px; height:50px; margin-top:30px" onclick="upRole('.$id.')"><b>Cấp Quyền</b></button>
                </div>
                <div style="float:right; width:50%; height:100%">';
				if($status=="on") { echo '<button type="button" class="btn btn-warning" style="margin-left:10px; width:130px; height:50px; margin-top:20px" onclick="close_acc('.$id.',1)"><b><i class="fas fa-user-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;Khóa</b></button>';}
				else {echo '<button type="button" class="btn btn-warning" style="margin-left:10px; width:130px; height:50px; margin-top:20px" onclick="close_acc('.$id.',2)"><b><i class="fas fa-lock-open"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mở</b></button>';}
                   echo' <button type="button" class="btn btn-danger" style="margin-left:10px; width:130px; height:50px; margin-top:30px" onclick="xoaAcc('.$id.')"><b>Xóa</b></button>
                </div>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
	}
}
}
else {
$sql="select * from account where role='".$role."'";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($fullname), vn_to_str($s));
	if($pos!==false) {
		echo '<div style=" height:180px;width:100%;position:relative; margin-top:10px">
        	<div style="float:left; width:50%; height:100%">
            	<h5 style="margin-left:20px; margin-top:15px;">Tên Nhân Viên</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px;color:#ff5f17">'.$fullname.'</div>
                <h5 style="margin-left:20px; margin-top:15px;">Tên Tài Khoản</h5>
                <div style="margin-left:20px; margin-top:10px; font-size:18px; color:#ff5f17">'.$username.'</div>
            </div>
            <div style="float:right; width:50%; height:100%">
            	<div style="float:left; width:50%; height:100%">
                </div>
                <div style="float:right; width:50%; height:100%">';
					echo '<button type="button" class="btn btn-info" style="margin-left:10px; width:130px; height:50px; margin-top:20px" onclick="CT_acc('.$id.')"><b>Xem Chi Tiết</b></button>';
                   echo' <button type="button" class="btn btn-danger" style="margin-left:10px; width:130px; height:50px; margin-top:30px" onclick="xoaAcc('.$id.')"><b>Xóa</b></button>
                </div>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';}
		}
}
?>
