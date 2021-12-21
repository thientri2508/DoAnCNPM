<script>
document.getElementById("qluser").style.background="#E8E8E8";
function CT_acc(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CT_acc").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "CT_acc.php?id=" + id , true);
    xmlhttp.send();
}
function close_acc(id,stt){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "close_acc.php?id=" + id + "&&stt=" + stt, true);
    xmlhttp.send();
	setTimeout(loadpage,200);
}
function loadpage(){
location.reload();
}
function xoaAcc(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this account?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delAcc('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel1()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function cancel1(){
document.getElementById('delSP').style.display='none';
}
function delAcc(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "del_acc.php?id=" + id , true);
    xmlhttp.send();
	setTimeout(loadpage,200);
}
function upAcc(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("test").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "upRole.php?id=" + id , true);
    xmlhttp.send();
	setTimeout(loadpage,200);
}
function upRole(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to up role this account?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="upAcc('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel1()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function searchAccadmin(role){
	var s=document.getElementById("searchAD").value;
	var r=role;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("DS_user").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "searchAccadmin.php?s=" +searchSP + "&&role=" + r , true);
    xmlhttp.send();
	}
}
function slaccSearch(role){
	var s=document.getElementById("searchAD").value;
	var r=role;
	if(s!="") {
	var searchSP= s.trim();
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("KQsearchImport").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "slaccSearch.php?s=" +searchSP + "&&role=" + r , true);
    xmlhttp.send();
	}
}
</script>
<?php
	if(isset($_SESSION['thongbaoad'])) {
		if($_SESSION['thongbaoad']==1) {
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Khóa Tài Khoản Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
			}
		else if($_SESSION['thongbaoad']==2){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Mở Tài Khoản Thành Công</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==3){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Xóa Tài Khoản Thành Công!</b>";
			document.getElementById("thongbaoad").style.display="block";
			document.getElementById("thongbaoad").style.color="green";
			function closeTB(){
			document.getElementById("thongbaoad").style.display="none";
			}
			setTimeout(closeTB,3000);
			</script>';
			unset($_SESSION['thongbaoad']);
		}
		else if($_SESSION['thongbaoad']==4){
		echo '<script>document.getElementById("thongbaoad").innerHTML="<b>Cấp Quyền Tài Khoản Thành Công!</b>";
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
<div style="width:100%; height:1300px">
<h1 class="titleFont1">TÀI KHOẢN NGƯỜI DÙNG</h1>
<div style="float:left; margin-top:60px; margin-left:75px; width:40%">
    <div class="d-flex" style="margin-left:10px">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchAD">
      <button class="btn btn-outline-success" type="submit" style="width:120px;" id="user" onClick="slaccSearch(this.id);searchAccadmin(this.id);"><i class="fab fa-searchengin fa-2x"></i></button>
    </div>   
    <h4 id="KQsearchImport" style="margin-left:20px"></h4>
</div>
<div style="width:55%; height:870px; margin-left:86px; float:left; margin-top:40px">
	<h4 style=" font-size:22px; width:100%; background:#FFF; height:50px; line-height:50px; padding-left:30px"><b>DANH SÁCH TÀI KHOẢN</b></h4>
    <div id="DS_user">
    <?php
		$sql="select * from account where role='user' and del!='del'";
		$acc=pdo_query($sql);
		foreach($acc as $a){
		extract($a);
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
                   echo' <button type="button" class="btn btn-danger" style="margin-left:10px; width:130px; height:50px; margin-top:30px" onclick="xoaAcc('.$id.')"><b><i class="fas fa-user-times"></i>&nbsp;&nbsp;&nbsp;&nbsp;Xóa</b></button>
                </div>
            </div>
			<div style="width:100%; border-top:dashed 2px; opacity:0.5; position:absolute; top:180px"></div>
        </div>';
		}
	?>	
	</div>
</div>

<div style="width:34%; height:570px; float:right; background:#FFF; margin-right:20px; margin-top:40px">
	<h4 style=" font-size:22px; width:100%; height:50px; line-height:50px; text-align:center"><b>CHI TIẾT TÀI KHOẢN</b></h4>
	<div style="width:100%; border-top:solid 3px; margin-top:-8px"></div>
    <div id="CT_acc">
    	
    </div>
</div>
<div id="test"></div>
</div>
