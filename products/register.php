<?php
	include "dbconnect.php";
	
	$firstname = $_POST["f_name"];
	$lastname = $_POST["l_name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$r_password = $_POST["r_password"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	
	$name = "/^[A-Z][a-zA-Z]+$/";
	$email_validation = "/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$numbers= "/^[0-9]+$/";
	
if(empty($firstname) || empty($lastname) || empty($password) || empty($r_password) || empty($phone) || empty($address)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Please fill all the required fields...!</b>
			</div>
		";
		exit();
	}
	else {
			if(!preg_match($name, $firstname)){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Invalid name $firstname</b>
			</div>
			";
			exit();
		}
		if(!preg_match($name, $lastname)){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Invalid Surname $lastname</b>
			</div>
			";
			exit();
		}
		if(!preg_match($email_validation, $email)){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Invalid Email Address $email</b>
			</div
			";
			exit();
		}
		if(strlen($password) < 9){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Weak Password</b>
			</div>
			";
			exit();
		}
		if(strlen($r_password) < 9){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Weak Password</b>
			</div>
			";
			exit();
		}
		if($password != $r_password){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Password miss match</b>
			</div>
			";
			exit();
		}	
		if(!preg_match($numbers, $phone)){
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Ivalid Phone number $phone</b>
			</div>
			";
			exit();
		}
	}
	
	$sql ="SELECT user_id FROM customer_user WHERE email='$email' LIMIT 1";
	$query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0){
		echo "
		<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>This email address is already registered</b>
			</div>
			";
		exit();
	}
	else {
		$password = md5($password);
		
		$sql = "INSERT INTO `customer_user` (`user_id`, `f_name`, `l_name`, `password`, `email`, `phone`, `address`) VALUES (NULL, '$firstname', '$lastname', '$password', '$email', '$phone', '$address');";
		$run_query = mysqli_query($con, $sql);
		if($run_query){
			echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Registered successfully..!</b>
			</div>
			";			
		}
	}
	
	
	
	
?>