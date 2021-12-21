<?php
session_start();
$tt=0;
foreach($_SESSION['mycart'] as $sp)
{
	$tt+=$sp[5];
}
echo '<b>'.number_format($tt).' VND</b>';
?>
