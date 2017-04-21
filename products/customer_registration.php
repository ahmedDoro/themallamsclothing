<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Mallam's Clothing</title>
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
						<li><a href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"> Products<span></a></li>
					</ul>
				</div>
			</div>
			<p> <br /></p>
			<p> <br /></p>
			<p> <br /></p>
			<div class="container-fluid">
			
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="signup_msg">
					<!-- SignUp Error/Success alert message -->
				</div>
				<div class="col-md-2"></div>
			</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="panel panel-primary">
							<div class="panel-heading">Customer SignUp</div>
							<div class="panel-body">
							
							<form action="" method="POST">
								<div class="row">
									<div class="col-md-6">
										<label for="f_name">First Name</label>
										<input type="text" id="f_name" name="f_name" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="f_name">Last Name</label>
										<input type="text" id="l_name" name="l_name" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" name="email" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="password">Password</label>
										<input type="password" id="password" name="password" class="form-control" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="r_password">Re-Password</label>
										<input type="password" id="r_password" name="r_password" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="phone">Phone Number</label>
										<input type="text" id="phone" name="phone" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="address">Address</label>
										<textarea name="address" class="form-control"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="button" id="signup_button" name="singup_button" style="float:right;" value="SignUp" class="btn btn-success btn-lg">
									</div>
								</div>
							</div>
								
							</div>
							</form>
							<div class="panel-footer">sdffs</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
		
	</body>
	</html>
				