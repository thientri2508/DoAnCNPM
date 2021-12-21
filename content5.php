<?php
$sql="SELECT product.id,product.name,product.price,product.image FROM product,detail_product WHERE del!='del' AND product.id=detail_product.id_product AND detail_product.id_properties=2 AND detail_product.id_detail_properties=18";
$sp=pdo_query($sql);
$count=count($sp);
$t1=$count/12;
$t2=intval($count/12);
if($t1==$t2) $sotrang= $t1;
else $sotrang= $t2+1;
?>
<script>
document.getElementById("slide").style.display='none';
document.title='Sale Off';
document.getElementById("content").style.height="2700px";
var sotrang=<?php echo $sotrang; ?>;
function pagination(str) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
	var t=str.split('-');
	var p=t[1];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "loadSPsale.php?q=" + p, true);
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
<div style="width:100%">
<img src="photo/saleoff.png" style="width:100%; height:300px;border: 1px solid rgba(0,0,0,0.15);" /> 
<?php
	if($count==0) {echo '<script>
	document.getElementById("content").style.height="550px"</script>';
	}
	?>
<div style="width:100%; height:2150px; margin-bottom:80px; margin-top:30px" id="loadSP">
</div>
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
