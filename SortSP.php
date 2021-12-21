<?php
include 'pdo.php';
$t=$_REQUEST['t'];
if($t=='sort1'){
	$sql="select * from product where del!='del' order by id ASC";
}
if($t=='sort2'){
	$sql="select * from product where del!='del' order by price ASC";
}
if($t=='sort3'){
	$sql="select * from product where del!='del' order by id DESC";
}
if($t=='sort4'){
	$sql="select * from product where del!='del' order by price DESC";
}
$list=pdo_query($sql);
$s1='<div style="width:100%; height:130px; background-color: #d1e7dd;">';
$s2='<div style="width:100%; height:130px; background-color: #bcd0c7;">';
$i=0;
foreach($list as $sp){
			extract($sp);
		  if($i%2==0) {echo $s1;}
		  else {echo $s2;}
		  echo '<div style="width:8%;padding-left:15px" class="listItem"><b>'.$id.'</b></div>
        <div style="width:11%; background:#fff" class="listItem">
		<img src="photo/'.$image.'" style="width:100%; height:100%" />		
        </div>
        <div style="width:30%; padding-left:30px;" class="listItem"><b>'.$name.'</b></div>
        <div style="width:18%;padding-left:20px;" class="listItem"><b>'.$price.'</b></div>
        <div style="width:12%;padding-left:20px;" class="listItem"><b>'.$id_name.'</b></div>
        <div style="width:10%" class="listItem">
        	<a href="server.php?category=qlsp&&act=fixSP&&ID='.$id.'"><img src="photo/fix.png" class="fix"  /></a>
        </div>
        <div style="width:11%" class="listItem">
        	<img src="photo/del.png" class="fix" style="margin-left:40px" onclick="xoaSP('.$id.')" />
        </div>
    </div>';
	$i++;
	}

?>
