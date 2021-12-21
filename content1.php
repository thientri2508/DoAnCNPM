<script src="jquery.js"></script>
<script>
document.getElementById("slide").style.display='none';
document.title='Sản Phẩm';
</script>

<script>
var sotrang=<?php 
if(isset($_GET['IDcategory'])) {
	$s="";
	$product=array();
 	$sql="SELECT id_product from detail_product WHERE id_detail_properties=18";
	$id_sale=pdo_query($sql);
	foreach($id_sale as $sale){
		extract($sale);
		$s.=" AND id!=".$id_product;
	}
	if(isset($_GET['IDattribute'])) {
		$IDattribute=explode(' ',$_GET['IDattribute']);
		$sql='SELECT id_product,COUNT(id_product) from detail_product WHERE ';
		for($i=0;$i<count($IDattribute);$i++)
		{
			if($i==count($IDattribute)-1) $sql.='id_detail_properties='.$IDattribute[$i]. ' GROUP BY id_product';
			else $sql.='id_detail_properties='.$IDattribute[$i].' OR ';
		}
		$temp=pdo_query($sql);
		foreach($temp as $t){
			if($t["COUNT(id_product)"]==count($IDattribute)) {
				$sql="select * from product where id_category='".$_GET['IDcategory']."' AND del!='del' AND id=".$t['id_product'];
				$sp=pdo_query_one($sql);
				if($sp!='') {
					$sql="SELECT detail_product.id_detail_properties from detail_product WHERE detail_product.id_product=".$sp['id']." AND detail_product.id_properties=2";
					$check=pdo_query_one($sql);
					if($check["id_detail_properties"]!=18) array_push($product,$sp);
				}
			}
		}
	}else{
		$sql="select * from product where id_category='".$_GET['IDcategory']."' AND del!='del'".$s;
    	$product=pdo_query($sql);
	}
}
$count=count($product);
$t1=$count/12;
$t2=intval($count/12);
if($t1==$t2) echo $t1;
else echo $t2+1;
?>;
function pagination(str) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
	var t=str.split('-');
	var p=t[1];
	var IDcategory="<?php 
	if(isset($_GET['IDcategory'])) {
		echo $_GET['IDcategory'];
	}
	 ?>";
	var attr="<?php 
	if(isset($_GET['IDattribute'])) {
		echo $_GET['IDattribute'];
	}
	 ?>";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadSP").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "listSP.php?q=" + p + "&&category=" + IDcategory + "&&attr=" + attr , true);
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
<div class="left">
<div class="container">
  <ul class="acc">
  <?php
  $attr=array();
  if(isset($_GET['IDattribute'])){
	$attr=explode(' ',$_GET['IDattribute']);
  }
  $sql="SELECT properties.id,properties.name from properties,properties_of_product_type,category WHERE category.id='".$_GET['IDcategory']."' AND category.idProductType=properties_of_product_type.id_ProductType AND properties_of_product_type.id_Properties=properties.id";
  $properties=pdo_query($sql);
  $i=1;
  foreach($properties as $p){
  	extract($p);
	echo '<li>
			  <div class="acc_ctrl" style="width:150px">
				<h3 class="accordion" style="width:200px;margin-top:90px" onclick="collapse(this);" id="dm'.$i.'"><b>'.$name.'</b><i class="fas fa-angle-up" style="margin-left:8px"></i></h3>
			  </div>
			  <div class="acc_panel">';
	$sql="SELECT detail_properties.id,detail_properties.name FROM detail_properties,properties,set_properties WHERE properties.id=".$id." AND properties.id=set_properties.id_properties AND set_properties.id_detail_properties=detail_properties.id AND detail_properties.id!=18";
	$detail_pro=pdo_query($sql);
	foreach($detail_pro as $item){
		$flag=true;
		for($j=0;$j<count($attr);$j++)	
		{
			if($item["id"]==$attr[$j]) {
				$flag=false;
				break;
			}
		}
		if($flag) echo '<div class="chitietdanhmuc" onclick="attribute('.$item["id"].')">'.$item["name"].'</div>';
		else echo '<div class="chitietdanhmuc" style="background:#E8E8E8;" onclick="attribute('.$item["id"].')">'.$item["name"].'<i class="fas fa-times-circle" style="right:10px; top:12px; position:absolute"></i></div>';
	}
	echo '</div>
      		  <div style="width:87%; border:dashed 2px; border-bottom:none; border-left:none; border-right:none; opacity:0.5; margin-top:32px; margin-left:18px"></div>
    	  </li>';
	 $i++;
  }
  ?>
  </ul>
</div>
<script>
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
</div>

<?php
if(isset($_GET['attribute'])) {
$att=$_GET['attribute'];
echo '<script>document.getElementById("'.$att.'").style.background="#E8E8E8"</script>';
}
?>
<div class="right">
	<div style="width:886px; height:350px; margin-top:30px; margin-left: 13px">
    	<img src="photo/content1.jpg" style="width:100%; height:100%; border: 1px solid rgba(0,0,0,0.15);"  />
    </div>
	<div style="width:100%; height:1850px; margin-top:45px; margin-bottom:100px" id="loadSP">
    </div>
    <script>
	if(localStorage.getItem("page")==null) {pagination("page-1");}
	else { var page=localStorage.getItem("page");
	pagination("page-"+page);}
	</script>
    
 
    
 
 	
    <div style="width:40%; margin:auto; height:40px; position:relative;" id="loadpage">
	
    </div>
    
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
	function attribute(id){
	if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
		localStorage.clear();
	}
	var url = window.location.href;
	var str = url.split('?');
	var u=str[1];
	if(u.indexOf("IDattribute")==-1){
		url+="&&IDattribute="+id;
	}else {
		var t = u.split('&&');
		var s="";
		for(var j=0;j<t.length;j++){
			if(t[j].indexOf("IDattribute")!=-1){
				var attr="<?php
				if(isset($_GET['IDattribute'])) echo $_GET['IDattribute'];
				?>";
				var arr=attr.split(" ");
				var flag=true;
				for(var k=0;k<arr.length;k++)
				{
					if(arr[k]==id){
						arr.splice(k,1);
						flag=false;
						break;
					}
				}
				if(flag==true) t[j]+="+"+id;
				else {
					if(arr.length==0) t[j]="";
					else t[j]="IDattribute="+arr.join('+'); 
				}
			}
			if(j==t.length-1) s+=t[j];
			else s+=t[j]+"&&";
		}
		var check=true;
		var v=s.split("&&");
		for(var j=0;j<v.length;j++)
		{
			if(v[j]==""){
				t.splice(j,1);
				check=false;
				break;
			}
		}
		if(check==false){
			s="";
			for(var j=0;j<t.length;j++){
				if(j==t.length-1) s+=t[j];
				else s+=t[j]+"&&";
			}
		}
		url=str[0]+"?"+s;
	}
	window.location.assign(url);
	}
	var dm=<?php 
	if(isset($_GET['IDcategory'])) {
	$sql="SELECT properties.name from properties,category,properties_of_product_type where category.id='".$_GET['IDcategory']."' AND category.idProductType=properties_of_product_type.id_ProductType AND properties_of_product_type.id_Properties=properties.id";
	$dm=pdo_query($sql);
	$s='[';
	foreach($dm as $d){
		$s.='{status:"up",name:"'.$d["name"].'"},';
	}
	$s.=']';
	echo $s;
	}
	?>;
	function collapse(a){
	var t=a.id;
	for(var i=0;i<8;i++)
	{
		var s="dm"+(i+1);
		if(t==s) {
			if(dm[i].status=='down') {document.getElementById(s).innerHTML='<b>'+dm[i].name+'</b><i class="fas fa-angle-up" style="margin-left:8px"></i>';dm[i].status='up';
						document.getElementById(s).style.color='#f15e2c';}
			else 	{document.getElementById(s).innerHTML='<b>'+dm[i].name+'</b><i class="fas fa-angle-down" style="margin-left:8px"></i>';dm[i].status='down';
					document.getElementById(s).style.color='#000';}
			break;
		}
	}		
	}
	</script>  
</div>
