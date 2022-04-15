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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
   <script src="js/scripts.js"></script>

</head>

<?php
//  $s=0;
include './inc/header-index.php';
?>

<?php

	
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_click'])) {
   $note=$_POST['note'];
    $_SESSION['note']=$note;

	$updateCustomers = $cs->update_customer($_POST);
	
}

	

if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
  
	if (isset($_SESSION['note']) ) {
        
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id,$_SESSION['note']);
  
    $delCart = $ct->del_all_data_cart();
     echo'<script>
window.location="success.php";
</script>';
	}else
	{
	     $note='';
		 $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id,$note);
       
    $delCart = $ct->del_all_data_cart();
      echo'<script>
window.location="success.php";
</script>';
	}
}
?>


<form action="" style="margin: 10em">
    <div class="cart" style=" margin: 50px 50px 50px 10px ">

        <form action="">
            <?php
            if (isset($update_quantity_cart)) {
                echo $update_quantity_cart;
            }
            ?>
            <?php
            if (isset($delcart)) {
                echo $delcart;
            }
            ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>STD</th>
                        <th width="20%">Tên sản phẩm </th>
                        <th>Giá sản phẩm </th>
                        <th>Số lượng sản phẩm </th>
                        <th>Tổng giá sản phẩm </th>
                    </tr>
                </thead>
                <?php
                $id = Session::get('customer_id');
                $get_product_cart = $ct->get_product_cart();
                if ($get_product_cart) {
                    $subtotal = 0;
                    $qty = 0;
                    $i = 0;
                    while ($result = $get_product_cart->fetch_assoc()) {
                        $i++;
                ?>
                        <tbody>
                            <tr>
                                <th><?php echo $i ?></th>
                                <th><?php echo $result['productName'] ?></th>

                                <th><?php   echo number_format($result['price'], 0, ",", ".") . ' ' . 'VND' ?></th>
                                <th>
                                    <?php echo $result['quantity'] ?>
                                </th>
                                <th><?php
                                    $total = $result['price'] * $result['quantity'];
                                    echo number_format($total, 0, ",", ".").' ' . 'VND';

                                    // if($result['productName']){
                                    //     $s++;
                                    // }
                                    ?></th>
                            </tr>

                        </tbody>


                <?php
                        $subtotal += $total;
                        // $qty = $s;
                        $qty = $qty + $result['quantity'];
                    }
                }
                ?>
                <?php
                $check_cart = $ct->check_cart();
                if ($check_cart) {
                ?>
                    <tr>
                        <th>
                            Tổng hóa đơn:
                        </th>
                        <th>
                            <?php  echo number_format($subtotal, 0, ",", ".") . ' ' . 'VND'; 
                            Session::set('sum', $subtotal);
                            Session::set('qty', $qty);
                            ?>
                        </th>
						
				
                <?php
                } else { ?>

                    <tr>
                        <th>
                            Tổng hóa đơn:
                        </th>
                        <th>
                            0 . Đ
                        </th>
						<th></th>
                    </tr>
                <?php }
                ?>
				
            </table>

        </form>
		<script>function loadupdate()
{
	document.getElementById("updateform").style.display="block";
	
}</script>
		<button style="border-radius: 10px;
    margin: 1em 69em;" onClick="loadupdate()" type="button">Chỉnh sửa thông tin</button>
    </div>
	<hr>
	
	<form action="" method="post" style="text-align: center;
    width: 570px;
    padding-left: 30em; display:none"id="updateform" >
	 <?php
                      if (isset($updateCustomers)) {
		echo '<script>

	document.getElementById("updateform").style.display="block";
	
</script>';
        echo $updateCustomers;
						 
	
    }
		?>
               
                    <div><label>Điện thoại: </label><input type="text" value="" name="phone" /></div>
                    <div><label>Địa chỉ: </label><input type="text" value="" name="address" /></div>
                    <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7" ></textarea></div>
                    <input type="submit" name="update_click" value="Cập nhật" />
                </form>

    <div class="payment">
        <h1><a href="?orderid=order">Order Now</a></h1>
    </div>

</form>


<?php
include './inc/footer-index.php';
?>