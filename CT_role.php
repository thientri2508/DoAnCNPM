<?php 
include 'pdo.php';
$id=$_REQUEST['id'];
$sql="SELECT category_admin.name FROM category_admin,job WHERE job.job=category_admin.id AND job.id_role='".$id."'";
$list=pdo_query($sql);
if(count($list)==0) echo '<h5 style="margin-top:20px; margin-left:90px; color: #FF0000">Quyền Này Không Có Chức Năng!</h5>';
foreach($list as $l){

	echo '<h5 style="margin-top:20px; margin-left:110px"><i class="fas fa-tasks"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$l["name"].'</h5>';
}
?>