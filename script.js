// JavaScript Document
function abc(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById("sub-menu" + id).style.display='block';
document.getElementById("cate" + id).style.color='#FF8C00';
}
function asd(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById("sub-menu" + id).style.display='none';
document.getElementById("cate" + id).style.color='black';	
}
function zxc(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById(t).style.display='block';
//document.getElementById("arr").style.color='#FF8C00';
document.getElementById("cate" + id).style.color='#FF8C00';
}
function qwe(a){
var t=a.id;
var id=t.substr(t.length-1);
document.getElementById(t).style.display='none';
//document.getElementById("arr").style.color='black';
document.getElementById("cate" + id).style.color='black';	
}
function hoverIn1(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==i) { 
		document.getElementById(i).style.opacity=1;
		document.getElementById(s).style.opacity=1;
		break;
		}
}
}
function hoverOut1(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==i) { 
		document.getElementById(i).style.opacity=0.4;
		document.getElementById(s).style.opacity=0.4;
		break;
		}
}
}
function hoverIn2(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==s) { 
		document.getElementById(i).style.opacity=1;
		document.getElementById(s).style.opacity=1;
		document.getElementById(s).style.color='#FF8C00';
		break;
		}
}
}
function hoverOut2(a){
var t=a.id;
for(var i=1;i<9;i++)
{
	var s="title"+i;
	if(t==s) { 
		document.getElementById(i).style.opacity=0.4;
		document.getElementById(s).style.opacity=0.4;
		document.getElementById(s).style.color='#FFF';
		break;
		}
}
}
var i=1;
function change1(){
if(i==1) {document.getElementById("chuyen").style.marginLeft='-470px';}
if(i==2) {document.getElementById("chuyen").style.marginLeft='-1020px';}
if(i==3) {document.getElementById("chuyen").style.marginLeft='-1520px';}
if(i==4) {document.getElementById("chuyen").style.marginLeft='0px';i=0;}
i++;
}
function change2(){
if(i==1) {document.getElementById("chuyen").style.marginLeft='-1520px';i=5;}
if(i==2) {document.getElementById("chuyen").style.marginLeft='0px';}
if(i==3) {document.getElementById("chuyen").style.marginLeft='-470px';}
if(i==4) {document.getElementById("chuyen").style.marginLeft='-1020px';}
i--;
}
var qt=[{status:'up',name:'QUẢN TRỊ DANH MỤC'},
		{status:'up',name:'QUẢN TRỊ GIAO DIỆN'},
		{status:'up',name:'QUẢN TRỊ THÔNG TIN'},
		{status:'up',name:'QUẢN TRỊ TÀI KHOẢN'}];
function collapse1(a){
var t=a.id;
for(var i=0;i<4;i++)
{
	var s="qt"+(i+1);
	if(t==s) {
		if(qt[i].status=='down')  {document.getElementById(s).innerHTML='<b>'+qt[i].name+'</b><i class="fas fa-angle-up" style="margin-left:5px"></i>';qt[i].status='up';
			document.getElementById(s).style.color='#f15e2c';}
		else {document.getElementById(s).innerHTML='<b>'+qt[i].name+'</b><i class="fas fa-angle-down" style="margin-left:5px"></i>';qt[i].status='down';
			document.getElementById(s).style.color='#000';}
	break;
	}
}
}
function checkPrice(){
	var price=[];
	price=document.getElementById("price").value;
	var t=document.getElementById("price").value;
	if(t=="") {document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Giá sản phẩm không được bỏ trống';
			return false;	}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error").innerHTML="";
	return true;
}
function checkName(){
	var name=document.getElementById("namesp").value;
	var t=[];
	t=document.getElementById("namesp").value;
	if(name=="")	{document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không được bỏ trống';
			return false;	}
	else {document.getElementById("error1").innerHTML="";}
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("error1").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error1").innerHTML="";
	return true;
}
function checkTTSP(){
var check1=checkPrice();
var check2=checkName();
if(check1==true&&check2==true) return true;
else return false;
}
function checkFixName(){
	var name=document.getElementById("fixname").value;
	if(name=="")	{document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên sản phẩm không được bỏ trống';
			return false;	}
	else {document.getElementById("error2").innerHTML="";}		
	var t=[];
	t=document.getElementById("fixname").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("error2").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error2").innerHTML="";
	return true;
}
function checkFixPrice(){
	var price=[];
	price=document.getElementById("fixprice").value;
	var t=document.getElementById("fixprice").value;
	if(t=="") {document.getElementById("error4").innerHTML='<i class="fas fa-exclamation-circle"></i> Giá sản phẩm không được bỏ trống';
			return false;	}
	for(var i=0;i<price.length;i++)
	{
		if(price[i].charCodeAt()<48||price[i].charCodeAt()>57) 
		{
			document.getElementById("error4").innerHTML='<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số';
			return false;
		}
	}
	document.getElementById("error4").innerHTML="";
	return true;
}
function checkFixTTSP(){
var check2=checkFixName();
var check3=checkFixPrice();
if(check2==true&&check3==true) return true;
else return false;
}
function hoverSP1(a){
var t=a.id;
var c=t.slice(3,t.length);
document.getElementById("sp"+c).style.display='block';
}
function hoverSP2(a){
var t=a.id;
var c=t.slice(3,t.length);
document.getElementById("sp"+c).style.display='none';
}
function selectSize(a,id){
if(a=="freeSize") { var size="freesize";
	document.getElementById("dropdownMenuButton1").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>free</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
	document.getElementById("freeSize").style.background='#E8E8E8';
	document.getElementById("size").value="freesize";
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("HienThiSL").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "HienThiSLSP.php?id=" + id + "&&size=" + size, true);
    xmlhttp.send();
	document.getElementById("btnSLnone").style.display='none';
}
else {
var t=a.split('-');
var size=t[1];
document.getElementById("dropdownMenuButton1").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+size+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("dropdownMenuButton2").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b></b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("soluong").value="";
document.getElementById("size").value=size;
for(var i=35;i<=46;i++)
{
	document.getElementById("size-"+i).style.background='';	
}
document.getElementById("size-"+size).style.background='#E8E8E8';
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("HienThiSL").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "HienThiSLSP.php?id=" + id + "&&size=" + size, true);
    xmlhttp.send();
document.getElementById("btnSLnone").style.display='none';
document.getElementById("bntthemnone").style.display='block';
}
}
function selectSoLuong(a){
var t=a.split('-');
var sl=t[1];
document.getElementById("dropdownMenuButton2").innerHTML='<h6 style="position:absolute; left:10px; top:5px"><b>'+sl+'</b></h6><i class="fas fa-chevron-down" style="float:right; margin-right:5px"></i>';
document.getElementById("soluong").value=sl;
for(var i=1;i<=12;i++)
{
	document.getElementById("sl-"+i).style.background='';	
}
document.getElementById("sl-"+sl).style.background='#E8E8E8';
document.getElementById("bntthemnone").style.display='none';
}
function content(url){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
window.location.assign(url);
}
function content1(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
window.location.assign("index.php?category=accessories");
}
function phukien(a){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var url="index.php?category=accessories&&product="+a;
window.location.assign(url);
}
function contentsale(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
window.location.assign("index.php?saleoff");
}
function phukienAtt(a,b){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var url="index.php?category=accessories&&product="+a+"&&attribute="+b;
window.location.assign(url);
}
function ImagesFileAsURL1(id)
{
	var fileSelected = document.getElementById(id).files;
	if(fileSelected.length>0)
	{
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImage = document.createElement('img');
			newImage.src= srcData;
			var s=newImage.outerHTML;
			var str = s.split('"');
			str.pop();
			var t=' width="240" height="220">';
			str.push(t);
			var photo=str[0]+'"'+str[1]+'"'+str[2];
			document.getElementById('upload3').innerHTML= photo;
	}
	fileReader.readAsDataURL(fileToLoad);
}
}
function ImagesFileAsURL(id)
{
	var fileSelected = document.getElementById(id).files;
	if(fileSelected.length>0)
	{
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImage = document.createElement('img');
			newImage.src= srcData;
			var s=newImage.outerHTML;
			var str = s.split('"');
			str.pop();
			var t=' width="240" height="220">';
			str.push(t);
			var photo=str[0]+'"'+str[1]+'"'+str[2];
			document.getElementById('upload1').innerHTML= photo;
	}
	fileReader.readAsDataURL(fileToLoad);
}
}
function closeImg(){
document.getElementById('upload1').innerHTML= "";
}
function closeImg1(){
document.getElementById('upload3').innerHTML= "";
}
function ImagesFileAsURLFix(id)
{
	var fileSelected = document.getElementById(id).files;
	if(fileSelected.length>0)
	{
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImage = document.createElement('img');
			newImage.src= srcData;
			var s=newImage.outerHTML;
			var str = s.split('"');
			str.pop();
			var t=' width="240" height="220">';
			str.push(t);
			var photo=str[0]+'"'+str[1]+'"'+str[2];
			document.getElementById('upload2').innerHTML= photo;
	}
	fileReader.readAsDataURL(fileToLoad);
}
}
function closeImgFix(){
document.getElementById('upload2').innerHTML= "";
}
function xoaSP(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this product?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delSP('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function checkNameCT_Attr(){
	var name=document.getElementById("name").value;
	if(name=="")	{document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên chi tiết thuộc tính không được bỏ trống';
			return false;	}
	else {document.getElementById("error").innerHTML="";}		
	var t=[];
	t=document.getElementById("name").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("error").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("error").innerHTML="";
	return true;
}
function checkNameAttr(){
	var name=document.getElementById("nameAttr").value;
	if(name=="")	{document.getElementById("err").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên thuộc tính không được bỏ trống';
			return false;	}
	else {document.getElementById("err").innerHTML="";}		
	var t=[];
	t=document.getElementById("nameAttr").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("err").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("err").innerHTML="";
	return true;
}
function checkNameProductType(){
	var name=document.getElementById("nameAttr").value;
	if(name=="")	{document.getElementById("err").innerHTML='<i class="fas fa-exclamation-circle"></i> Tên loại sản phẩm không được bỏ trống';
			return false;	}
	else {document.getElementById("err").innerHTML="";}		
	var t=[];
	t=document.getElementById("nameAttr").value;
	for(var i=0;i<t.length;i++)
	{
		if(t[i]=="'"||t[i]=='"') 
		{
			document.getElementById("err").innerHTML='<i class="fas fa-exclamation-circle"></i> Không được nhập ký tự đặc biệt';
			return false;
		}
	}
	document.getElementById("err").innerHTML="";
	return true;
}
function fixCT_Attr(id,name,image){
	document.getElementById('AddDetailAttr').style.display='block';
	var s="";
	s+='<div style="width:38%; margin-left:33%; height:650px; background:#FFFFFF; position:fixed; margin-top:50px">';
    s+='	<h3 style="margin-top:30px; width:100%; text-align:center">Sửa Chi Tiết Thuộc Tính</h3>';
    s+='    <form method="post" action="xulifixCT_Attr.php" enctype="multipart/form-data">';
	s+='	<input type="hidden" value="'+id+'" name="id"></input>';
    s+='    <h5 style="margin-left:60px; margin-top:40px">Tên Chi Tiết Thuộc Tính<i class="fas fa-tag" style="margin-left:40px"></i></h5>';
    s+='    <div class="input-group mb-3" style="width:80%; margin-left:60px">';
    s+='      <input type="text" class="form-control" value="'+name+'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="name">';
    s+='    </div>';
    s+='	<div id="error" style="position:absolute; width:80%; left:60px; top:175px; height:25px; color:#FF0000"></div>';
    s+='    <h5 style="margin-left:60px; margin-top:30px">Ảnh Chi Tiết Thuộc Tính<i class="far fa-images" style="margin-left:30px"></i></h5>';
    s+='    <div style="width:80%; margin-left:60px">';
    s+='      <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" onchange="ImagesFileAsURL(this.id)" onclick="closeImg()">';
    s+='    </div> ';
    s+='    <div id="upload1" style="width:240px; height:220px; margin:auto; margin-top:30px; background:#E8E8E8">';
	s+='    <img src="photo/'+image+'" style="width:240px; height:220px" />';
    s+='   </div>';
    s+='   <div style="width:80%; margin:auto; height:60px; margin-top:40px">';
    s+='    	<input type="submit" class="btn btn-success" style="float:left; font-size:24px; width:120px" onclick="return checkNameCT_Attr();" value="Thay Đổi"></input>';
    s+='    </form>';
	s+='		<button type="button" class="btn btn-danger" style="float:right; font-size:24px; width:120px" onclick="huyADD()">Hủy</button>';
    s+='    </div>';
    s+='</div>';
	document.getElementById('AddDetailAttr').innerHTML=s;	
}
function xoaDM(id){
document.getElementById('delSP').style.display='block';
var s="";
var ID="'"+id+"'";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this category?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delDM('+ID+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function xoaCT_Attr(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this detail properties?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delCT_Attr('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function xoaAttr(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this properties?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delAttr('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function xoaProductType(id){
document.getElementById('delSP').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this product type?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="delProductType('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delSP').innerHTML=s;	
}
function xoaDH(id){
document.getElementById('delDH').style.display='block';
var s="";
s+='<div style="width:100%; height:200px; position:fixed; margin-top:250px">';
        s+='<div style="width:450px; height:200px; margin:auto">';
        s+='<h3 style="font-size:27px; font-family: Tahoma; color:#FF0000">Are you sure to delete this order?</h3>';
        s+='<div class="d-grid gap-2" style="margin-top:40px">';
        s+='<button class="btn btn-success" type="button" style="height:50px" onclick="confirm_xoaDH('+id+')">Confirm</button>';
        s+='<button class="btn btn-danger" type="button" style="height:50px; margin-top:5px" onclick="cancel_xoaDH()">Cancel</button>';
        s+='</div>';
    	s+='</div>';
s+='</div>';
document.getElementById('delDH').innerHTML=s;	
}

function cancel_xoaDH(){
document.getElementById('delDH').style.display='none';
}

function confirm_xoaDH(id){
var url="delDH.php?id="+id;
location.replace(url);
}

function cancel(){
document.getElementById('delSP').style.display='none';
}

function delSP(id){
var url="delSP.php?id="+id;
location.replace(url);
}
function delDM(id){
var url="delDM.php?id="+id;
location.replace(url);
}
function delCT_Attr(id){
var url="delCT_Attr.php?id="+id;
location.replace(url);
}
function delAttr(id){
var url="delAttr.php?id="+id;
location.replace(url);
}
function delProductType(id){
var url="delProductType.php?id="+id;
location.replace(url);
}
function logout(){
	var url = window.location.href;
	location.replace("userlogin.php?url="+url);
}

function loadDS(){
	location.reload();
}
function formatNumber(num) { // định dạng giá tiền
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}
function searchSP(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
	localStorage.clear();
}
var s1=document.getElementById("search").value;
if(s1!=""){
var s2=s1.trim();
var s3=s2.replace(" ","+");
window.location.assign("mensport.com?search="+s3);}
}
function closeTB(){
document.getElementById("thongbao").style.display="none";
}
function locgia(){
if(localStorage.getItem("page")!=null&&localStorage.getItem("prePage")!=null&&localStorage.getItem("lastPage")!=null) {
localStorage.clear();
}
var t1=[],t2=[];
var a1=document.getElementById("pricefrom").value;
var a2=document.getElementById("priceto").value;
t1=document.getElementById("pricefrom").value;
t2=document.getElementById("priceto").value;
if(a1==""&&a2=="") 
{
	document.getElementById("thongbao").style.color="red";
	document.getElementById("thongbao").style.fontSize="20px";
	document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập Giá từ hoặc Giá đến</b>";
	document.getElementById("thongbao").style.display="block";
	setTimeout(closeTB,3000);
	return 0;
}
if(a1!=""&&a2==""){
	for(var i=0;i<t1.length;i++)
	{
		if(t1[i].charCodeAt()<48||t1[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	window.location.assign("index.php?price="+a1+"->");
}

if(a1==""&&a2!=""){
	for(var i=0;i<t2.length;i++)
	{
		if(t2[i].charCodeAt()<48||t2[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	window.location.assign("index.php?price=<-"+a2);
}
if(a1!=""&&a2!=""){
	for(var i=0;i<t1.length;i++)
	{
		if(t1[i].charCodeAt()<48||t1[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	for(var i=0;i<t2.length;i++)
	{
		if(t2[i].charCodeAt()<48||t2[i].charCodeAt()>57) 
		{
			document.getElementById("thongbao").style.color="red";
			document.getElementById("thongbao").innerHTML="<b>Vui lòng nhập số!!</b>";
			document.getElementById("thongbao").style.display="block";
			setTimeout(closeTB,3000);
			return 0;
		}
	}
	var p1=parseInt(a1);
	var p2=parseInt(a2);
	if(p1<p2){
	window.location.assign("index.php?price="+p1+"-"+p2);}
	else {window.location.assign("index.php?price="+p2+"-"+p1);}
}
}
var md5 = function (string) {
 
        function RotateLeft(lValue, iShiftBits) {
            return (lValue<<iShiftBits) | (lValue>>>(32-iShiftBits));
        }
 
        function AddUnsigned(lX,lY) {
            var lX4,lY4,lX8,lY8,lResult;
            lX8 = (lX & 0x80000000);
            lY8 = (lY & 0x80000000);
            lX4 = (lX & 0x40000000);
            lY4 = (lY & 0x40000000);
            lResult = (lX & 0x3FFFFFFF)+(lY & 0x3FFFFFFF);
            if (lX4 & lY4) {
                return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
            }
            if (lX4 | lY4) {
                if (lResult & 0x40000000) {
                    return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
                } else {
                    return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
                }
            } else {
                return (lResult ^ lX8 ^ lY8);
            }
        }
 
        function F(x,y,z) {
            return (x & y) | ((~x) & z);
        }
        function G(x,y,z) {
            return (x & z) | (y & (~z));
        }
        function H(x,y,z) {
            return (x ^ y ^ z);
        }
        function I(x,y,z) {
            return (y ^ (x | (~z)));
        }
 
        function FF(a,b,c,d,x,s,ac) {
            a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));
            return AddUnsigned(RotateLeft(a, s), b);
        };
 
        function GG(a,b,c,d,x,s,ac) {
            a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));
            return AddUnsigned(RotateLeft(a, s), b);
        };
 
        function HH(a,b,c,d,x,s,ac) {
            a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));
            return AddUnsigned(RotateLeft(a, s), b);
        };
 
        function II(a,b,c,d,x,s,ac) {
            a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));
            return AddUnsigned(RotateLeft(a, s), b);
        };
 
        function ConvertToWordArray(string) {
            var lWordCount;
            var lMessageLength = string.length;
            var lNumberOfWords_temp1=lMessageLength + 8;
            var lNumberOfWords_temp2=(lNumberOfWords_temp1-(lNumberOfWords_temp1 % 64))/64;
            var lNumberOfWords = (lNumberOfWords_temp2+1)*16;
            var lWordArray=Array(lNumberOfWords-1);
            var lBytePosition = 0;
            var lByteCount = 0;
            while ( lByteCount < lMessageLength ) {
                lWordCount = (lByteCount-(lByteCount % 4))/4;
                lBytePosition = (lByteCount % 4)*8;
                lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount)<<lBytePosition));
                lByteCount++;
            }
            lWordCount = (lByteCount-(lByteCount % 4))/4;
            lBytePosition = (lByteCount % 4)*8;
            lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80<<lBytePosition);
            lWordArray[lNumberOfWords-2] = lMessageLength<<3;
            lWordArray[lNumberOfWords-1] = lMessageLength>>>29;
            return lWordArray;
        };
 
        function WordToHex(lValue) {
            var WordToHexValue="",WordToHexValue_temp="",lByte,lCount;
            for (lCount = 0;lCount<=3;lCount++) {
                lByte = (lValue>>>(lCount*8)) & 255;
                WordToHexValue_temp = "0" + lByte.toString(16);
                WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length-2,2);
            }
            return WordToHexValue;
        };
 
        function Utf8Encode(string) {
            string = string.replace(/\r\n/g,"\n");
            var utftext = "";
 
            for (var n = 0; n < string.length; n++) {
 
                var c = string.charCodeAt(n);
 
                if (c < 128) {
                    utftext += String.fromCharCode(c);
                }
                else if((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
                else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
 
            }
 
            return utftext;
        };
 
        var x=Array();
        var k,AA,BB,CC,DD,a,b,c,d;
        var S11=7, S12=12, S13=17, S14=22;
        var S21=5, S22=9 , S23=14, S24=20;
        var S31=4, S32=11, S33=16, S34=23;
        var S41=6, S42=10, S43=15, S44=21;
 
        string = Utf8Encode(string);
 
        x = ConvertToWordArray(string);
 
        a = 0x67452301;
        b = 0xEFCDAB89;
        c = 0x98BADCFE;
        d = 0x10325476;
 
        for (k=0;k<x.length;k+=16) {
            AA=a;
            BB=b;
            CC=c;
            DD=d;
            a=FF(a,b,c,d,x[k+0], S11,0xD76AA478);
            d=FF(d,a,b,c,x[k+1], S12,0xE8C7B756);
            c=FF(c,d,a,b,x[k+2], S13,0x242070DB);
            b=FF(b,c,d,a,x[k+3], S14,0xC1BDCEEE);
            a=FF(a,b,c,d,x[k+4], S11,0xF57C0FAF);
            d=FF(d,a,b,c,x[k+5], S12,0x4787C62A);
            c=FF(c,d,a,b,x[k+6], S13,0xA8304613);
            b=FF(b,c,d,a,x[k+7], S14,0xFD469501);
            a=FF(a,b,c,d,x[k+8], S11,0x698098D8);
            d=FF(d,a,b,c,x[k+9], S12,0x8B44F7AF);
            c=FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);
            b=FF(b,c,d,a,x[k+11],S14,0x895CD7BE);
            a=FF(a,b,c,d,x[k+12],S11,0x6B901122);
            d=FF(d,a,b,c,x[k+13],S12,0xFD987193);
            c=FF(c,d,a,b,x[k+14],S13,0xA679438E);
            b=FF(b,c,d,a,x[k+15],S14,0x49B40821);
            a=GG(a,b,c,d,x[k+1], S21,0xF61E2562);
            d=GG(d,a,b,c,x[k+6], S22,0xC040B340);
            c=GG(c,d,a,b,x[k+11],S23,0x265E5A51);
            b=GG(b,c,d,a,x[k+0], S24,0xE9B6C7AA);
            a=GG(a,b,c,d,x[k+5], S21,0xD62F105D);
            d=GG(d,a,b,c,x[k+10],S22,0x2441453);
            c=GG(c,d,a,b,x[k+15],S23,0xD8A1E681);
            b=GG(b,c,d,a,x[k+4], S24,0xE7D3FBC8);
            a=GG(a,b,c,d,x[k+9], S21,0x21E1CDE6);
            d=GG(d,a,b,c,x[k+14],S22,0xC33707D6);
            c=GG(c,d,a,b,x[k+3], S23,0xF4D50D87);
            b=GG(b,c,d,a,x[k+8], S24,0x455A14ED);
            a=GG(a,b,c,d,x[k+13],S21,0xA9E3E905);
            d=GG(d,a,b,c,x[k+2], S22,0xFCEFA3F8);
            c=GG(c,d,a,b,x[k+7], S23,0x676F02D9);
            b=GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);
            a=HH(a,b,c,d,x[k+5], S31,0xFFFA3942);
            d=HH(d,a,b,c,x[k+8], S32,0x8771F681);
            c=HH(c,d,a,b,x[k+11],S33,0x6D9D6122);
            b=HH(b,c,d,a,x[k+14],S34,0xFDE5380C);
            a=HH(a,b,c,d,x[k+1], S31,0xA4BEEA44);
            d=HH(d,a,b,c,x[k+4], S32,0x4BDECFA9);
            c=HH(c,d,a,b,x[k+7], S33,0xF6BB4B60);
            b=HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);
            a=HH(a,b,c,d,x[k+13],S31,0x289B7EC6);
            d=HH(d,a,b,c,x[k+0], S32,0xEAA127FA);
            c=HH(c,d,a,b,x[k+3], S33,0xD4EF3085);
            b=HH(b,c,d,a,x[k+6], S34,0x4881D05);
            a=HH(a,b,c,d,x[k+9], S31,0xD9D4D039);
            d=HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);
            c=HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);
            b=HH(b,c,d,a,x[k+2], S34,0xC4AC5665);
            a=II(a,b,c,d,x[k+0], S41,0xF4292244);
            d=II(d,a,b,c,x[k+7], S42,0x432AFF97);
            c=II(c,d,a,b,x[k+14],S43,0xAB9423A7);
            b=II(b,c,d,a,x[k+5], S44,0xFC93A039);
            a=II(a,b,c,d,x[k+12],S41,0x655B59C3);
            d=II(d,a,b,c,x[k+3], S42,0x8F0CCC92);
            c=II(c,d,a,b,x[k+10],S43,0xFFEFF47D);
            b=II(b,c,d,a,x[k+1], S44,0x85845DD1);
            a=II(a,b,c,d,x[k+8], S41,0x6FA87E4F);
            d=II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);
            c=II(c,d,a,b,x[k+6], S43,0xA3014314);
            b=II(b,c,d,a,x[k+13],S44,0x4E0811A1);
            a=II(a,b,c,d,x[k+4], S41,0xF7537E82);
            d=II(d,a,b,c,x[k+11],S42,0xBD3AF235);
            c=II(c,d,a,b,x[k+2], S43,0x2AD7D2BB);
            b=II(b,c,d,a,x[k+9], S44,0xEB86D391);
            a=AddUnsigned(a,AA);
            b=AddUnsigned(b,BB);
            c=AddUnsigned(c,CC);
            d=AddUnsigned(d,DD);
        }
 
        var temp = WordToHex(a)+WordToHex(b)+WordToHex(c)+WordToHex(d);
 
        return temp.toLowerCase();
    }