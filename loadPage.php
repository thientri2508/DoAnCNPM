<?php
session_start();
$p = $_REQUEST["p"];
$sotrang = $_REQUEST["sotrang"];
$prePage = $_REQUEST["pre"];
$lastPage = $_REQUEST["last"];
if($lastPage>$sotrang) {$lastPage=$sotrang;}
echo '<div class="page" style="border:solid 3px" onclick="Prepage(this.id)" id="page-'.($prePage-1).'"><i class="fas fa-angle-double-left" style="margin-top:10px"></i></div>';
for($i=$prePage;$i<=$lastPage;$i++)
{
	if($i==$p) echo '<div class="page" id="page-'.$i.'" onclick="pagination(this.id);nextPage(this.id);" style="background:#ee4266; color:#FFF">'.$i.'</div>';
	else echo '<div class="page" id="page-'.$i.'" onclick="pagination(this.id);nextPage(this.id);" style="background:#FFF; color:#000">'.$i.'</div>';
}
echo '<div class="page" style="border:solid 3px" onclick="Lastpage(this.id)" id="page-'.($lastPage+1).'"><i class="fas fa-angle-double-right" style="margin-top:10px" ></i></div>';
?>
