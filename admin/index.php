<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tbl_users ORDER BY userID DESC"); // using mysqli_query instead
?>
<?php
session_start();
require_once '../class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
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
						<li><a href="../index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
						<li><a href="../products/index.php"><span class="glyphicon glyphicon-modal-window"> Products<span></a></li>
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
<br />

<h2> Management Area</h2>
	
	<a href="../logout.php"> <input type="button" style="float:right;" value="Logout" class="btn btn-success btn-lg"></a>
	<a href="multiupload.php"> <input type="button" style="float:left;" value="Upload Products" class="btn btn-success btn-lg"></a>
	<br />
	<br />
<hr />
	
	
	<div class="panel panel-info">
						<div class="panel-heading">Registered Customers</div>
						<div class="panel-body">
						<table width='80%' border=0>

								<tr bgcolor='#CCCCCC'>
									<td>Name</td>
									<td>User Status</td>
									<td>Email</td>
									<td>Update</td>
								</tr>
														<?php 
								//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
								while($res = mysqli_fetch_array($result)) { 		
									echo "<tr>";
									echo "<td>".$res['userName']."</td>";
									echo "<td>".$res['block']."</td>";
									echo "<td>".$res['userEmail']."</td>";	
									echo "<td><a href=\"edit.php?userID=$res[userID]\">Block</a> | <a href=\"activate.php?userID=$res[userID]\">Activate</a></td>";		
								}
								?>
								
								</table>
						<div class="panel-footer">The Mallam's Clothing &copy;2017</div>
						</div>
					</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	
	</body>
</html>	