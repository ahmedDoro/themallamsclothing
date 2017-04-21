<?php
session_start();

include "dbconnect.php";

require_once '../class.user.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
	$user_home->redirect('../index.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$uid = $row['userID'];
$username = $row['userName'];
$userEmail = $row['userEmail'];


session_destroy();



if(isset($row['userID'])){
	session_start();
	$uid = $uid;
	$email = $userEmail;
	
		$_SESSION["uid"] = $uid;
		$_SESSION["name"] = $username;
		echo "true";
		header("location: profile.php");
		
	}


?>