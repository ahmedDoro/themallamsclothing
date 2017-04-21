<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to The mallam's clothing!<br/>
						To complete your registration  please click link below <br/>
						<br /><br />
						<a href='http://themallamsclothing.azurewebsites.net/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Cheers,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>

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
					<a href="#" class="navbar-brand"><img src="products/products_images/logo1.PNG" style="width:35px; height:30px;" /></a>
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
				<div class="col-md-8">
				
<?php 
		if(isset($_GET['inactive']))
		{
			
   

			echo'Sorry! This Account is not Activated Go to your Inbox and Activate it.';  
			
           
		}
		?>
				<?php if(isset($msg)) echo $msg;  ?>
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
							
							  <form class="form-signin" method="post">
								<div class="row">
									<div class="col-md-6">
										<label for="f_name">Username:</label>
										<input type="text" name="txtuname"  class="form-control" required/>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" name="txtemail"  class="form-control" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="password">Password</label>
										<input type="password" name="txtpass" class="form-control" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="r_password">Re-Password</label>
										<input type="password" id="r_password" name="txtpass"  class="form-control" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<a href="index.php">Sign In</a>&nbsp; <input type="submit" name="btn-signup" style="float:right;" value="SignUp" class="btn btn-success btn-lg">
										
									</div>
								</div>
							</div>
								
							</div>
							</form>
							<div class="panel-footer">&copy;2017 The Mallam's Clothing</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
		
	</body>
	</html>
				