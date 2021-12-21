<?php
$id = $_REQUEST["id"];
include 'pdo.php';
$sql="select * from account where id=".$id;
$acc=pdo_query_one($sql);
extract($acc);
echo '<h1 style="padding-top:30px; height:80px; margin-left:30px; width:50%; margin:auto; text-align:center"><b>THÔNG TIN TÀI KHOẢN</b></h1>
	<form method="post" action="fixProfileAdmin.php">
    <div style="width:100%; height:650px; margin-top:50px">
        <div style="width:40%; float:left; height:100%; background:#fff; margin-left:95px; position:relative">
        	<h5 style="margin-left:40px; margin-top:40px">ID Tài Khoản<i class="far fa-id-card" style="margin-left:40px"></i></h5>
      		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly="readonly" value="'.$id.'" style="width:75%; margin-left:40px; margin-top:20px">
        	<h5 style="margin-left:40px; margin-top:40px">Tên Nhân Viên<i class="fas fa-tag" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$fullname.'" style="width:75%; margin-left:40px; margin-top:20px" name="namead" id="namead">
			<div id="kt1" style="position:absolute; width:77%; height:20px; top:245px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Số Điện Thoại<i class="fas fa-phone-volume" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$phone.'" style="width:75%; margin-left:40px; margin-top:20px" name="phonead" id="phonead">
			<div id="kt2" style="position:absolute; width:77%; height:20px; top:367px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Địa Chỉ<i class="fas fa-map-marked-alt" style="margin-left:40px"></i></h5>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$address.'" style="width:75%; margin-left:40px; margin-top:20px" name="addressad" id="addressad">
			<div id="kt3" style="position:absolute; width:77%; height:20px; top:490px; left:40px;color:#FF0000"></div>
        </div>
        <div style="width:40%; float:left; height:100%; background:#fff; margin-left:40px; position:relative">
        	<h5 style="margin-left:40px; margin-top:40px">Ngày Đăng Ký<i class="fas fa-calendar-day" style="margin-left:40px"></i></h5>
      		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$datesignup.'" readonly="readonly" style="width:75%; margin-left:40px; margin-top:20px">
            <h5 style="margin-left:40px; margin-top:40px">Quyền Tài Khoản<i class="fab fa-critical-role" style="margin-left:40px"></i></h5>
      		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$role.'" readonly="readonly" style="width:75%; margin-left:40px; margin-top:20px">
            <h5 style="margin-left:40px; margin-top:40px">Tên Tài Khoản<i class="fas fa-user-alt" style="margin-left:40px"></i></h5>
      		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="'.$username.'" readonly="readonly" style="width:75%; margin-left:40px; margin-top:20px">
             <h5 style="margin-left:40px; margin-top:40px">Mật Khẩu<i class="fas fa-lock" style="margin-left:40px"></i></h5>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="passad" id="passad">
			<div id="kt4" style="position:absolute; width:77%; height:20px; top:490px; left:40px;color:#FF0000"></div>
            <h5 style="margin-left:40px; margin-top:40px">Nhập Lại Mật Khẩu</h5>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="width:75%; margin-left:40px; margin-top:20px" name="prepassad" id="prepassad">
			<div id="kt5" style="position:absolute; width:77%; height:20px; top:610px; left:40px;color:#FF0000"></div>
        </div>
    </div>
	<input type="submit" class="btn btn-danger" style="width:180px; height:60px; margin-left:42%; font-size:24px; margin-top:50px" value="Cập Nhật" onclick="return checkTTAD();"></input>
	</form>';
?>
