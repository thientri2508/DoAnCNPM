	<div style="width:100%; height:530px">
            	<h3 class="danhmuc"><b>DANH MỤC MUA HÀNG</b></h3>
                <div style="width:32.7%; float:left; height:270px; margin-top:50px; background:#555; position:relative">
                <img src="photo/logo1.jpg" class="danhmucSrc"/>
                <h4 class="danhmucTitle"><b>GIÀY</b></h4>
                <h6 class="danhmucTitle" style="top:93px" onclick="attr(1)"><b>Firm Ground</b></h6>
                <h6 class="danhmucTitle" style="top:122px" onclick="attr(2)"><b>Turf</b></h6>
                <h6 class="danhmucTitle" style="top:152px" onclick="attr(3)"><b>Indoor</b></h6>
                </div>
                <div style="width:32.7%; float:left; height:270px; margin-left:10px; margin-top:50px; background:#555;position:relative">
                <img src="photo/logo2.jpg" class="danhmucSrc"/>
                <h4 class="danhmucTitle"><b>TRẠNG THÁI</b></h4>
                <h6 class="danhmucTitle" style="top:93px" onclick="attr(5)"><b>New Arrivals</b></h6>
                <h6 class="danhmucTitle" style="top:122px" onclick="attr(4)"><b>Best Seller</b></h6>
                <h6 class="danhmucTitle" style="top:152px" onclick="attr(6)"><b>Limited Edition</b></h6>
                </div>
                <div style="width:32.7%; float:left; height:270px; margin-left:10px; margin-top:50px; background:#555; position:relative">
                <img src="photo/logo3.jpg" class="danhmucSrc"/>
                <h4 class="danhmucTitle"><b>THƯƠNG HIỆU</b></h4>
                <h6 class="danhmucTitle" style="top:93px" onclick="attr(7)"><b>ADIDAS</b></h6>
                <h6 class="danhmucTitle" style="top:122px" onclick="attr(8)"><b>NIKE</b></h6>
                <h6 class="danhmucTitle" style="top:152px" onclick="attr(9)"><b>PUMA</b></h6>
                <h6 class="danhmucTitle" style="top:180px" onclick="attr(10)"><b>NEW BALANCE</b></h6>
                </div>
            </div>
          
        <?php
			$sql="SELECT product.id,product.name,product.price,product.image FROM product,detail_product WHERE del!='del' AND product.id=detail_product.id_product AND detail_product.id_properties=2 AND detail_product.id_detail_properties=4";
			$product=pdo_query($sql);
		?>
        <div style="width:100%; height:530px; margin-top: -90px">
            <h3 style="width:400px; font-feature-settings: 'kern'; text-align:center; margin:auto"><b>BEST SELLER</b></h3>
   			<div id="carouselExampleDark1" class="carousel carousel-dark slide" data-bs-ride="carousel" style="margin-top:50px">
      	<div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
        	<?php
			for($i=0;$i<4;$i++)
			{
				extract($product[$i]);
				$sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  		$stt=pdo_query_one($sql);
				echo '<div style="margin-left:20px" class="bestSellerItem">
			  <a href="mensport.com?product-detail='.$id.'"><div style="width:100%; height:260px; background:#E8E8E8">
              <img src="photo/'.$image.'" style="width:100%; height:100%" />
			  </div></a>
              <a href="mensport.com?product-detail='.$id.'"><h6 class="bestSellerItemName"><b>'.$name.'</b></h6></a>
			  <p class="status" style="margin-top:-40px">'.$stt["name"].'</p>
              <h6 class="bestSellerItemInfor"><b>'.number_format($price).' VND</b></h6>
              </div>';
			}
			?>
             </div> 
        <div class="carousel-item" data-bs-interval="2000">
          <?php
			for($i=4;$i<8;$i++)
			{
				extract($product[$i]);
				$sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  		$stt=pdo_query_one($sql);
				echo '<div style="margin-left:20px" class="bestSellerItem">
			  <a href="mensport.com?product-detail='.$id.'"><div style="width:100%; height:260px; background:#E8E8E8">
              <img src="photo/'.$image.'" style="width:100%; height:100%" />
			  </div></a>
              <a href="mensport.com?product-detail='.$id.'"><h6 class="bestSellerItemName"><b>'.$name.'</b></h6></a>
			  <p class="status" style="margin-top:-40px">'.$stt["name"].'</p>
              <h6 class="bestSellerItemInfor"><b>'.number_format($price).' VND</b></h6>
              </div>';
			}
			?>
            </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark1"  data-bs-slide="prev" style="margin-left:-115px; margin-top:-140px">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark1"  data-bs-slide="next" style="margin-right:-115px; margin-top:-140px">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
    <img src="photo/bg2.jpg" style="width:100%; height:600px; margin-top:20px"  />
    <div style="width:100%; height:720px; margin-top:80px">
    	<h3 style="width:400px; font-feature-settings: 'kern'; text-align:center; margin:auto"><b>TIN TỨC & BÀI VIẾT</b></h3>
        <div style="width:100%; height:300px; margin-top:40px">
        	<div style="float:left; width:50%; height:100%">
            	<div style="float:left; width:47%; height:300px">
                	<img src="photo/adv9.jpg" width="275" height="300" style=" border: 1px solid rgba(0,0,0,0.15);"/>
                </div>
                <div style="width:47%; height:300px; float:right">
                	<h4 class="tintuc"><b>Adidas 'Inflight Pack' chính thức ra mắt</b></h4>
                    <p style="font-family:Tahoma">Cách đây ít ngày thì thông tin về việc Adidas ra mắt bộ sưu tập giày bóng đá mới đã được tiết lộ trong bài viết này. Tuy nhiên ngay sau khi Adidas chính thức tung lên kệ các mẫu giày mới của mình thì các hình ảnh đẹp mắt về bộ sưu tập này đã xuất hiện. Bộ sưu tập Adidas ‘Inflight Pack’ ra mắt với 4 dòng giày là... <!--Adidas X, Predator, Nemeziz và Copa. Trong đó Adidas X có sự xuất hiện của phiên bản mới nhất vừa được ra mắt là X20+ Ghosted. Predator cũng là phiên bản mới ra mắt đầu năm nay là Predator 20+. Trong khi đó Nemeziz và Copa vẫn là phiên bản cũ và nhiều khả năng sẽ được nâng cấp vào năm 2021.--></p>
                </div>
            </div>
            <div style="float:right; width:50%; height:100%">
            	<div style="float:left; width:47%; height:300px">
                	<img src="photo/adv10.jpg" width="275" height="300" style=" border: 1px solid rgba(0,0,0,0.15);"/>
                </div>
                <div style="width:47%; height:300px; float:right">
                	<h4 class="tintuc"><b>Cách đo Size Giày đá bóng chuẩn</b></h4>
                    <p style="font-family:Tahoma">Để sở hữu một đôi giày đá bóng vừa chân, mang lại sự êm ái khi di chuyển, bắt buộc bạn phải nắm được cách đo size giày đá bóng đúng chuẩn nhất.. Điều này có ý nghĩa quan trọng khi bạn mua giày đá bóng online, tránh được tình trạng mua giày quá rộng hoặc quá chật. Để đo được size giày đá bóng chuẩn nhất, bạn... <!--hãy áp dụng theo các bước sau đây:--></p>
                </div>
            </div>
        </div>
        <div style="width:100%; height:300px; margin-top:40px">
        	<div style="float:left; width:50%; height:100%;">
            	<div style="float:left; width:47%; height:300px">
                	<img src="photo/adv11.jpg" width="275" height="300" style=" border: 1px solid rgba(0,0,0,0.15);"/>
                </div>
                <div style="width:47%; height:300px; float:right">
                	<h4 class="tintuc"><b>Giày đá bóng của Toni Kroos có gì đặc biệt</b></h4>
                    <p style="font-family:Tahoma">Từ khi bắt đầu sự nghiệp Toni Kroos cũng đã sử dụng rất nhiều dòng giày bóng đá sân cỏ tự nhiên khác nhau. Tuy nhiên có một dòng giày được anh chàng này đặc biệt yêu quý và tuyên bố rằng sẽ sử dụng nó trong suốt sự nghiệp thi đấu của mình. Đôi giày đá bóng của Toni Kroos có tên là Adidas Adipure 11 Pro (màu trắng xanh)...</p>
                </div>
            </div>
            <div style="float:right; width:50%; height:100%">
            	<div style="float:left; width:47%; height:300px">
                	<img src="photo/adv12.jpg" width="275" height="300" style=" border: 1px solid rgba(0,0,0,0.15);"/>
                </div>
                <div style="width:47%; height:300px; float:right">
                	<h4 class="tintuc"><b>10 điều cần làm khi mới mua giày đá bóng!!</b></h4>
                    <p style="font-family:Tahoma">Mỗi khi mua một đôi giày bóng đá mới, công đoạn break-in (hiểu nôm na là làm cho da giày dãn và mềm hơn) luôn là công đoạn quan trọng nhất để giúp giày đá bóng dễ đá hơn cũng như tránh được những chấn thương cho bàn chân. Dưới đây là một số mẹo giúp cho việc break-in trở nên dễ dàng hơn....</p>
                </div>
            </div>
        </div>
    </div>   
<script>
function attr(id){
	if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
		localStorage.clear();
	}
	window.location.assign("mensport.com?IDcategory=giay&&IDattribute="+id);
}
</script>
