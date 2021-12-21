<form action="test.php" method="post" enctype="multipart/form-data">
<input type="file" name="file[]" multiple  />
<input type="submit" name="upload" value="Upload File"  />
</form>
<?php
$folder_path='img/';
if(isset($_POST['upload'])){
	$ex = array('jpg','png','jpeg');
	$file_name=$_FILES['file']['name'];
	$file_size=$_FILES['file']['size'];
	$tmp_name=$_FILES['file']['tmp_name'];
	for($i=0; $i<count($file_name);$i++)
	{
		$flag=true;
		$file_path = $folder_path.$file_name[$i];
		if(file_exists($file_path)) $flag=false;
		$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
		if(!in_array($file_type,$ex)) $flag=false;
		if($file_size[$i]>500000) $flag=false;
		if($flag) move_uploaded_file($tmp_name[$i],$file_path);
	}
}
?>
