<?php
	// Include confi.php
	include_once('../config.php');
	
	
	$action = $_SERVER['REQUEST_METHOD'];
	
	if ($action == 'GET'){
			
			 $getdata = "SELECT * FROM  products ";
		               
						$qur = $conn->query($getdata);
						$msg="";
						while($r = mysqli_fetch_assoc($qur)){
						 
						$msg[] = array("Image:" => $r['product_image'], "Title:" => $r['product_title'], "Price" => $r['product_price']);
						}
						$json = $msg;
						 
						header('content-type: application/json');
						echo json_encode($json);
						 
						@mysqli_close($conn);
			
		
	}
 ?>
