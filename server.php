<?php 
include 'pdo.php';
session_start();
if(isset($_POST['login'])&&($_POST['login'])){
$user=$_POST['Username'];
$pass=md5($_POST['Password']);
$sql="select * from account";
$acc=pdo_query($sql);
$check=0;
foreach($acc as $tk){
	extract($tk);
	if(($user==$username&&$pass==$password&&$role=="admin"&&$del!="del")||($user==$username&&$pass==$password&&$role=="staff"&&$job!=""&&$del!="del")) {
		$_SESSION['adminlogin']=array($username,$password,$fullname,$phone,$address,$role,$datesignup,$id);
		echo '<script>location.replace("server.php?TrangChu");</script>';
		$check=1;
		}
	}
	if($check!=1) {include 'LoginAdmin.php';
	echo '<script>document.getElementById("loginError").style.display="block";</script>';}
}
else if(isset($_GET['TrangChu'])){
	if(!isset($_SESSION['adminlogin'])) {
		include 'LoginAdmin.php';
	}
	else include 'admin.php';
}
else if(isset($_GET['category'])){
	if(!isset($_SESSION['adminlogin'])) {
		include 'LoginAdmin.php';
	}
	else include 'admin.php';
}
else {include 'LoginAdmin.php';}
?>
