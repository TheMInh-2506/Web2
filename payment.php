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
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<?php
include './inc/header-index.php';
?>


<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

	// if(!isset($_GET['proid']) || $_GET['proid']==NULL){
 //       echo "<script>window.location ='404.php'</script>";
 //    }else{
 //        $id = $_GET['proid']; 
 //    }
 //    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct->add_to_cart($quantity, $id);
        
 //    }
?>
<style>
	h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
	}
	.wrapper_method {
	text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
	
    /* margin: 20px; */
    background: cornsilk;
	}
	.wrapper_method a {
    padding: 10px;
  
    background: red;
    color: #fff;
	border-radius: 8px;
	}
	.wrapper_method h3 {
   	 margin-bottom: 20px;
	}
		.wrapper_method p{
   	  background: red;
    color: #fff;
			 width: 135px;
			height: 40px;
			margin-left: 12em;
	border-radius: 8px;
	}
</style>
	<?php
		 	$money=round((Session::get('sum'))/23080,2);
											 ?>
	<script>
		
		
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'Af16QpJVK0zxHgWvM2gtLWD3O_55FoXSsRfsl-PQ1dAUX_MmF3OJ6IcSeIWXTqpzP0scdd_A7sasJ4Kj',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
	
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '<?php echo $money;?>',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
	 	<?php
		
	
			?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h1>Phương thức thanh toán</h1>
	    		</div>
	    		
	    		<div class="clear"></div>
	    		<div class="wrapper_method">
		    		<h3 class="payment">Chọn phương thức thanh toán của bạn</h3>
		    		<a href="offlinepayment.php">Offline Payment</a>
					<br><br>
		    		<p ><br>Online Payment <br></p><br>
					<div id="paypal-button"></div>
					<br>
		    		<a style="background:grey" href="cart.php"> << Quay về</a>
				
		    	</div>
    		</div>
	
 		</div>
 	</div>
	 

<?php
include './inc/footer-index.php';
?>