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

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    echo "<script>window.location ='404.php'</script>";
} else {
    $id = $_GET['proid'];

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quantity = $_POST['quantity'];
    $AddtoCart = $ct->add_to_cart($quantity, $id);
    
}
?>

<body>

        <?php

		$get_product_details = $product->get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()){
		

		?>
    <div class="container">
        <h2>Chi tiết sản phẩm</h2>
        <div id="product-detail">
            <div id="product-img" style="margin-left: 1em">
                <img src="admin/uploads/<?php echo $result_details['image'] ?>" />
            </div>
            <div id="product-info" style="float: left;text-align: left;margin-top: 15px;
    margin-left: 15px;
    width: 300px;">
                <h2 style="margin: 40px;text-align: left;"><?php echo $result_details['productName'] ?></h2>
                <label>Giá: </label><span class="product-price"><?php echo number_format($result_details['price'], 0, ",", ".")." VND" ?></span><br/>
                <p><?php echo $fm->textShorten($result_details['product_desc'], 20); ?></p><br>

                <form id="add-to-cart-form" action="" method="post">
                    <input type="number" value="1" name="quantity" min="1" style="width: 137px" /><br />
                    <input type="submit" name="submit" value="Mua sản phẩm" />
                    
                </form>
                <?php
                    if(isset($AddtoCart)){
					
             
                	header('Location: cart.php');
						
						
					}
                    ?>
                <!-- <div id="gallery">
                    <ul>

                        <li><img src="" /></li>

                    </ul>
                </div> -->
                <?php
            }
        }
                ?>
					

            </div>
			<div style="text-align: center;float: right;font-size: 20px">
		Các món khác
				<br>
				<br>
			
		<a href="index.php#wrapper-product"><img src="thuduc5.jpg"; height="100px"; width="220px"; style="border: 1px solid #000000; transition-delay: 2s; cursor: pointer"   onmouseover="admin/uploads/e7b239a24f.png"   onmouseout="admin/uploads/e7b239a24f.png"   ></a>
				<br>
				<a href="index.php#wrapper-product"><img src="thuduc5.jpg"; height="100px"; width="220px"; style="cursor: pointer;border: 1px solid #000000; transition-delay: 2s;"   onmouseover="admin/uploads/e7b239a24f.png"   onmouseout="admin/uploads/e7b239a24f.png"   ></a>
			
			</div>
			<br>
			<br>
				<br>
				<br>
			<table bordercolor="#FFFFFF"; style="margin: 8em 0 2em 0;" >
					<th style="color: black ;font-size: 2em;float: left;padding-left: 1em;border-bottom:  solid #FFFFFF 5px">Giới thiệu chi tiết món</th>
				<th style="color: black;font-size: 2em;text-align: left;border-bottom:  solid #FFFFFF 5px">Giá trị dinh dưỡng</th>
				<tr>
						
					<td style="width: 682px;padding-left: 1em;;margin: 1em;border-right: solid #FFFFFF 5px;">Theo truyền thống, miếng pho mát thường được đặt bên trên miếng thịt. Người ta thường cho thêm pho mát vào miếng thịt bò xay đang nấu trong thời gian ngắn (trước khi phục vụ), điều này tạo điều kiện cho pho mát tan chảy. Ngoài ra, hamburger pho mát cũng có những biến tấu khác nhau về kết cấu, thành phần hoặc là cách bố trí. Cũng giống như nhiều loại hamburger khác, một chiếc bánh hamburger pho mát có thể bao gồm các topping như xà lách, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, sốt mayonnaise, tương cà và mù tạt.</td>
				
							<td style="width: auto; float: left;padding-left: 1em">Trong 1 cái bánh hamburger gà cỡ nhỏ chứa khoảng 390 calo; nhưng hamburger gà cỡ lớn thì có chứa đến 600 kcal.
					
					
					
					
					
					
					</td>
					
						</tr>
					
					</table>
            <div class="clear-both"></div>
			 <div class="clear-both"></div>

        </div>
    </div>
</body>

</html>
<?php
include './inc/footer-index.php';
?>