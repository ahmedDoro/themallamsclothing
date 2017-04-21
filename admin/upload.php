<?php
include "config.php";


$path="../products/products_images";
if (isset($_POST['submit'])) {
	
$title = $_POST["title"];
$price = $_POST["price"];
    $j = 0; //Variable for indexing uploaded image 
    
	$target_path =$path."/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
		$imagename = basename($_FILES['file']['name'][$i]);
		
		
	$sql = "INSERT INTO products(product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keyword) VALUES ('','2','2','$title','$price','$title','$imagename','$title')";
					
	$run_query = mysqli_query($con,$sql);
					
    $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
				//if file moved to uploads folder
				
					
                echo $j. ').<span id="noerror">product uploaded successfully!.</span><br/><br/>';
					
					
					
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
		
    }
}
?>