<?php
session_start();
include "dbconnect.php";
	
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query);
	
	echo "<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Categories</h4></a></li> ";
	
	if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$cid = $row["cat_id"];
				$cat_name = $row["cat_title"];
				
				echo " 
				<li><a href'#' cid='$cid' class='category'>$cat_name</a></li>
				";
			}
			echo "</div>";
	}
	
}

	
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	
	echo "<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Brands</h4></a></li> ";
	
	if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$bid = $row["brand_id"];
				$brand_name = $row["brand_title"];
				
				echo " 
				<li><a href'#' bid='$bid' class='selectBrand'>$brand_name</a></li>
				";
			}
			echo "</div>";
	}
	
}
if(isset($_POST["getProduct"])){
	$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
	$run_query = mysqli_query($con, $product_query);
	if(mysqli_num_rows($run_query)> 0){
		
		while($row = mysqli_fetch_array($run_query)){
			$product_id = $row["product_id"];
			$product_cat = $row["product_cat"];
			$product_brand = $row["product_brand"];
			$product_title= $row["product_title"];
			$product_price = $row["product_price"];
			$product_image = $row["product_image"];
			
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-headin'>$product_title</div>
						<div class='panel-body'>
							<img src='products_images/$product_image' style='width:180px; height:250px;'/>
						</div>
						<div class='panel-heading'>	&#8358;$product_price.00
							<button pid='$product_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Add to Basket</button>
						</div>
						</div>
				</div>
			";
			
		}
	}
	
}
if(isset($_POST["get_selected_category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat='$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand='$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keyword LIKE '%$keyword%'";		
	}
	$run_query =mysqli_query($con, $sql);
	while($row= mysqli_fetch_array($run_query)){
			$product_id = $row["product_id"];
			$product_cat = $row["product_cat"];
			$product_brand = $row["product_brand"];
			$product_title= $row["product_title"];
			$product_price = $row["product_price"];
			$product_image = $row["product_image"];
			
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-headin'>$product_title</div>
						<div class='panel-body'>
							<img src='products_images/$product_image' style='width:180px; height:250px;'/>
						</div>
						<div class='panel-heading'>	&#8358;$product_price.00
							<button pid='$product_id' id='product' style='float:right;' class='btn btn-danger btn-xs'>Add to chart</button>
						</div>
						</div>
				</div>
			";
		}
	}
	if(isset($_POST["addToBasket"])){
	
		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM basket WHERE p_id='$p_id' AND user_id='$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count >0){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Product is already in your basket</b>
			</div>
			";
		} else {
			$sql = "SELECT * FROM products WHERE product_id='$p_id'";
			$run_query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($run_query);
			$id = $row["product_id"];
			$pro_name = $row["product_title"];
			$pro_price = $row["product_price"];
			$pro_image = $row["product_image"];
			$sql ="INSERT INTO `basket` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price');";
			if(mysqli_query($con,$sql)){
				echo "
				<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Product $pro_name is added to your basket</b>
			</div>
			";
			}
		}
	}
	if(isset($_POST["getBasket_Product"]) || isset($_POST["basket_checkout"])){
		$uid = $_SESSION["uid"];
		$sql = "SELECT * FROM basket WHERE user_id='$uid'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count >0){
			$number = 1;
			$total_amt = 0;
			while($row = mysqli_fetch_array($run_query)){
				$id = $row["id"];
				$pro_id = $row["p_id"];
				$pro_name = $row["product_title"];
				$pro_image = $row["product_image"];
				$qty = $row["qty"];
				$pro_price = $row["price"];
				$total = $row["total_amt"];
				$price_array = array($total);
				$total_sum = array_sum($price_array);
				$total_amt = $total_amt + $total_sum;
				if(isset($_POST["getBasket_Product"])){
				echo "<div class='row'>
						<div class='col-md-3'>$number</div>
						<div class='col-md-3'><img src='products_images/$pro_image' width='60px' height='50px'></div>
						<div class='col-md-3'>$pro_name</div>
						<div class='col-md-3'>&#8358;$pro_price</div>
					</div>
				";
				$number ++;
				}
				else {
					echo "
					<div class='row'>
							<div class='col-md-2 col-sm-2'>
								<div class='btn-group'>
									<a href='#' remove_id='$pro_id' class='btn btn-danger btn-xs remove'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='' update_id='$pro_id' class='btn btn-primary btn-xs update'><span class='glyphicon glyphicon-ok-sign'></span></a>
								</div>
							</div>
							<div class='col-md-2 col-sm-2'><img src='products_images/$pro_image' width='50px' height='60'></div>
							<div class='col-md-2 col-sm-2'>$pro_name</div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
						</div>
				";
				}
			}
		
		if(isset($_POST["basket_checkout"])){
			echo "<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-4'>
					<h1>Total &#8358;$total_amt</h1>
				</div>";
		}
		echo '
		
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				  <input type="hidden" name="cmd" value="_cart">
				  <input type="hidden" name="business" value="shoppingcart@khanstore.com">
				  <input type="hidden" name="upload" value="1">';
				  
				  $x=0;
				  $uid = $_SESSION["uid"];
				  $sql = "SELECT * FROM basket WHERE user_id = '$uid'";
				  $run_query = mysqli_query($con,$sql);
				  while($row=mysqli_fetch_array($run_query)){
					  $x++;
				 echo  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
				  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
				  
				  }
				  
				echo   '
				<input type="hidden" name="return" value="payment_success.php"/>
				<input type="hidden" name="cancel_return" value="cancel.php"/>
				<input type="hidden" name="currency_code" value="NAIRA"/>
				<input type="hidden" name="custom" value="'.$uid.'"/>
				<input style="float:right;margin-right:10px;" type="image" name="submit"
					src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
					alt="PayPal - The safer, easier way to pay online">
				</form>';
		
		}
		
	}
	
	
if(isset($_POST["basket_count"]) AND isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM basket WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST["removeFromCart"])){
	$pid = $_POST["removeId"];
	$uid = $_SESSION["uid"];
	$sql = "DELETE FROM basket WHERE user_id = '$uid' AND p_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product is Removed from Cart Continue Shopping..!</b>
			</div>
		";
	}
}

if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "UPDATE basket SET qty = '$qty',price='$price',total_amt='$total' 
	WHERE user_id = '$uid' AND p_id='$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product is Updated Continue Shopping..!</b>
			</div>
		";
	}
}
	
?>