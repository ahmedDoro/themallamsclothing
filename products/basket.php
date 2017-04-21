<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
	}
	
	
?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Malam's Clothing</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand"><img src="products_images/logo1.PNG" style="width:35px; height:30px;" /></a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="#"><span class="glyphicon glyphicon-home"> Home</span></a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"> Products<span></a></li>
				</ul>
			</div>
		</div>
		<p><br /></p>
		<p><br /></p>
		<p><br /></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="paneel panel-primary">
						<div class="panel-heading">Basket Checkout</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-2"><b>Action</b></div>
								<div class="col-md-2"><b>Product Image</b></div>
								<div class="col-md-2"><b>Product Name</b></div>
								<div class="col-md-2"><b>Price ₦</b></div>
								<div class="col-md-2"><b>Quantity</b></div>
								<div class="col-md-2"><b>Total price ₦</b></div>
							</div>
							<div id= "basket_checkout">
							</div>
							
							<!--<div class='row'>
								<div class='col-md-2'>
									<div class='btn-group'>
									<a href='#' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span><a/>
									<a href='#' class='btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span><a/>
									</div>
								</div>
								<div class='col-md-2'><img src='produts_images/$pro_image'></div>
								<div class='col-md-2'>$pro_name</div>
								<div class='col-md-2'>$qty</div>
								<div class='col-md-2'><input type='text' class='form-control' value='$pro_price' disabled></div>
								<div class='col-md-2'><input type='text' class='form-control' value='$qty' disabled></div>
								<div class='col-md-2'><input type='text' class='form-control' value='$total_amt' disabled></div>
							</div> -->
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
			</div>