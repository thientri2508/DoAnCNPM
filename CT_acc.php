<?php
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="SELECT role.name FROM role,account WHERE role.id=account.job AND account.id=".$id;
$job=pdo_query_one($sql);
$sql="select * from account where id=".$id;
$acc=pdo_query_one($sql);
extract($acc);
echo '<div style="float:left; width:35%; height:130px">
        	<img src="photo/user (1).png" style="width:80%; height:87%; margin-left:20px"  />
        </div>
        <div style="float:right; width:65%; height:130px">
        	<div style="margin-left:20px; font-size:20px; margin-top:15px;color:#ff5f17"><b>ID: '.$id.'</b></div>
            <div style="margin-left:20px; font-size:20px; margin-top:15px;color:#ff5f17"><b>Tên: '.$fullname.'</b></div>
        </div>
            <div style="clear:both; width:100%">
        	<div style="float:left; width:50%; height:200px">
                <div class="CT_TTacc"><b>Tên Tài Khoản<i class="fas fa-user-tag" style="margin-left:15px"></i></b></div>
                <div class="CT_TTacc">'.$username.'</div>';
				if($status=='on') echo '<div class="CT_TTacc"><b>Trạng Thái<i class="fas fa-toggle-on" style="margin-left:15px"></i></b></div>';
                else echo '<div class="CT_TTacc"><b>Trạng Thái<i class="fas fa-toggle-off" style="margin-left:15px"></i></b></div>';
                echo '<div class="CT_TTacc">'.$status.'</div>
            </div>
            <div style="float:right; width:50%; height:200px">
                <div class="CT_TTacc"><b>Số Điện Thoại<i class="fas fa-phone-volume" style="margin-left:15px"></i></b></div>
                <div class="CT_TTacc">'.$phone.'</div>
                <div class="CT_TTacc"><b>Ngày Đăng Ký<i class="fas fa-calendar-day" style="margin-left:15px"></i></b></div>
                <div class="CT_TTacc">'.$datesignup.'</div>
            </div>
            <div style="width:100%; height:180px; position:absolute; top:280px">';
				if($role!='user') {echo '<div class="CT_TTacc"><b>Chức Vụ<i class="fas fa-user-tie" style="margin-left:15px"></i></b></div>
                <div class="CT_TTacc">'.$job.'</div>';}
                echo '<div class="CT_TTacc"><b>Địa Chỉ<i class="fas fa-map-marked-alt" style="margin-left:15px"></i></b></div>
                <div class="CT_TTacc">'.$address.'</div>
            </div>
        </div>';
?>
