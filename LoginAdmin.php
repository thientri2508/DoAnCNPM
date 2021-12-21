<link href="fontawesome/css/all.css" rel="stylesheet">
<link href="Style.css" rel="stylesheet" type="text/css" />
<script>
function ktDN(){
var check=true;
var c1=[];
c1=document.getElementById("Username").value;
var c2=[];
c2=document.getElementById("Password").value;
for(var i=0;i<c1.length;i++)
{
	if(c1[i]=="'"||c1[i]=='"') 
	{
		check=false;
		break;
	}
}
for(var i=0;i<c2.length;i++)
{
	if(c2[i]=="'"||c2[i]=='"') 
	{
		check=false;
		break;
	}
}
if(check==false){
	document.getElementById("loginError").style.display="block";
}
return check;
}
</script>
<body>
<?php
if(isset($_SESSION['adminlogin'])) unset($_SESSION['adminlogin']);
?>
<div class="serverLogin">

		<h1 class="titleServer">Men'Sport Admin Server</h1>

  <div class="main-w3layouts-agileinfo">
		<h2 class="ServerForm">Fill out the form below to login</h2>
        <form action="server.php" method="post">
        <div class="form-sub-w3">
			<input type="text" name="Username" id="Username" placeholder="Username " class="form-sub-w3-text" />
			<div class="icon-w3">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
		</div>
        <div class="form-sub-w3">
			<input type="password" name="Password" id="Password" placeholder="Password" class="form-sub-w3-text" />
			<div class="icon-w3">
				<i class="fa fa-unlock-alt" aria-hidden="true"></i>
			</div>
		</div>
        <div class="submit-agileits">
			<input type="submit" value="Login" class="submit-agileits-submit" onclick="return ktDN();" name="login">
		</div>
        </form>
        <h3 style="width:90%; text-align:center; color:#FF0000; margin:auto; margin-top:40px; display:none" id="loginError"><i class="fas fa-bug"></i>&nbsp;Sai tên đăng nhập hoặc mật khẩu!&nbsp;<i class="fas fa-bug"></i></h3>
    </div>
</div>
