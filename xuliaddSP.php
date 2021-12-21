<?php
session_start();
include 'pdo.php';
$folder_path='photo/';
if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!="") {
	$file_path= $folder_path.$_FILES['image']['name'];
	$flag=true;
	if(file_exists($file_path)) {
	$_SESSION['thongbaoad']=1;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	$flag=false;
	}
	$ex = array('jpg','png','jpeg');
	$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
	if(!in_array($file_type,$ex)) {
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	$flag=false;
	}
	if($_FILES['image']['size']>500000){
	$_SESSION['thongbaoad']=2;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	$flag=false;
	}
	if($flag){
	move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
	$namesp=$_POST['namesp'];
	$price=$_POST['price'];
	$img=$_FILES['image']['name'];
	$type=$_POST['productType'];
	$sql="SELECT category.id from category,product_type WHERE category.idProductType=product_type.id AND product_type.name='".$type."'";
	$category=pdo_query_one($sql);
	$id_category=$category["id"];
	$sql="insert into product(name,price,image,id_category) values('$namesp','$price','$img','$id_category')";	
	pdo_execute($sql);
	$sql="select * from product where id=(select MAX(id) from product)";
	$pro=pdo_query_one($sql);
	$sql="SELECT properties_of_product_type.id_Properties FROM properties_of_product_type,category,product_type WHERE category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND category.id='".$pro['id_category']."'";
	$list=pdo_query($sql);
	$idd=$pro['id'];
	$NAME=$pro['name'];
	foreach($list as $l){
		$properties=$l["id_Properties"];
		$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values('$idd','$properties','0')";
		pdo_execute($sql);
	}
	$sql="SELECT product_type.size from product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id_category='".$pro['id_category']."' AND product.id=".$pro['id'];
	$size_type=pdo_query_one($sql);
	if($size_type["size"]=="number") {
		for($i=35;$i<=46;$i++)
		{
			$sql="insert into warehouse(id_product,name,size,amount) values('$idd','$NAME','$i','0')";	
			pdo_execute($sql);		
		}
	}
	else {
		$sql="insert into warehouse(id_product,name,size,amount) values('$idd','$NAME','freesize','0')";	
		pdo_execute($sql);	
	}
	$_SESSION['thongbaoad']=3;	
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
	}	
}
else {
	$namesp=$_POST['namesp'];
	$price=$_POST['price'];
	$img=$_FILES['image']['name'];
	$type=$_POST['productType'];
	$sql="SELECT category.id from category,product_type WHERE category.idProductType=product_type.id AND product_type.name='".$type."'";
	$category=pdo_query_one($sql);
	$id_category=$category["id"];
	$sql="insert into product(name,price,image,id_category) values('$namesp','$price','$img','$id_category')";	
	pdo_execute($sql);
	$sql="select * from product where id=(select MAX(id) from product)";
	$pro=pdo_query_one($sql);
	$sql="SELECT properties_of_product_type.id_Properties FROM properties_of_product_type,category,product_type WHERE category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND category.id='".$pro['id_category']."'";
	$list=pdo_query($sql);
	$idd=$pro['id'];
	$NAME=$pro['name'];
	foreach($list as $l){
		$properties=$l["id_Properties"];
		$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values('$idd','$properties','0')";
		pdo_execute($sql);
	}
	$sql="SELECT product_type.size from product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id_category='".$pro['id_category']."' AND product.id=".$pro['id'];
	$size_type=pdo_query_one($sql);
	if($size_type["size"]=="number") {
		for($i=35;$i<=46;$i++)
		{
			$sql="insert into warehouse(id_product,name,size,amount) values('$idd','$NAME','$i','0')";	
			pdo_execute($sql);		
		}
	}
	else {
		$sql="insert into warehouse(id_product,name,size,amount) values('$idd','$NAME','freesize','0')";	
		pdo_execute($sql);	
	}
	$_SESSION['thongbaoad']=3;
	echo '<script>location.replace("server.php?category=qlsp&&act=addSP");</script>';	
}
?>
