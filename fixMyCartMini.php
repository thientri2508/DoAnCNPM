<?php
if(isset($_REQUEST['size'])) {
$id = $_REQUEST["id"];
$size = $_REQUEST["size"];
session_start();
$i=1;
foreach($_SESSION['mycartMini'] as &$sp)
{
	if($i==$id) { $sp[3]=$size;
	$sp[4]=1;
	$sp[5]=$sp[1];
	break;}
	$i++;
}
unset($sp);
foreach($_SESSION['mycartMini'] as $sp) {
	echo '<div style="width:100%">
     <div style="float:left; width:77px; margin-top:7px; height:77px; background:#E8E8E8">
	<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
	</div>
      <div style="float:left; width:64%; margin-top:7px; margin-left:12px">
      <div style="font-size:13px; color:#000"><b>'.$sp[0].'</b></div>
       <div style="font-size:11px; margin-top:12px; color:#000"><b>'.number_format($sp[1]).' VND</b></div>
       <div style="width:100%; height:15px">
      <div style="font-size:11px; float:left; color:#000">Size:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[3].'</div>
       </div>
       <div style="width:100%; height:15px; clear:both;">
         <div style="font-size:11px; float:left; color:#000">Số lượng:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[4].'</div>
        </div>
        </div>
       <div style="width:100%; border-top: dashed 2px #000; clear:both"></div>
        </div>';
}
}
else if(isset($_REQUEST['sl'])) {
$id = $_REQUEST["id"];
$sl = $_REQUEST["sl"];
session_start();
$i=1;
foreach($_SESSION['mycartMini'] as &$sp)
{
	if($i==$id) {$sp[4]=$sl;
	$t=$sl*$sp[1];
	$sp[5]=$t;
	break;}
	$i++;
}
unset($sp);
foreach($_SESSION['mycartMini'] as $sp) {
	echo '<div style="width:100%">
     <div style="float:left; width:77px; margin-top:7px; height:77px; background:#E8E8E8">
	<img src="photo/'.$sp[2].'" style="width:100%; height:100%" />
	</div>
      <div style="float:left; width:64%; margin-top:7px; margin-left:12px">
      <div style="font-size:13px; color:#000"><b>'.$sp[0].'</b></div>
       <div style="font-size:11px; margin-top:12px; color:#000"><b>'.number_format($sp[1]).' VND</b></div>
       <div style="width:100%; height:15px">
      <div style="font-size:11px; float:left; color:#000">Size:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[3].'</div>
       </div>
       <div style="width:100%; height:15px; clear:both;">
         <div style="font-size:11px; float:left; color:#000">Số lượng:</div>
         <div style="font-size:11px; float:right; color:#000">'.$sp[4].'</div>
        </div>
        </div>
       <div style="width:100%; border-top: dashed 2px #000; clear:both"></div>
        </div>';
}
}
?>
