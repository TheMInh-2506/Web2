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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./from/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    <link rel="stylesheet" href="./js/scripts.js">
</head>

<?php
include './inc/header-index.php';
?>


<?php

$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}

?>



<div class="login">
    <h1>Thông tin khách hàng </h1>
    <?php
    if (isset($insertCustomers)) {
        echo $insertCustomers;
    }
    ?>
    <form action="" method="POST">
        <table border="1">
        <?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
            <thead>
                <tr>
                    <td>Name</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $result['address'] ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $result['phone'] ?></td>
                </tr>
            </thead>
            <?php
					}
				}
				?>
        </table>
    </form>
</div>

<?php
include './inc/footer-index.php';
?>