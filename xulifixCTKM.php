<?php
session_start();
include 'pdo.php';
$id=$_POST['id'];
$name=$_POST['namect'];
$start=$_POST['start'];
$end=$_POST['end'];
$sql="update promotions set name='".$name."',date_begin='".$start."',date_end='".$end."' where id=".$id;
pdo_execute($sql);
$sql="delete from set_promotions where id_promotions=".$id;
pdo_execute($sql);
$sql="select * from promotions_content";
$content=pdo_query($sql);
foreach($content as $c){
	$IDcontent=$c["id"];
	if(isset($_POST['content-'.$IDcontent])) {
		$sql="insert into set_promotions(id_promotions,id_content) values('$id','$IDcontent')";
		pdo_execute($sql);
	}
}
$_SESSION['thongbaoad']=6;
echo '<script>location.replace("server.php?category=ctkm");</script>';	
?>