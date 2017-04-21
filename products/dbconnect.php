<?php
$severname ="br-cdbr-azure-south-b.cloudapp.net";
$username ="b5878316b539fe";
$password = "8e5d969e";
$db ="campusdate";

$con = mysqli_connect($severname, $username, $password, $db);

if(!$con){
	die("Connection failed: " . mysqli_connect_error());
}

?>