<?php
session_start();
include 'pdo.php';
$name=$_POST['namect'];
$start=$_POST['start'];
$end=$_POST['end'];
$sql="insert into promotions(name,date_begin,date_end,status,fix) values('$name','$start','$end','off','on')";
pdo_execute($sql);
$sql="select * from promotions where id=(select MAX(id) from promotions)";
$t=pdo_query_one($sql);
$id=$t["id"];
$sql="select * from promotions_content";
$content=pdo_query($sql);
foreach($content as $c){
	$IDcontent=$c["id"];
	if(isset($_POST['content-'.$IDcontent])) {
		$sql="insert into set_promotions(id_promotions,id_content) values('$id','$IDcontent')";
		pdo_execute($sql);
	}
}
$_SESSION['thongbaoad']=5;
echo '<script>location.replace("server.php?category=ctkm");</script>';	
?>