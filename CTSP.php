<script src="jquery.js"></script>
<script>
document.getElementById("slide").style.display='none';
function addMyCart(){
var sl=document.getElementById("soluong").value;
var size=document.getElementById("size").value;
	var id=<?php echo $_GET['product-detail']; ?>;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CartIcon").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "addMyCart.php?ID=" + id + "&&qty=" + sl + "&&size=" + size , true);
    xmlhttp.send();
	setTimeout(totalCartMini,200);
}
function addMyCartMini(){
var sl=document.getElementById("soluong").value;
var size=document.getElementById("size").value;
	var id=<?php echo $_GET['product-detail']; ?>;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CartMini").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "addMyCartMini.php?ID=" + id + "&&qty=" + sl + "&&size=" + size , true);
    xmlhttp.send();
}
function totalCartMini(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tt3").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "totalCartMini.php" , true);
    xmlhttp.send();
}
function sendComment(a){
var check="<?php if(isset($_SESSION['userlogin'])) echo 'co';
else echo 'ko'; ?>";
if(check=="ko") window.location.assign("mensport.com?dangnhap");
else {
	var c=document.getElementById("txtcomment").value;
	var t=a.split('-');
	var id=t[1];
	if(c!="") {
		c=c.replace(/"/g, '');
		c=c.replace(/'/g, '');
		addComment(c);
		document.getElementById("txtcomment").value="";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			document.getElementById("test").innerHTML = this.responseText;
		  }
		};
		xmlhttp.open("GET", "comment.php?c=" + c + "&&id=" + id , true);
		xmlhttp.send();
	}
}
}
var newcm=1;
function addComment(c){
var name = "<?php if(isset($_SESSION['userlogin'])) {$user=$_SESSION['userlogin']; echo $user[2];} else echo ""; ?>";
var date = "<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('d/m/Y - H:i:s'); ?>";
var s='';
s+='<div class="comment" style="height:115px" id="newcm'+newcm+'">';
s+='<div style="width:100px; height:100px; margin-left:20px; margin-top:6px; float:left"><img src="photo/programmer.png" style="width:100px; height:100px"  /></div>';
s+='<div style="width:460px; float:left; margin-left:20px">';
s+='<div style="font-size:20px"><b>'+name+'</b></div>';
s+='<div style="margin-top:5px; font-size:17px; color:#808080"><i>'+date+'</i></div>';
s+='<div style="margin-top:5px; width:100%;word-wrap:break-word" class="text'+newcm+'"><i>'+c+'</i></div>';
s+='<script>';
s+='$(function() {';
s+='var val = $(".text'+newcm+'").css("height");';
s+='if(val!="24px") {';
s+='var t=val.slice(0,val.length-2);';
s+='var h=parseInt(t);';
s+='h+=70;';
s+='$("#newcm'+newcm+'").css("height",h+"px");';
s+='}';
s+='});';
s+='<\/script>';
s+='</div>';
s+='</div>';
$("#content-comment").prepend(s);
newcm++;
}
</script>
<?php
if(isset($_GET['product-detail'])) {
$id=$_GET['product-detail'];
$sql="select * from product where id='".$id."'";
$sp=pdo_query_one($sql);
extract($sp);	
}
?>
<div style="width:100%; height:1200px; margin-top:35px; position:relative" class="ctn">
<ul style="list-style-type:none; height:30px">
    <li class="infor" style="margin-left:-32px"><?php $sql="SELECT product_type.name from product_type,category WHERE category.idProductType=product_type.id AND category.id='".$id_category."'";
	$type=pdo_query_one($sql);
	echo $type["name"]; ?></li>    
    <li class="infor" style="height:15px; border-right: solid 3px #ccc"></li>
    <li class="infor"><b><?php echo $name; ?></b></li>
</ul>
<div style="border-bottom:solid 3px; margin-top:-13px"></div>
<div style="width:100%; height:2300px; margin-top:30px">
	<div style="float:left; width:54%; height:100%">
    	<div style="width:100%; height:640px; background:#E8E8E8">
        	<img src="photo/<?php echo $image; ?>" style="width:100%; height:100%"  />
        </div>
        <div class="title-comment"><b>BÌNH LUẬN</b></div>
        <div style="width:100%; height:100px;margin-top:50px;">
        	<textarea class="form-control" rows="3" placeholder="Viết bình luận..." id="txtcomment" style="width:78%; float:left"></textarea>
            <button class="btn btn-primary" style="margin-left:40px; width:100px" id="sp-<?php echo $id; ?>" onclick="sendComment(this.id)"><b>Gửi</b></button>
         </div>
        <div id="content-comment"> 
      <?php /*?> <?php 
			$sql="select * from comment where id_product=".$id;
			$comment=pdo_query($sql);
			$cm = array_reverse($comment);
			$i=1;
			foreach($cm as $c) {
			extract($c);
			$d=strlen($content);
        	echo '<div class="comment" style="height:115px" id="cm'.$i.'">
                    <div style="width:100px; height:100px; margin-left:20px; margin-top:6px; float:left">
						<img src="photo/programmer.png" style="width:100px; height:100px"  />
					</div>
                    <div style="width:460px; float:left; margin-left:20px">
                        <div style="font-size:20px"><b>'.$name.'</b></div>
                        <div style="margin-top:5px; font-size:17px; color:#808080"><i>'.$date.'</i></div>
                        <div style="margin-top:5px; width:100%;word-wrap:break-word" class="text'.$i.'"><i>'.$content.'</i></div>
						<script>
							$(function() {
							  var val = $(".text'.$i.'").css("height");
							  if(val!="24px") {
								  var t=val.slice(0,val.length-2);
								  var h=parseInt(t);
								  h+=70;
								  $("#cm'.$i.'").css("height",h+"px");
								  }
							});
						</script>
								</div>
						</div>';
			$i++;
			}
         ?>  <?php */?>
         	
        </div>
    </div>
    <div style="float:right; width:46%; height:100%">
    	<h4 style="font-size:28px; text-transform: uppercase;font-feature-settings: 'kern'; margin-left:60px; margin-top:5px"><b><?php echo $sp["name"]; ?></b></h4>
        <div style="width:490px; height:30px; margin-top:30px; margin-left:60px;">
            <div style="float:left;font-feature-settings: 'kern'">Mã sản phẩm:&nbsp;<b><?php echo $id; ?></b></div>
            <div style="float:right;font-feature-settings: 'kern'">Tình trạng:&nbsp;<b><?php $sql="SELECT detail_product.id_detail_properties,detail_properties.name FROM detail_product,detail_properties WHERE id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
			$tt=pdo_query_one($sql);
			if($tt!='') echo $tt["name"];
			else echo 'none'; ?></b></div>
        </div>
        <div style="color:#f15e2c;font-feature-settings: 'kern';font-size:23px; margin-left:60px; margin-top:30px">
			<?php
			if($tt!='') {
				if($tt["id_detail_properties"]==18) echo '<b>'.number_format($price).' VND&nbsp;&nbsp;&nbsp;&nbsp<del style="color:#808080; font-size:18px">'.number_format($price_sale).' VND</del></b>';
				else echo '<b>'.number_format($price).' VND</b>';
			}else echo '<b>'.number_format($price).' VND</b>';
            ?>
        </div>
        <div style="width:490px; border-top:dashed 2px; opacity:0.5; margin-top:28px; margin-left:60px"></div>
        <div style="margin-left:60px; width:490px; margin-top:30px;font-feature-settings: 'kern'">Phiên bản Nike Lunar Gato 2 được đánh giá là một trong những huyền thoại bất bại của dòng giày bóng đá sân Futsal. Vào ngày 7.04.2020 Nike đã ra mắt người hâm mộ mẫu React Gato như một bản nâng cấp của phiên bản Lunar Gato 2 trước đó. Thiết kế đặc trưng cho mẫu giày mới này nhằm gia tăng khả năng kiểm soát bóng của cầu thủ. Một cái tên hứa hẹn mang lại nhiều bứt phá và có thể trở thành đôi giày bóng đá đáng mơ ước trong năm 2020 này!
</div>
		<div style="width:490px; border-top:dashed 2px; opacity:0.5; margin-top:34px; margin-left:60px"></div>
        
        <div style="width:492px; height:80px; margin-top:30px; margin-left:60px">
        	<div style="float:left; width:50%; height:100%">
            	<h5 style="font-feature-settings: 'kern';font-size:23px"><b>SIZE</b></h5>
                <div class="dropdown">
                  <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btnSize"><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i></button>
                  <input type="hidden" id="size"  />
                  
                      	<?php
						$sql="select amount from warehouse where id_product='".$id."'";
						$sl=pdo_query($sql);
						$slsp=array();
						foreach($sl as $c) {
							extract($c);
							array_push($slsp,$amount);
						}
						$count1=0;
						if($id_category=='giay') {
							echo'<div style="width:223px; height:165px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      			<table>';
							echo '<tr>';
							$count=0;
							for($i=35;$i<=46;$i++)
							{
								$count++;
								if($slsp[$count1]==0) { echo '<td id="size-'.$i.'" style="opacity:0.2">'.$i.'</td>';}
								else { echo '<td id="size-'.$i.'" onclick="selectSize(this.id,'.$id.')">'.$i.'</td>';}
								if($i==46) { echo '</tr>';
									break;}
								if($count==4) { echo '</tr><tr>';
									$count=0;}
								$count1++;
							}
							echo ' </table> </div>';
						}else { echo '<div style="width:223px; height:65px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      			<table style="height:55px">';
						echo '<tr><td id="freeSize" onclick="selectSize(this.id,'.$id.')">freeSize</td></tr></table> </div>';
						}
						?>
                       
			     </div>
            </div>
            <div style="float:right; width:50%;height:100%; position:relative">
            	<h5 style="font-feature-settings: 'kern'; font-size:23px"><b>SỐ LƯỢNG</b></h5>
                <div id="btnSLnone"><i class="fas fa-chevron-down" style="float:right; margin-right:12px; margin-top:10px"></i></div>
                <div class="dropdown" >
                  <button  type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" class="btnSize"><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i></button>
                  <input type="hidden" id="soluong"  />
                  <div style="width:223px; height:165px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <table id="HienThiSL">
                      	
                       </table>
                   </div>
			     </div>
            </div>
        </div>
        
        <div style="margin-left:60px; width:492px; height:73px; margin-top:15px">
        	<div id="bntthemnone"></div>
        	<div style="width:375px; height:100%; background:#000000; float:left; cursor:pointer" class="btnthem">
           		<img src="photo/<?php echo $image; ?>" style="width:50px; height:50px; display:none"  />
            	<h5 style="font-size:22px;font-feature-settings: 'kern'; color:#FFF; line-height:73px; text-align:center"><b>THÊM VÀO GIỎ HÀNG</b></h5>
            </div>
            <script>
			$(document).on('click','.btnthem',function(e){
				e.preventDefault();
				$('body').addClass('stop-scrolling');
				if($(this).hasClass('disable')){
					return false;
				}
				$(this).addClass('disable');
				var self=$(this);
				var src=$(this).find('img').attr('src');
				var cart=$(document).find('#accordionFlushExample');
				
				$('<img />',{
					class:'img-fly',
					src: src
				}).appendTo('.ctn');
				setTimeout(function() {
					$(document).find('.img-fly').css({
						'top': cart.offset().top-225,
						'left': cart.offset().left-215,
					});
					setTimeout(function(){
						addMyCart();
						addMyCartMini();
						$(document).find('.img-fly').remove();
						self.removeClass('disable');
						$('body').removeClass('stop-scrolling');
					},800);
				},300);
			});
			
			</script>
            <div style="float:right; width:100px; height:100%; text-align:center; background:#000000; margin-right:5px; color:#f15e2c"><i class="far fa-heart fa-2x" style="margin-top:20px"></i></div>
        </div>
        <a href="mensport.com?giohang"><h5 style="margin-left:60px; width:486px; height:73px; margin-top:25px; background:#f15e2c; font-size:22px;font-feature-settings: 'kern'; color:#FFF; text-align:center; line-height:73px"><b>THANH TOÁN</b></h5></a>
        
       <div id="accordionExample" style="margin-left:60px; margin-top:40px;">
       <?php 
	   if($id_category=='giay') {
		$material='none';
		$design='none';
	   $sql="SELECT detail_properties.name FROM detail_properties,detail_product WHERE detail_product.id_product=".$id." AND detail_product.id_properties=4 AND detail_properties.id=detail_product.id_detail_properties";
	   $m=pdo_query_one($sql);
	   if($m != ''){
		$material=$m["name"];
	   }
	   $sql="SELECT detail_properties.name FROM detail_properties,detail_product WHERE detail_product.id_product=".$id." AND detail_product.id_properties=1 AND detail_properties.id=detail_product.id_detail_properties";
	   $d=pdo_query_one($sql);
	   if($d != ''){
		   $design=$d["name"];
	   }
	   echo '<div class="accordion-item">
              <div  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="width:276px; height:33px; cursor:pointer">
              <h6 style="font-size:22px; color:#f15e2c"><b>THÔNG TIN SẢM PHẨM</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              	<div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                  <div style="font-size:16px; margin-top:20px">Size run: 35 – 46</div>
                  <div style="font-size:16px">Chất Liệu: '.$material;
				  echo '</div>
                  <div style="font-size:16px">Kiểu Dáng: '.$design;
				  echo '</div>
                  <div style="font-size:16px; margin-top:10px">Sản phẩm được Double Box khi giao hàng.Khuyến nghị chọn truesize hoặc +1 size (tùy form chân) so với giày bình thường.</div>
                  <h3 style="font-size:20px; margin-top:30px; margin-left:10px"><b>SIZE CHART</b></h3>
                  <img src="photo/size.jpg" style="width:450px; height:400px; margin-top:-10px"  /> 
              </div>
              <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
          </div>';}
	   ?>
          
  		 <div class="accordion-item">
              <div data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="width:308px; height:33px; cursor:pointer; margin-top:40px">
                <h6 style="font-size:22px; color:#f15e2c;font-feature-settings: 'kern'"><b>QUY ĐỊNH ĐỔI SẢN PHẨM</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                <div style="font-size:16px;font-feature-settings: 'kern'; margin-top:20px; margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Chỉ đổi hàng 1 lần duy nhất, mong bạn cân nhắc kĩ trước khi quyết định.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua. Đổi sản phẩm khi mua online là 14 ngày, kể từ ngày nhận hàng.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Sản phẩm đổi phải kèm hóa đơn. Bắt buộc phải còn nguyên tem, hộp, nhãn mác.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Sản phẩm đổi không có dấu hiệu đã qua sử dụng, không giặt tẩy, bám bẩn, biến dạng.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Men'Sport chỉ ưu tiên hỗ trợ đổi size. Trong trường hợp sản phẩm hết size cần đổi, bạn có thể đổi sang 01 sản phẩm khác:</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:82px">- Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:82px">- Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Trong trường hợp sản phẩm - size bạn muốn đổi không còn hàng trong hệ thống. Vui lòng chọn sản phẩm khác.</div>
                <div style="font-size:16px;font-feature-settings: 'kern';margin-left:50px"><i class="fas fa-shoe-prints"></i>&nbsp;&nbsp;&nbsp;Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</div>
            </div>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
  		</div>
 		 <div class="accordion-item">
              <div data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="width:276px; margin-top:40px; height:33px; cursor:pointer">
                <h6 style="font-size:22px; color:#f15e2c;font-feature-settings: 'kern'"><b>BẢO HÀNH THẾ NÀO?</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h6>
              </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample"> 
                <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
                <div style="font-size:16px;font-feature-settings: 'kern'; margin-top:20px">Mỗi đôi giày Men'Sport trước khi xuất xưởng đều trải qua nhiều khâu kiểm tra. Tuy vậy, trong quá trình sử dụng, nếu nhận thấy các lỗi: gãy đế, hở đế, đứt chỉ may,...trong thời gian 6 tháng từ ngày mua hàng, mong bạn sớm gửi sản phẩm về Ananas nhằm giúp chúng tôi có cơ hội phục vụ bạn tốt hơn. Vui lòng gửi sản phẩm về bất kỳ cửa hàng Men'Sport nào, hoặc gửi đến trung tâm bảo hành Ananas ngay trong trung tâm TP.HCM trong giờ hành chính:</div>
                <div style="font-size:16px;font-feature-settings: 'kern'; margin-top:20px">Lầu 1, 75/1 Mai Thị Lựu, P. Đa Kao, Q1, TP.HCM</div>
                 <div style="font-size:16px;font-feature-settings: 'kern';">Hotline: 028 3526 7774</div>
            </div>
            <div style="width:100%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:40px"></div>
 		 </div>
	  </div>
 </div>
</div>
 <div style="width:100%; height:530px; position:absolute; top:1900px">
 	 <?php
	 		$sql="SELECT detail_product.id_detail_properties FROM detail_product,product WHERE product.id=".$id." AND product.id=detail_product.id_product AND detail_product.id_properties=2";
			$p=pdo_query_one($sql);
			if($p!='') $sql="SELECT product.id,product.name,product.price,product.image FROM product,detail_product WHERE del!='del' AND product.id=detail_product.id_product AND detail_product.id_properties=2 AND detail_product.id_detail_properties=".$p['id_detail_properties'];
			else $sql="SELECT product.id,product.name,product.price,product.image FROM product,detail_product WHERE del!='del' AND product.id=detail_product.id_product AND detail_product.id_properties=2 AND detail_product.id_detail_properties=0";
			$product=pdo_query($sql);
		?>
            <h3 style="width:400px; font-feature-settings: 'kern'; text-align:center; margin:auto"><b>SẢN PHẨM LIÊN QUAN</b></h3>
   			<div id="carouselExampleDark1" class="carousel carousel-dark slide" data-bs-ride="carousel" style="margin-top:50px">
      	<div class="carousel-inner">
        	<?php
			if(count($product)>0) {
		echo '<div class="carousel-item active" data-bs-interval="10000">';
				for($i=0;$i<count($product);$i++)
				{
					extract($product[$i]);
					$sta='';
					$sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
		  			$stt=pdo_query_one($sql);
					if($stt != ''){
						$sta=$stt["name"];
					}
					echo '<div style="margin-left:20px" class="bestSellerItem">
				  <a href="mensport.com?product-detail='.$id.'"><div style="width:100%; height:260px; background:#E8E8E8">
				  <img src="photo/'.$image.'" style="width:100%; height:100%" />
				  </div></a>
				  <a href="mensport.com?product-detail='.$id.'"><h6 class="bestSellerItemName"><b>'.$name.'</b></h6></a>
				   <p class="status" style="margin-top:-40px">'.$sta.'</p>
				  <h6 class="bestSellerItemInfor"><b>'.number_format($price).' VND</b></h6>
				  </div>';
				  if($i==3) break;
				}
		echo '</div> ';
			}
			?>
          <?php
		  	if(count($product)>4) {
		echo '<div class="carousel-item" data-bs-interval="2000">';
				for($i=4;$i<count($product);$i++)
				{
					extract($product[$i]);
					$sta='';
					$sql="SELECT detail_properties.name FROM detail_product,detail_properties WHERE detail_product.id_product=".$id." AND detail_product.id_properties=2 AND detail_product.id_detail_properties=detail_properties.id";
					$stt=pdo_query_one($sql);
					if($stt != ''){
						$sta=$stt["name"];
					}
					echo '<div style="margin-left:20px" class="bestSellerItem">
				  <a href="mensport.com?product-detail='.$id.'"><div style="width:100%; height:260px; background:#E8E8E8">
				  <img src="photo/'.$image.'" style="width:100%; height:100%" />
				  </div></a>
				  <a href="mensport.com?product-detail='.$id.'"><h6 class="bestSellerItemName"><b>'.$name.'</b></h6></a>
				  <p class="status" style="margin-top:-40px">'.$sta.'</p>
				  <h6 class="bestSellerItemInfor"><b>'.number_format($price).' VND</b></h6>
				  </div>';
				  if($i==7) break;
				}
		echo '</div>';
			}
			?>
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
</div>
<div id="test"></div>
<script>
var start = <?php $sql="SELECT COUNT(*) FROM comment where id_product=".$_GET['product-detail'];
		$o=pdo_query_one($sql);
		echo $o["COUNT(*)"] - 5; ?>;
var limit = 5;
var id=<?php echo $_GET['product-detail'] ?>;
var reachedMax = false;
$(document).ready(function () {
	getData();
});

function see_comment(){
	$("#see_comment").remove();
	getData();
}

function getData() {
	if (reachedMax)
		return;
	$.ajax({
		url: 'data2.php',
		type: 'POST',
		cache: false,
		data: {
			getData: 1,
			id: id,
			start: start,
			limit: limit
		},
		success: function(response) {
			if (response == "reachedMax")
				reachedMax = true;
			else {
				start -= limit;
				if(start==-1){
					start=0;
					limit=4;
				}
				if(start==-2){
					start=0;
					limit=3;
				}
				if(start==-3){
					start=0;
					limit=2;
				}
				if(start==-4){
					start=0;
					limit=1;
				}
				$("#content-comment").append(response);
			}
		}
	});
}
</script>
