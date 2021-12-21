<script>
function selectSizeImport(a){
var t=a.split('-');
var id=t[1];
var size=t[2];
document.getElementById(id+"-dropdownMenuButton3").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+size+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:2px"></i>';
for(var i=35;i<=46;i++)
{
	document.getElementById("sizeImport-"+id+"-"+i).style.background='';	
}
document.getElementById("sizeImport-"+id+"-"+size).style.background='#E8E8E8';
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixMyImport.php?id=" + id + "&&size=" + size, true);
    xmlhttp.send();
}
function selectSoLuongImport(a){
var t=a.split('-');
var id=t[1];
var sl=t[2];
document.getElementById(id+"-dropdownMenuButton4").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+sl+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:2px"></i>';
for(var i=1;i<=12;i++)
{
	document.getElementById("slImport-"+id+"-"+i).style.background='';	
}
document.getElementById("slImport-"+id+"-"+sl).style.background='#E8E8E8';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fixMyImport.php?id=" + id + "&&sl=" + sl, true);
    xmlhttp.send();
}
function delImport(a){
var b=a;
var t=a.split('-');
var id=t[1];
var url="xuliDelImport.php?id=" + id;
location.replace(url);
}
function delAllImport(){
location.replace("xuliDelAllImport.php");
}
function checkImport(){
	var check = <?php
	if(isset($_SESSION['myimport'])) {
		echo count($_SESSION['myimport']);
	} else echo 0;
	?>;
	if(check==0) return false;
	return true;
}
function btnImport(){
var check=checkImport();
if(check==true) {
var note= document.getElementById("exampleFormControlTextarea1").value;
note=note.replace(/"/g, '');
note=note.replace(/'/g, '');
var supp= document.getElementById("supp").value;
var url="ImportSubmit.php?note=" + note + "&&supp=" + supp;
location.replace(url);
}
}
</script>
<script>
document.getElementById("qlnk").style.background="#E8E8E8";
</script>
<?php
if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Nhập Hàng Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		}
?>
<div style="width:100%; height:1200px">
<h1 style="font-feature-settings: 'kern'; padding-top:30px; height:80px; margin-left:30px; width:50%; margin:auto; text-align:center"><b>CHI TIẾT NHẬP HÀNG</b></h1>
<div style="width:55%; float:left; margin-left:50px; height:830px; margin-top:50px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; padding-left:20px"><b>SẢN PHẨM NHẬP</b></h4>
    <div style="overflow-y:scroll; margin-top:30px; height:750px; width:100%; border: 1px solid rgba(0,0,0,0.15);">
    
    
    <?php
		if(isset($_SESSION['myimport'])) {
		$j=1;
		foreach($_SESSION['myimport'] as $sp) {
    	echo '<div class="itemCart" >
				<div style="float:left; width:150px; height:150px; background:#FFF; margin-top:18px; cursor:pointer" >
					<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
				</div>
      		    <div style="float:left; width:322px; height:150px; margin-top:18px; margin-left:18px">
				<h5 class="itemCartName"><b>'.$sp[0].'</b></h5>
				<div style="width:100%; height:68px;margin-top:60px">
            		<div style="width:50%; float:left; height:100%">
                		<div style="font-size:16px"><b>Size</b></div> 
                   			<div class="dropdown">
                              <button  type="button" id="'.$j.'-dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false" class="btnSizeCart"><h6 style="position:absolute; left:10px; top:5px"><b>'.$sp[3].'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:2px"></i></button>';
							$sql="SELECT product_type.size FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$sp[7];
							$sizee=pdo_query_one($sql); 
                          if($sizee["size"]=='number') {
						  echo '<div style="width:223px; height:165px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <table>
                                <tr>';
                                $count=0;
                                for($i=35;$i<=46;$i++)
                                {
                                    $count++;
									if($i==$sp[3]){ echo '<td id="sizeImport-'.$j.'-'.$i.'" onclick="selectSizeImport(this.id)" style="background:#E8E8E8">'.$i.'</td>'; }
                                    else {echo '<td id="sizeImport-'.$j.'-'.$i.'" onclick="selectSizeImport(this.id)">'.$i.'</td>';}
                                    if($i==46) { echo '</tr>';
                                        break;}
                                    if($count==4) { echo '</tr><tr>';
                                        $count=0;}
                                }
                                echo '</table></div>'; }
							else {
							echo '<div style="width:223px; height:65px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      			<table style="height:55px">';
							echo '<tr><td style="background:#E8E8E8">freesize</td></tr></table> </div>';
							}
			     						
						echo '</div>	
                	</div>
                	<div style="width:50%; float:left; height:100%">
                    	<div style="font-size:16px"><b>Số lượng</b></div>
                   			<div class="dropdown">
                 			   <button  type="button" id="'.$j.'-dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false" class="btnSizeCart"><h6 style="position:absolute; left:10px; top:5px"><b>'.$sp[4].'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:2px"></i></button>
                  			<div style="width:223px; height:165px;border:#a5a5a5 1px solid" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      		<table>
								<tr>';
								$count=0;
								for($i=1;$i<=12;$i++)
								{
									$count++;
									if($i==$sp[4]) {echo '<td style="width:52px; height:51.2px;background:#E8E8E8" id="slImport-'.$j.'-'.$i.'"onclick="selectSoLuongImport(this.id)">'.$i.'</td>';}
									else {echo '<td style="width:52px; height:51.2px" id="slImport-'.$j.'-'.$i.'"onclick="selectSoLuongImport(this.id)">'.$i.'</td>';}
									if($i==46) { echo '</tr>';
										break;}
									if($count==4) { echo '</tr><tr>';
										$count=0;}
								}
							   echo ' </table>
                   			</div>
						</div>
					</div>
                 </div>
                </div>
                 <div style="float:right; width:140px; height:150px; margin-top:18px">
                    <div style="border: #a3a3a3 1px solid; width:135px; height:40px; margin-top:113px; background:#000000;color:#ffff; font-size:21px; text-align:center;cursor:pointer" id="del-'.$j.'" onclick="delImport(this.id)"><i class="far fa-trash-alt" style="margin-top:8px"></i></div>
					
            </div> 
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:200px"></div>
			</div>';
			$j++;
			}}
     ?>
   
    </div>
</div>
	<?php
	$admin=$_SESSION['adminlogin'];
	$name=$admin[2];
	$date=date("d/m/Y");
	?>

<div style="width:32%; margin-right:50px; float:right; height:630px; margin-top:50px; background:#FFF">
	<h4 style=" font-size:22px; width:100%; height:50px; line-height:50px; text-align:center"><b>ĐƠN NHẬP HÀNG</b></h4>
	<div style="width:100%; border-top:solid 3px; margin-top:-8px"></div>
    <h6 style="margin-left:30px; margin-top:30px">Tên Nhân Viên<i class="fas fa-tag" style="margin-left:60px"></i></h6>
    <div class="input-group input-group-sm mb-3" style="margin-left:30px; width:75%;">
  	<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly="readonly" value="<?php echo $name ?>">
	</div>
    <h6 style="margin-left:30px; margin-top:10px">Ngày Nhập Hàng<i class="fas fa-calendar-day" style="margin-left:40px"></i></h6>
    <div class="input-group input-group-sm mb-3" style="margin-left:30px; width:75%;">
  	<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly="readonly" value="<?php echo $date ?>">
	</div>
    <h6 style="margin-left:30px; margin-top:10px">Nhà Cung Cấp<i class="fas fa-warehouse" style="margin-left:55px"></i></h6>
	<select class="form-select form-select-sm" aria-label=".form-select-sm example" style="margin-left:30px; width:75%" id="supp">
    	<?php
			$sql="select name from supplier ";
			$supp=pdo_query($sql);
			foreach($supp as $s){
			extract($s);
			echo '<option>'.$name.'</option>';
			}
		?>
    </select>
    <h6 style="margin-left:30px; margin-top:15px">Ghi Chú<i class="far fa-sticky-note" style="margin-left:30px"></i></h6>
    <div class="mb-3" style="margin-left:30px; width:75%;">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button class="btn btn-outline-success" style="height:60px; width:50%; font-size:22px; border:solid 3px; margin-top:30px; margin-left:90px" onClick="btnImport();">NHẬP HÀNG</button>
</div>
<div style="width:90%; height:40px; margin-top:950px; clear:both; margin-left:50px">
    <div style="float:left" class="btnCart" onClick="delAllImport()"><b>XÓA HẾT</b></div>
    <a href="server.php?category=import"><div style="float:right" class="btnCart"><b>QUAY LẠI KHO HÀNG</b></div></a>
</div>
<div id="temp"></div>
</div>