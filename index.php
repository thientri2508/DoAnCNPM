<?php 
session_start();
?>
<title>Men Sport</title>
<script src="jquery.js"></script>
<link href="fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link href="Style.css" rel="stylesheet" type="text/css" />
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
	<div>
    <div id="delDH"></div>
    	<div class="top">	
        <ul id="log">
            <img src="photo/icon.png" width="20" height="22" />
        	<li>Thông Báo</li>
            <img src="photo/shopping.png" width="20" height="22" />
            <a href="mensport.com?giohang"><li>Giỏ Hàng</li></a>
            <?php if(isset($_SESSION['userlogin'])&&$_SESSION['userlogin']!="") echo '<li onclick="logout()"><i class="fas fa-sign-out-alt" style="margin-left:-20px"></i>&nbsp;Đăng Xuất</li>';
			else echo '<img src="photo/user.png" width="20" height="22" /><a href="mensport.com?dangnhap"><li>Đăng Nhập</li></a>';
			?>
        </ul>
        </div>
    	<div class="header"> 
        <?php
            if(!isset($_SESSION['mycart'])) echo '<div data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" id="CartIcon">0<br /><i class="fas fa-shopping-bag"></i></div>';
            else { $qtyCart=count($_SESSION['mycart']);
            echo '<div id="CartIcon" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">'.$qtyCart.'<br /><i class="fas fa-shopping-bag"></i></div>';
            }
            ?>	
            
            <?php
			if(isset($_SESSION['userlogin'])&&$_SESSION['userlogin']!="") { $name=$_SESSION['userlogin'];
			echo '<a href="mensport.com?profile"><div class="iconDN"><i class="fas fa-user-tag" style="transform: rotate(-90deg); margin-left:7px"></i>&nbsp;&nbsp;'.$name[2].'</div></a>';}
			?>
            
        	<div class="accordion accordion-flush" id="accordionFlushExample" style="position:fixed; z-index:4; right:0px; top:230px">
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="position:absolute; top:0px; right:40px; background:#ddd; ">
                    <div style=" width:300px; max-height:500px">
                    	<h6 style="font-size:16px; color:#000000; margin-left:16px; margin-top:10px; margin-bottom:12px"><b>GIỎ HÀNG</b></h6>
                        <div style="width:90%; margin-left:16px; border-top:solid 3px #000000"></div>
                        <div id="CartMini">
                        <?php
						if(isset($_SESSION['mycartMini'])&&count($_SESSION['mycartMini'])>0) {
						foreach($_SESSION['mycartMini'] as $sp) {
						echo '<div style="width:100%">
                            	<div style="float:left; width:77px; margin-top:7px; height:77px; background:#E8E8E8">
									<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
								</div>
                                <div style="float:left; width:64%; margin-top:7px; margin-left:12px">
                                	<div style="font-size:13px; color:#000"><b>'.$sp[0].'</b></div>
                                    <div style="font-size:11px; margin-top:12px; color:#000"><b>'.number_format($sp[1]).' VND</b></div>
                                    <div style="width:100%; height:15px">
                                    	<div style="font-size:11px; float:left; color:#000">Size:</div>
                                        <div style="font-size:11px; float:right; color:#000">'.$sp[3].'</div>
                                    </div>
                                    <div style="width:100%; height:15px; clear:both;">
                                    	<div style="font-size:11px; float:left; color:#000">Số lượng:</div>
                                        <div style="font-size:11px; float:right; color:#000">'.$sp[4].'</div>
                                    </div>
                                </div>
                                <div style="width:100%; border-top: dashed 2px #000; clear:both"></div>
                            </div>';
						}
						$tt3=0;
                        foreach($_SESSION['mycartMini'] as $sp)
						{
							$tt3+=$sp[5];
						}
                        	  
                        echo '</div>           
                        <h6 style="font-size:13px; color:#000000; margin-left:16px; margin-top:35px; float:left"><b>Tổng cộng:</b></h6>
                        <h6 style="font-size:13px; margin-left:16px; margin-top:35px; float:right; margin-right:14px" id="tt3"><b>'.number_format($tt3).' VND</b></h6>';
                        }
						else {
							echo '</div>           
                        <h6 style="font-size:13px; color:#000000; margin-left:16px; margin-top:35px; float:left"><b>Tổng cộng:</b></h6>
                        <h6 style="font-size:13px; margin-left:16px; margin-top:35px; float:right; margin-right:14px" id="tt3"><b>0 VND</b></h6>';
						}
						?>
                        <a href="mensport.com?giohang"><div class="thanhtoanCart"><b>THANH TOÁN</b></div></a>
                    </div>
                </div> 
			</div>
			
            <div class="alert alert-secondary" role="alert" id="thongbao"><b>Đăng Nhập Thành Công!</b></div>
            <?php
				if(isset($_SESSION['tb'])) {
					if($_SESSION['tb']==1){
						echo '<script>document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==2){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Đặt Hàng Thành Công!</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==4){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Hủy Đơn Hàng Thành Công!</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="24px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==5){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Không Thể Hủy Đơn Hàng Đã Được Xác Nhận!</b>";
						document.getElementById("thongbao").style.color="#FF0000";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==6){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Cập Nhật Thông Tin Cá Nhân Thành Công</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==9){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Rất Tiếc! Tài Khoản Của Bạn Đã Bị Khóa</b>";
						document.getElementById("thongbao").style.color="red";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==10){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Sai Email Hoặc Mật Khẩu</b>";
						document.getElementById("thongbao").style.color="red";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==11){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Đổi Mật Khẩu Thành Công</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==12){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Thêm Địa Chỉ Thành Công</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==13){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Thêm Địa Chỉ Thất Bại - Địa Chỉ Này Đã Tồn Tại</b>";
						document.getElementById("thongbao").style.color="red";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==14){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Đã Thay Đổi Địa Chỉ Giao Hàng Mặc Đinh</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						
						unset($_SESSION['tb']);
					}
					else if($_SESSION['tb']==15){
						echo '<script>document.getElementById("thongbao").innerHTML="<b>Xóa Địa Chỉ Thành Công</b>";
						document.getElementById("thongbao").style.color="green";
						document.getElementById("thongbao").style.fontSize="18px";
						document.getElementById("thongbao").style.display="block";
						function closeTB(){
							document.getElementById("thongbao").style.display="none";
						}
						setTimeout(closeTB,3000);
						</script>';
						
						unset($_SESSION['tb']);
					}
				}
			?>
            
        	<a href="mensport.com"><img src="photo/logo1.gif" width="130" height="130" style="margin-left:8%; float: left" /></a>
            <div id="menu">
                <ul>
                <?php
						include 'pdo.php';
						$sql="select * from category order by stt asc";
						$list=pdo_query($sql);
						$i=1;
						foreach($list as $cate){
							extract($cate);
							$url="'mensport.com?IDcategory=".$id."'";
							if($i==1) {
								echo '<li onclick="content('.$url.');" style="margin-left:0px">
										<b>'.$name.'</b>
                    			  </li>';}
							else {
								echo '<li onclick="content('.$url.');">
										<b>'.$name.'</b>
                    			  </li>';}
						    $i=0;
						}
						
					?>
                    <li><img src="photo/news_discover.png" width="80" height="40" style="margin-top:-27px" /></li>
                    <!--<li onclick="content('index.php?category=shoes');" style="margin-left:-150px" id="cate1"><b>GIÀY&nbsp&nbsp</b>
                    </li>
                    <li onclick="content('index.php?category=accessories');" id="cate3"><b>PHỤ KIỆN&nbsp&nbsp</b>
                    </li>
                    <li><b>BẢO HÀNH</b></li>
                    <li onclick="content('index.php?saleoff');"><b>SALE OFF</b></li>-->
                </ul> 
            </div>
          
            <div style="position:absolute; top:45px; right:50px;">
            	<nav class="navbar navbar-light">
                    <div class="container-fluid">
                       	<div class="d-flex">
                         	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                          	<button class="btn btn-outline-success" onClick="searchSP()">Search</button>
                        </div>
                   	</div>
             	</nav>
            </div>
        </div>
       <!-- <div id="sub-menu1" class="sub-menu" onmouseover="zxc(this);" onmouseout="qwe(this);">
        <div style="margin:auto; width:1300px; height:70%">
       <img src="photo/logo6.png" class="photo" id="1" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('adidas')" />
       <img src="photo/logo7.png" class="photo" id="2" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('nike')" />
       <img src="photo/logo9.png" class="photo" id="3" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('new-balance')" />
       <img src="photo/logo8.jpg" class="photo" id="4" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="attribute('puma')" />
        </div>
         <div style="margin:auto; width:1300px; height:20%">
        <h3 class="title" style="margin-left:130px" id="title1" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">ADIDAS</h3>
        <h3 class="title" style="margin-left:225px" id="title2" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">NIKE</h3>
        <h3 class="title" style="margin-left:180px" id="title3" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">NEW BALANCE</h3>
        <h3 class="title" style="margin-left:175px" id="title4" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">PUMA</h3>
        </div>
        <p style="margin:auto; width:300px; opacity:0.4; font-family:Tahoma; font-size:18px; color:#FFFFFF; text-align:center">Choose your favorite maker!</p>
        </div>
        <div id="sub-menu3" class="sub-menu" onmouseover="zxc(this);" onmouseout="qwe(this);">
       	<div style="margin:auto; width:1300px; height:70%">
        <img src="photo/vo.jpg" class="photo" id="5" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="phukien('shocks')" />
        <img src="photo/tui.jpg" class="photo" id="6" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="phukien('hand-bag')" />
        <img src="photo/phukienbaove.jpg" class="photo" id="7" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="phukien('protect')" />
        <img src="photo/style.jpg" class="photo" id="8" onmouseover="hoverIn1(this);" onmouseout="hoverOut1(this);" onclick="phukien('style')" />
        </div>
         <div style="margin:auto; width:1300px; height:20%">
        <h3 class="title" style="margin-left:150px" id="title5" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">VỚ</h3>
        <h3 class="title" style="margin-left:235px" id="title6" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">TÚI XÁCH</h3>
        <h3 class="title" style="margin-left:195px" id="title7" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">BẢO VỆ</h3>
        <h3 class="title" style="margin-left:210px" id="title8" onmouseover="hoverIn2(this);" onmouseout="hoverOut2(this);">STYLE</h3>
        </div>
        <p style="margin:auto; width:300px; opacity:0.4; font-family:Tahoma; font-size:18px; color:#FFFFFF; text-align:center">Choose your favorite accessory!</p>
        </div>         
        </div>-->
        <div style="width:100%; height:45px; background-color:#E8E8E8; position:relative;">
        	<i class="fas fa-chevron-left" style="position:absolute; left:24%; line-height:45px; cursor:pointer" onClick="change2();"></i>
        	<i class="fas fa-chevron-right" style="position:absolute; right:24%; line-height:45px; cursor:pointer" onClick="change1();"></i>
            <div style="width:440px; overflow:hidden; margin-left: 38%">
                <div id="chuyen">
                    <h5 class="introduce" style="margin-left:0px">BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</h5>
                    <h5 class="introduce">FREE SHIPPING VỚI HÓA ĐƠN TỪ 800K!</h5>
                    <h5 class="introduce">HÀNG 2 TUẦN NHẬN ĐỔI - GIÀY NỬA NĂM BẢO HÀNH</h5>
                    <h5 class="introduce">BUY 2 GET 10% OFF - ÁP DỤNG VỚI TẤT CẢ BASIC TEE</h5>
                </div>
            </div>
        </div>
         <div style="margin:auto; width:1475px; display:block" id="slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide4"></button>
                </div>
                <div class="carousel-inner">
                	<?php
					  $sql="SELECT image_adv.id,image_adv.name from image_adv,adv WHERE adv.id_adv=1 AND adv.id_img=image_adv.id";
					  $adv1=pdo_query($sql);
					  $i=1;
					  foreach($adv1 as $a){
						if($i==1) echo '<div class="carousel-item active">';
						else echo '<div class="carousel-item">';
						echo	'<img src="photo/image_adv/'.$a["name"].'" class="d-block w-100" width="1475" height="780" style="position:relative">
							</div>';
						$i++;
					  }
				  	?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
         <div id="xoaPage">
      
         </div>
    <div id="content">
        <?php
		if(isset($_GET['IDcategory'])) { 
			$sql="select * from category where id='".$_GET['IDcategory']."'";
			$result=pdo_query_one($sql);
			extract($result);
			if($file_name!='')
				if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
				require($file_name);
		}
		else if(isset($_GET['product-detail'])) { require('CTSP.php'); }
		else if(isset($_GET['giohang'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content2.php'); }
		else if(isset($_GET['shipping-infomation'])) { 
			require('shipping-infomation.php'); }
		else if(isset($_GET['dangnhap'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content3.php'); }
		else if(isset($_GET['dangki'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content6.php'); }
		else if(isset($_GET['DS_order'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content7.php'); }
		else if(isset($_GET['search'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content8.php'); }
		else if(isset($_GET['verify'])) { require('verify.php'); }
		else if(isset($_GET['profile'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('content10.php'); }
		else if(isset($_GET['forgotpassword'])) { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}
			require('forgotPass.php'); }	
		else { 
			if(isset($_SESSION['TTTK'])) {
					unset($_SESSION['TTTK']);
				}	
			require('content.php'); }
		?>
    </div>
    <div class="footer">
    	<div class="footerLayout" style="width:25%">
        <div style="width:280px; height:250px; margin:auto; margin-top:10px">
        	<img src="photo/footer.png" width="280" height="250" />
        </div>
        <div style="width:215px; height:40px; background-color:#f15e2c; border: #f15e2c 1px solid; color: #fff;font-feature-settings: 'kern';font-size: 20px; margin:auto; margin-top:-10px; text-align:center; line-height:40px;cursor:pointer;"><b>TÌM CỬA HÀNG</b></div>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>SẢN PHẨM</b></h5>
        <p class="footerFont">Giày</p>
        <p class="footerFont">Phụ Kiện</p>
        <p class="footerFont">Bảo Hành</p>
        <p class="footerFont">Sale-off</p>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>VỀ CÔNG TY</b></h5>
        <p class="footerFont">Tuyển Dụng</p>
        <p class="footerFont">Liên Hệ Nhượng Quyền</p>
        <p class="footerFont">Về Shop</p>
    </div>
    <div class="footerLayout">
        <h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>HỖ TRỢ</b></h5>
        <p class="footerFont">FAQs</p>
        <p class="footerFont">Bảo Mật Thông Tin</p>
        <p class="footerFont">Chính Sách Chung</p>
        <p class="footerFont">Tra Cứu Đơn Hàng</p>
    </div>
    <div class="footerLayout">
    	<h5 style="font-feature-settings: 'kern';color:#FFFFFF; font-size:22px; margin-top:50px; cursor:pointer; margin-bottom:25px"><b>LIÊN HỆ</b></h5>
        <p class="footerFont">Email Góp Ý</p>
        <p class="footerFont">Hotline</p>
        <p class="footerFont">0936 942 749</p>
    </div>
    <div style="width:800px; margin:auto; height:110px; clear:both">
    	<div style="width:30%; float:left; height:100%">
        	<img src="photo/footer1.png" width="300" height="120" style="margin-top:-30px; margin-left:30px" />
        </div>
        <div style="width:70%; float:right; height:100%; font-family:Tahoma; font-size:17px; color:#FFFFFF; opacity:0.3; text-align:center; line-height:110px">Copyright © 2020 MenSport. All rights reserved.</div>
    </div>
    <div style="position:absolute; width:75%; right:0px; height:80px; top:230px;">
    	<div style="width:500px; height:80px; margin:auto">
        	<img src="photo/footer3.png" width="240" height="100" style="margin-left:215px; margin-top:-10px; cursor:pointer"/>
        </div>
    </div>
    </div>
    <div id="test"></div>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

