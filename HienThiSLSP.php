<?php
$id=$_REQUEST['id'];
$size=$_REQUEST['size'];
include "pdo.php";
if($size=='freesize') {$sql="select amount from warehouse where id_product=".$id;}
else { $sql="select amount from warehouse where id_product=".$id." AND size='".$size."'";}
$sl=pdo_query_one($sql);
extract($sl);
echo '<tr>';
$count=0;
$d=$amount;
for($i=1;$i<=12;$i++)
{
	$count++;
	if($d>0) {echo '<td style="width:52px; height:51.2px" id="sl-'.$i.'" onclick="selectSoLuong(this.id)">'.$i.'</td>';}
	else {echo '<td style="width:52px; height:51.2px; opacity:0.2" id="sl-'.$i.'" >'.$i.'</td>';}
	if($i==12) { echo '</tr>';
		break;}
	if($count==4) { echo '</tr><tr>';
		$count=0;}
	$d--;
}
?>
