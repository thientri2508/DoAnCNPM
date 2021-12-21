<?php
    if(isset($_SESSION['userlogin'])){
        $user=$_SESSION['userlogin'];
        $sql="select * from account where id=".$user[7];
        $acc=pdo_query_one($sql);
        extract($acc);
    }else {
    echo '<script>location.replace("mensport.com");</script>';
}
?>
<script>
    document.getElementById("myaccount").style.background='#E8E8E8';
function changeAddr(){
    window.location.assign("mensport.com?profile&deliveryAddress");
}
</script>
<div style="width:100%; height:80%; margin-top:50px; background: #E8E8E8">
    <h3 style="margin-top:20px; padding-top:20px; padding-left:40px">Thông Tin Tài Khoản</h3>
    <p style="margin-left:40px; margin-top:40px; font-size:17px"><b>Họ Tên:</b> <?php echo $fullname; ?></p>
    <p style="margin-left:40px; font-size:17px"><b>Email:</b> <?php echo $username; ?></p>
    <p style="margin-left:40px; font-size:17px"><b>Số Điện Thoại:</b> <?php echo $phone; ?></p>
    <p style="margin-left:40px; margin-top:60px; font-size:17px"><b>Địa Chỉ Giao Hàng Mặc Định</b></p>
    <p style="margin-left:40px; font-size:17px"><?php echo $user[4] ?></p>
    <p class="changeAddr" onclick="changeAddr()"><i>Thay Đổi</i></p>
</div>
<style>
.changeAddr{
    margin-left:40px; 
    font-size:17px;
    cursor: pointer;
    width:80px;
}    
.changeAddr:hover{
    color: #fd7e14
}
</style>