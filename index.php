<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<script type="text/javascript" language="javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Hamburger</title>

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

include('standard.php');

?>

<?php

	   $param = "";
    $sortParam = "";
    $orderConditon = "";
    //Tìm kiếm
	$search = isset($_GET['name']) ? $_GET['name'] : "";
    if ($search) {
        $where = "WHERE `name` LIKE '%" . $search . "%'";
        $param .= "name=".$search."&";
        $sortParam =  "name=".$search."&";
    }
	    //Sắp xếp
    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
    if(!empty($orderField)
        && !empty($orderSort)){
        $orderConditon = "ORDER BY `".$orderField."` ".$orderSort;
        $param .= "field=".$orderField."&sort=".$orderSort."&";
    }

	include 'connect_db.php';
	
	 $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
	
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;

	
        if ($search) {
			$query="SELECT * FROM `tbl_product` WHERE `productName` LIKE '%" . $search . "%' ".$orderConditon."  LIMIT " . $item_per_page . " OFFSET " . $offset;
			
            $products = mysqli_query($con, $query);
			//echo($query);exit();
            $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_product` WHERE `productName` LIKE '%" . $search . "%'");
        } else {
			$query="SELECT * FROM `tbl_product` ".$orderConditon." LIMIT " . $item_per_page . " OFFSET " . $offset;
            $products = mysqli_query($con,$query);
            $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_product`");
			
        }
        $totalRecords = $totalRecords->num_rows;

        $totalPages = ceil($totalRecords / $item_per_page);
        ?>

<div id="wrapper-product" class="container">
            <h1 style="font-family:Georgia,'Times New Roman',Times,serif">Danh sách sản phẩm</h1>
            <div id="filter-box">
                <form id="product-search" method="GET" action="">
                    <label style="">Tìm kiếm sản phẩm</label>
                    <input type="text" value="" name="name" placeholder="Tìm kiếm"/>
                    <input type="submit" value="Tìm kiếm" />
               	 </form>
                 <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                 <option value="">Sắp xếp giá</option>
                    <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=price&sort=desc">Cao đến thấp</option>
                    <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=price&sort=asc">Thấp đến cao</option>
                </select>
				
                <div style="clear: both;" ></div>
            </div>
            <div class="product-items" >
                <?php
                $show_product = $product->show_productindex($query);
                if($show_product){
                    while($result = $show_product->fetch_assoc()){

                ?>
                    <div class="product-item" style="background-color: #fff;">
                        <div class="product-img">
                            <a href="details.php?proid=<?php echo $result['productid'] ?>" title=""><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                        </div>
                        <strong><a href="details.php?proid=<?php echo $result['productid'] ?>"><?php echo $result['productName'] ?></a></strong><br/>  
                        <label>Giá: </label><span class="product-price"><?php echo number_format($result['price'], 0, ",", ".")." VND" ?></span><br/>
                        <p><?php echo $fm->textShorten($result['product_desc'], 20); ?></p>
                        <div class="buy-button">
                            <a href="details.php?proid=<?php echo $result['productid'] ?>">Mua sản phẩm</a>
                        </div>
                    </div>
                    <?php
				}
			}
				?>
                <div class="clear-both"></div>
                
             <?php
                include 'pagination.php';
                ?>
                <div class="clear-both"></div>
				
            </div>
	
        </div>

<?php
include './inc/footer-index.php';
?>