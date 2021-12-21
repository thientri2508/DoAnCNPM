<?php
session_start();
include 'pdo.php';
$note = $_REQUEST["note"];
$supp = $_REQUEST["supp"];
$admin=$_SESSION['adminlogin'];
$name=$admin[7];
$date=date("Y-m-d");
$sql="insert into import(date_import,total,id_account,supplier,note,status) values('$date','0','$name','$supp','$note','Chưa xử lý')";
pdo_execute($sql);	
$sql="select * from import where id=(select MAX(id) from import)";
$id_imp=pdo_query_one($sql);
$id_import=$id_imp["id"];
foreach($_SESSION['myimport'] as $import){
$sql="insert into detail_import(id_import,id_product,size,amount,price,total) values('$id_import','$import[7]','$import[3]','$import[4]','$import[1]','$import[5]')";
pdo_execute($sql);
}
$_SESSION['myimport']=[];
$_SESSION['thongbaoad']=1;
echo '<script>location.replace("server.php?category=import&&act=CT_import");</script>';	
?>
