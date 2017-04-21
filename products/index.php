<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location: profile.php");
}
?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Malam's Clothing</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		 <link rel="shortcut icon" href="favicon.png">
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
					<li><a href="../index.html"><span class="glyphicon glyphicon-home"> Home</span></a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"> Products<span></a></li>
					<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
					<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart" ></span>Basket<span class="badge">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">S/N</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price $</div>
									</div>									
								</div>
								<div class="panel-body"></div>
								<div class="panel-footer"></div>
								
							</div>
						</div>
					</li>
					<li><a href="../index.php" ><span class="glyphicon glyphicon-user"> SingIn</span></a>
					
					</li>
					<<li><a href="../signup.php"><span class="glyphicon glyphicon-user">SignUp</span></a></li>
				</ul>
		</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<div id="get_category">
					</div>
					<!--<div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Categories</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
					</div> -->
					<div id="get_brand">
					</div>
					<!--<div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Brand</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
					</div>-->
				</div>
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading">Products</div>
						<div class="panel-body">
							<div id="get_product">
							</div>
							<!--<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Kaftans</div>
									<div class="panel-body">
										<img src="products_images/TMC1.JPG"/>
									</div>
									<div class="panel-heading">$50.00
									<button style="float:right;" class="btn btn-danger btn-xs">Add to chart</button>
									</div>
								</div>
							</div>-->
						</div>
						<div class="panel-footer">The Mallam's Clothing &copy;2017</div>
						</div>
					</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	
	</body>
</html>	