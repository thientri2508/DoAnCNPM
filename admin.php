<title>Admin Server</title>
<link href="fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link href="Style.css" rel="stylesheet" type="text/css" />
<script src="jquery.js"></script>
<body class="preload">
<div class="load">
<img src="photo/source.gif"  />
</div>
<script>
$(window).on('load',function(event){
	$('body').removeClass('preload');
	$('.load').delay(10).fadeOut('fast');
	setTimeout(function(){
		$('body').css('overflow-y','scroll');
	},500);
});
</script>
<div style="width:100%; height:100px; background:#000; position:relative">
<div class="alert alert-primary" role="alert" id="thongbaoad"></div>
<a href="server.php?TrangChu"><h2 style="color:#FFFFFF;width:300px; float:left; font-size:35px; margin-left:30px; margin-top:20px"><b>Administrator</b></h2></a>
<a href="server.php"><button type="button" class="btn btn-light" style="float:right; margin-top:30px; margin-right:50px">Log Out<i class="fas fa-sign-out-alt" style="margin-left:5px"></i></button></a>
<div id="delSP" style="height:750px">
	
</div>
<div id="AddDetailAttr" style="height:750px">
</div>

<div id="AddAttr" style="height:750px">
</div>

<div id="AddPromotionsContent" style="height:750px">
</div>

</div>

<div style="width:1510px; margin:auto">
<div style="width:22%; height:640px; float:left; position:relative; overflow-y: scroll">
<a href="server.php?category=profile"><div id="admin">
	<i class="fas fa-user-shield fa-3x" style="position:absolute; top:15px; left:25px"></i>
    <h3 style="position:absolute; font-size:18px; left:100px; top:15px"><?php $nameAdmin=$_SESSION['adminlogin']; echo $nameAdmin[2]; ?></h3>
    <h2 style="position:absolute; font-size:20px; left:130px; top:40px;text-transform: uppercase;"><?php $nameAdmin=$_SESSION['adminlogin']; echo $nameAdmin[5]; ?></h2>
</div></a>
<?php
$nameAdmin=$_SESSION['adminlogin']; 
$id=$nameAdmin[7];
$sql="SELECT role.id FROM role,account WHERE account.job=role.name AND account.id=".$id;
$id_category=pdo_query_one($sql);
$sql="SELECT name FROM job,category_admin WHERE job.job=category_admin.id AND job.id_role='".$id_category["id"]."'";
$category=pdo_query($sql);
?>
<div class="container">
      <?php
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Danh Mục') {
      echo '<a href="server.php?category=qldm"><div class="chitietdanhmuc" style="margin-top:50px" id="qldm"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-list-ol" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
      } 
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Sản Phẩm') {
      echo '<a href="server.php?category=qlsp"><div class="chitietdanhmuc" id="qlsp"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fab fa-product-hunt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
      }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Loại Sản Phẩm') {
      echo '<a href="server.php?category=qllsp"><div class="chitietdanhmuc" id="qllsp"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-sort-alpha-up-alt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
      }    
	  foreach($category as $c){
	  extract($c);
	  if($name=='Sale Off') {
      echo '<a href="server.php?category=sale-off"><div class="chitietdanhmuc" id="sale"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<img src="photo/coupon.png" style="margin-left:128px; margin-top:-5px; width:25px; height:25px" /></div></a>';break;}
	  }
	   foreach($category as $c){
	  extract($c);
	  if($name=='Mã Giảm Giá') {
      echo '<a href=""><div class="chitietdanhmuc" id="voucher"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;Mã Giảm Giá<i class="fas fa-gift" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Chương Trình Khuyến Mãi') {
      echo '<a href="server.php?category=ctkm"><div class="chitietdanhmuc" id="ctkm"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;CT Khuyến Mãi<i class="fas fa-gifts" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Giao Diện') {
      echo '<a href="server.php?category=image"><div class="chitietdanhmuc" id="img"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="far fa-image" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Thông Tin') {
      echo '<div class="chitietdanhmuc"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-question-circle" style="float:right; margin-top:12px; margin-right:20px"></i></div>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Danh Sách Đơn Hàng') {
      echo '<a href="server.php?category=order"><div class="chitietdanhmuc" id="dsdh"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="far fa-list-alt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Kho Hàng') {
      echo '<a href="server.php?category=import"><div class="chitietdanhmuc" id="qlnk"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-warehouse" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Phiếu Nhập Hàng') {
      echo '<a href="server.php?category=DS_import"><div class="chitietdanhmuc" id="qlpnh"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-ticket-alt" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Nhà Cung Cấp') {
      echo '<a href="server.php?category=supplier"><div class="chitietdanhmuc" id="qlncc"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fab fa-supple fa-2x" style="float:right; margin-top:7px; margin-right:8px;"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Người Dùng') {
      echo '<a href="server.php?category=user_management"><div class="chitietdanhmuc" id="qluser"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="far fa-user-circle" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Quản Lý Nhân Viên') {
      echo '<a href="server.php?category=staff_management"><div class="chitietdanhmuc" id="qlstaff"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-user-tie" style="float:right; margin-top:12px; margin-right:20px"></i></div></a>';break;}
	  }
	  foreach($category as $c){
	  extract($c);
	  if($name=='Nhóm Quyền') {
      echo '<a href="server.php?category=role"><div class="chitietdanhmuc" id="role"><i class="fas fa-caret-right"></i>&nbsp;&nbsp;'.$name.'<i class="fas fa-users" style="float:right; margin-top:12px; margin-right:17px"></i></div></a>';break;}
	  }
	  ?>
 
</div>
<!--<div id="block"></div>-->
</div>
<div style="background:#E8E8E8; height:640px; width:78%; float:right; position:relative; overflow-y:scroll" id="adminright">
<div id="mess" style="position:fixed; z-index:100;right:30px"></div>
<?php
if(isset($_GET['category'])){
$category=$_GET['category'];
switch ($category){
	case 'qlsp':
	include 'QLSP.php';
	break;
	case 'qllsp':
	include 'QLLSP.php';
	break;
	case 'qldm';
	include 'QLDM.php';
	break;
	case 'sale-off':
	if(!isset($_GET['act'])) {
	include "saleoff.php";
	}
	else include 'saleSP.php';
	break;
	case 'ctkm';
	include 'promotions.php';
	break;
	case 'image';
	include 'image.php';
	break;
	case 'supplier';
	include 'supplier.php';
	break;
	case 'import';
	if(!isset($_GET['act'])) {
	include "import.php";
	}
	else include 'CT_import.php';
	break;
	case 'DS_import';
	include 'DS_import.php';
	break;
	case 'profile';
	include 'profileServer.php';
	break;
	case 'order';
	include 'DS_order_server.php';
	break;
	case 'user_management';
	include 'QL_user.php';
	break;
	case 'staff_management';
	include 'QL_staff.php';
	break;
	case 'role';
	include 'role.php';
	break;
	case 'top10sp':
	include 'top10sp.php';
	break;
	case 'top10seller':
	include 'top10seller.php';
	break;
	case 'revenue':
	include 'doanhthu.php';
	break;
}
}
else {
	include 'thongke.php';
}
?>
</div>
</div>
<script>
var dh=0;
function sendMess() {
const main = document.getElementById('mess');
if (main) {
	const toast = document.createElement("div");
	toast.innerHTML ='<div class="toast fade show" id="myToast" style="margin-top:20px"><div class="toast-header"><strong class="me-auto"><i class="bi-gift-fill"></i> Thông báo đơn hàng</strong><small></small><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">Đơn hàng mới vừa được gửi đến!</br>Vui lòng vào danh sách đơn hàng để kiểm tra</div></div>';
	toast.style.transition = 'all linear 0.3s';
	toast.style.animation = 'slideInLeft ease .3s, fadeOut linear 1s 5s forwards';
	const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, 6000);
      toast.onclick = function (e) {
        if (e.target.closest(".btn-close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
	main.appendChild(toast);
}
}
$(document).ready(function () {
	setInterval(ktData,500)
});
function ktData(){
	$.ajax({
		url: 'ktDH.php',
		type: 'POST',
		cache: false,
		success: function(response) {
			var kq=parseInt(response);
			if(dh==0) {
				dh=kq;
			}
			else{
				if(kq>dh){
					sendMess();
				}
				dh=kq;
			}
		}
	});
}
$('.acc_ctrl').on('click', function(e) {
  e.preventDefault();
  
  if ($(this).hasClass('active')) {
  $(this).removeClass('active');
    $(this).next()
    .stop()
    .slideDown(300);
  } else {
      
	     $(this).addClass('active');
    $(this).next()
    .stop()
    .slideUp(300);
  }
});

</script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="script.js"></script>
