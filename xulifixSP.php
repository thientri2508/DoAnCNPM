<?php
			session_start();
			include 'pdo.php';
				$folder_path='photo/';
				if(isset($_FILES['fiximage']['name'])&&$_FILES['fiximage']['name']!="") {
				$file_path= $folder_path.$_FILES['fiximage']['name'];
				$flag=true;
				if(file_exists($file_path)) {
				$_SESSION['thongbaoad']=1;
				echo '<script>window.history.back();</script>';	
				$flag=false;
				}
				$ex = array('jpg','png','jpeg');
				$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
				if(!in_array($file_type,$ex)) {
					$_SESSION['thongbaoad']=2;
					echo '<script>window.history.back();</script>';
					$flag=false;
				}
				if($flag){
				$idi=$_POST['fixId'];
				$namesp=$_POST['fixname'];
				$price=$_POST['fixprice'];
				$img=$_FILES['fiximage']['name'];
				$type=$_POST['fixproductType'];
				$sql="SELECT product_type.name FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$idi;
				$res=pdo_query_one($sql);
				if($res["name"]!=$type){
					$check=true;
					$sql="select * from warehouse where id_product=".$idi;
					$warehouse=pdo_query($sql);
					foreach($warehouse as $db){
						if($db["amount"]!=0) {
							$check=false;
							break;
						}
					}
					if($check==true){
						$sql="SELECT category.id from category,product_type WHERE category.idProductType=product_type.id AND product_type.name='".$type."'";
						$category=pdo_query_one($sql);
						$id_category=$category["id"];
						
						if(isset($_POST['delImg'])) {
						$sql="update product set name='".$namesp."',price='".$price."',image='',id_category='".$id_category."' where id=".$idi;	
						}else {
						move_uploaded_file($_FILES['fiximage']['tmp_name'],$file_path);
						$sql="update product set name='".$namesp."',price='".$price."',image='".$img."',id_category='".$id_category."' where id=".$idi;	}
						pdo_execute($sql);		
						
						$sql="delete from detail_product where id_product=".$idi;
						pdo_execute($sql);	
						$sql="SELECT properties_of_product_type.id_Properties FROM properties_of_product_type,category,product_type WHERE category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND category.id='".$id_category."'";
						$list=pdo_query($sql);
						foreach($list as $l){
							$properties=$l["id_Properties"];
							$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values('$idi','$properties','0')";
							pdo_execute($sql);
						}
						$sql="delete from warehouse where id_product=".$idi;
						pdo_execute($sql);
						$sql="SELECT product_type.size from product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id  AND product.id=".$idi;
						$size_type=pdo_query_one($sql);
						if($size_type["size"]=="number") {
							for($i=35;$i<=46;$i++)
							{
								$sql="insert into warehouse(id_product,name,size,amount) values('$idi','$namesp','$i','0')";	
								pdo_execute($sql);		
							}
						}
						else {
							$sql="insert into warehouse(id_product,name,size,amount) values('$idi','$namesp','freesize','0')";	
							pdo_execute($sql);	
						}
						$_SESSION['thongbaoad']=3;	
						echo '<script>location.replace("server.php?category=qlsp");</script>';
					}else {
						$_SESSION['thongbaoad']=4;
						echo '<script>window.history.back();</script>';
					}	
				}
				else{
					if(isset($_POST['delImg'])) {
						$sql="update product set name='".$namesp."',price='".$price."',image='' where id=".$idi;	
					}else {
					move_uploaded_file($_FILES['fiximage']['tmp_name'],$file_path);
					$sql="update product set name='".$namesp."',price='".$price."',image='".$img."' where id=".$idi;	}
					pdo_execute($sql);		
					$_SESSION['thongbaoad']=3;	
					echo '<script>location.replace("server.php?category=qlsp");</script>';
				}
				}
				}
				else {
				$idi=$_POST['fixId'];
				$namesp=$_POST['fixname'];
				$price=$_POST['fixprice'];
				$img=$_FILES['fiximage']['name'];
				$type=$_POST['fixproductType'];
				$sql="SELECT product_type.name FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$idi;
				$res=pdo_query_one($sql);
				if($res["name"]!=$type){
					$check=true;
					$sql="select * from warehouse where id_product=".$idi;
					$warehouse=pdo_query($sql);
					foreach($warehouse as $db){
						if($db["amount"]!=0) {
							$check=false;
							break;
						}
					}
					if($check==true){
						$sql="SELECT category.id from category,product_type WHERE category.idProductType=product_type.id AND product_type.name='".$type."'";
						$category=pdo_query_one($sql);
						$id_category=$category["id"];
						
						if(isset($_POST['delImg'])) {
						$sql="update product set name='".$namesp."',price='".$price."',image='',id_category='".$id_category."' where id=".$idi;	
						} else {
						if($img=='') {$sql="update product set name='".$namesp."',price='".$price."',id_category='".$id_category."' where id=".$idi;	}
						else {$sql="update product set name='".$namesp."',price='".$price."',image='".$img."',id_category='".$id_category."' where id=".$idi;	}
						}	
						pdo_execute($sql);	
						
						$sql="delete from detail_product where id_product=".$idi;
						pdo_execute($sql);	
						$sql="SELECT properties_of_product_type.id_Properties FROM properties_of_product_type,category,product_type WHERE category.idProductType=product_type.id AND product_type.id=properties_of_product_type.id_ProductType AND category.id='".$id_category."'";
						$list=pdo_query($sql);
						foreach($list as $l){
							$properties=$l["id_Properties"];
							$sql="insert into detail_product(id_product,id_properties,id_detail_properties) values('$idi','$properties','0')";
							pdo_execute($sql);
						}
						$sql="delete from warehouse where id_product=".$idi;
						pdo_execute($sql);
						$sql="SELECT product_type.size from product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id  AND product.id=".$idi;
						$size_type=pdo_query_one($sql);
						if($size_type["size"]=="number") {
							for($i=35;$i<=46;$i++)
							{
								$sql="insert into warehouse(id_product,name,size,amount) values('$idi','$namesp','$i','0')";	
								pdo_execute($sql);		
							}
						}
						else {
							$sql="insert into warehouse(id_product,name,size,amount) values('$idi','$namesp','freesize','0')";	
							pdo_execute($sql);	
						}
						$_SESSION['thongbaoad']=3;	
						echo '<script>location.replace("server.php?category=qlsp");</script>';
					}else {
						$_SESSION['thongbaoad']=4;
						echo '<script>window.history.back();</script>';
					}	
				}
				else{
					if(isset($_POST['delImg'])) {
					$sql="update product set name='".$namesp."',price='".$price."',image='' where id=".$idi;	
					} else {
					if($img=='') {$sql="update product set name='".$namesp."',price='".$price."' where id=".$idi;	}
					else {$sql="update product set name='".$namesp."',price='".$price."',image='".$img."' where id=".$idi;	}
					}
					pdo_execute($sql);		
					$_SESSION['thongbaoad']=3;	
					echo '<script>location.replace("server.php?category=qlsp");</script>';
				}
			}
?>
