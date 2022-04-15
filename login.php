<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./from/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="css/login.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"> </script>
   
	

	<title>Đăng Nhập</title>

</head>

<?php
include './inc/header-index.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check) {
   header('Location:cart.php');
} 
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertCustomers = $cs->insert_customers($_POST);
}

?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $login_Customers = $cs->login_customers($_POST);
}
?>

<div class="login" id="form-dangky">
    <h1>ĐĂNG KÝ</h1>
    <?php
    if (isset($insertCustomers)) {
		
        echo $insertCustomers;
	
    }else{
		echo '<script type="text/javascript" language="javascript">
		
			document.getElementById("form-dangky").style.display="none";
	
	</script>';
	}
    ?>
    <form action="" method="POST">
        <table width="261" style="">
            
                <tr>
                    <th width="360">Nhập tên : <input type="text" name="name" placeholder="Enter Name..."></th>
                </tr>

                <tr>
                    <th>Nhập email : <input type="text" name="email" placeholder="Enter Email..."></th>
                </tr>
                <tr>
                    <th>Nhập địa chỉ : 
                      <input type="text" name="address" placeholder="Enter Address..."></th>
                </tr>
                <tr>
                    <th>Nhập số điện thoại : <input type="text" name="phone" placeholder="Enter Phone..."></th>
                </tr>
                <tr>
                    <th>Nhập mật khẩu : <input type="password" name="password" placeholder="Enter Password..."></th>
                </tr>
                <tr>
                    <th style="padding-left: 0.7em;"><input type="submit" name="submit"  value="Đăng ký">
						
					<button onClick="loadregis1()" style="margin:  1em;">Quay lại đăng nhập</button>
					</th>
                </tr>
     
        </table>
    </form>
</div>
<div class="login_panel" id="form-login">
    <h1>ĐĂNG NHẬP</h1>
    <form action="" method="POST">
        <?php
        if (isset($login_Customers)) {
            echo $login_Customers;
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nhập vào Email : <input type="text" name="email" class="field" placeholder="Enter Email...."></th>

                </tr>
                <tr>
                    <th>Nhập Password : <input type="password" name="password" class="field" placeholder="Enter Password...."></th>
                </tr>
                <tr>
                    <th>
                        <div class="buttons">
                            <div><input type="submit" name="login" class="grey" value="Đăng Nhập">
							  <button type="button" id="btn-dangky" onClick="loadregis()" >Đăng ký</button></div>
                        </div>
                    </th>
                </tr>
            </thead>

        </table>
    </form>
</div>
		<script type="text/javascript" language="javascript" src="js/login.js"></script>
<?php
include './inc/footer-index.php';
?>