<?php
if(isset($_REQUEST['size'])) {
$id = $_REQUEST["id"];
$size = $_REQUEST["size"];
session_start();
$i=1;
foreach($_SESSION['mycart'] as &$sp)
{
	if($i==$id) { $sp[3]=$size;
	$sp[4]=1;
	$sp[5]=$sp[1];
	break;}
	$i++;
}
unset($sp);
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[5];
}
echo '<b>'.number_format($tt).' VND</b>';
}
else if(isset($_REQUEST['sl'])) {
$id = $_REQUEST["id"];
$sl = $_REQUEST["sl"];
session_start();
$i=1;
foreach($_SESSION['mycart'] as &$sp)
{
	if($i==$id) {$sp[4]=$sl;
	$t=$sl*$sp[1];
	$sp[5]=$t;
	break;}
	$i++;
}
unset($sp);
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[5];
}
echo '<b>'.number_format($tt).' VND</b>';
}
?>
