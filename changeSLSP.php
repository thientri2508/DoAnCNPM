<?php
include 'pdo.php';
session_start();
$id=$_POST['idSP'];
$sql="SELECT product_type.size FROM product_type,category,product WHERE product.id_category=category.id AND category.idProductType=product_type.id AND product.id=".$id;
$size=pdo_query_one($sql);
if($size["size"]=='number') {
    for($i=35;$i<=46;$i++)
    {
        $sl=$_POST['number-'.$i];
        if($sl=='') $sl=0;
        $sql="update warehouse set amount='".$sl."' where id_product=".$id." AND size='".$i."'";
        pdo_execute($sql);
    }
}else{
    $sl=$_POST['freesize'];
    if($sl=='') $sl=0;
    $sql="update warehouse set amount='".$sl."' where id_product=".$id;
    pdo_execute($sql);
}
$_SESSION['thongbaoad']=1;
echo '<script>location.replace("server.php?category=import");</script>';
?>