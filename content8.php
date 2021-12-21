<script>
document.getElementById("slide").style.display='none';
document.title='Search';
</script>
<?php
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
$s=$_GET['search'];
$count=0;
$sql="select * from product where del!='del'";
$sp=pdo_query($sql);
foreach($sp as $p){
	extract($p);
	$pos=strpos(vn_to_str($name), vn_to_str($s));
	if($pos!==false) {
		$count++;
	}
}
$t1=$count/12;
$t2=intval($count/12);
if($t1==$t2) $sotrang= $t1;
else $sotrang= $t2+1;
?>
<script>
var sotrang=<?php echo $sotrang; ?>;
function pagination(str) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
	var s='<?php echo $s; ?>';
	var t=str.split('-');
	var p=t[1];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "search.php?q=" + p + "&&s=" +s , true);
    xmlhttp.send();
}
function nextPage(a){
var t=a.split('-');
var index=parseInt(t[1]);
localStorage.setItem("page",index);
var pre=localStorage.getItem("prePage");
var last=localStorage.getItem("lastPage");


if(index>last){
	var a=parseInt(localStorage.getItem("lastPage"));
	localStorage.setItem("prePage",(a+1));
	if(a+4<=sotrang) {localStorage.setItem("lastPage",(a+4)); }
	else {localStorage.setItem("lastPage",sotrang);}
	pre=localStorage.getItem("prePage");
	last=localStorage.getItem("lastPage");
	}
else if(index<localStorage.getItem("prePage")){
	var b=parseInt(localStorage.getItem("prePage"));
	localStorage.setItem("prePage",(b-4)); 
	b=parseInt(localStorage.getItem("prePage"));
	localStorage.setItem("lastPage",(b+3)); 
	pre=localStorage.getItem("prePage");
	last=localStorage.getItem("lastPage");
}		
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadpage").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "loadPage.php?p=" + index + "&&sotrang=" + sotrang + "&&pre=" + pre + "&&last=" + last, true);
    xmlhttp.send();
}
function Lastpage(a){
var t=a.split('-');
var page=t[1];
if(page<=sotrang) { var s="page-"+page;
pagination(s);
nextPage(s);
}
}
function Prepage(a){
var t=a.split('-');
var page=t[1];
if(page>=1) { var s="page-"+page;
pagination(s);
nextPage(s);
}
}
</script>
<?php
	if($count==0) {echo '<script>
	document.getElementById("content").style.height="550px"</script>';
	}
	?>
<div id="KQsearch1">
	<div style="font-size:30px; width:50%; margin:auto; text-align:center; margin-top:30px"><b>TÌM THẤY <?php echo $count;?> KẾT QUẢ CHO "<?php echo $s;?>"</b></div>
    <div style="width:100%; border-bottom:solid 2px; margin-top:50px"></div>
    <div style="width:100%; height:2150px; margin-bottom:80px; margin-top:35px" id="loadSP">
    </div>
    
    <div id="quaylaimuahang" onclick="content('index.php?IDcategory=1')"><b>XEM TẤT CẢ SẢN PHẨM</b></div>
    
    <script>
	if(localStorage.getItem("page")==null) {pagination("page-1");}
	else { var page=localStorage.getItem("page");
	pagination("page-"+page);}
	</script>
    
    <div style="width:25%; margin-left:43%; height:40px; position:relative" id="loadpage">
	
    </div>
    
     <?php
	if($count==0) {echo '<script>document.getElementById("loadSP").style.height="200px";
	document.getElementById("quaylaimuahang").style.display="block";
	document.getElementById("loadpage").style.display="none"</script>';
	}
	if($count<=12) {echo '<script>document.getElementById("loadpage").style.display="none"</script>';
	}
	?>
    
    <script>
	if(localStorage.getItem("prePage")==null&&localStorage.getItem("lastPage")==null) {
	localStorage.setItem("prePage",1);
	localStorage.setItem("lastPage",4);
	nextPage("page-1");
	}
	else {
	var page=localStorage.getItem("page");
	nextPage("page-"+page);
	}
	</script>
</div>
