<!DOCTYPE html>
<html>
    <head>
		<title>The Mallams Clothing</title>
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="script.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
    <body>
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
				<br />

				<div class="panel panel-info">
				<div class="panel-heading">Product upload</div>
				<div class="panel-body">
               
                <form enctype="multipart/form-data" action="" method="post">
                  
                    <hr/>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
					<label for="title">Title</label>
					<input type="text" name="title" required />
					<label for="price">Price</label>
					<input type="text" name="price" required />
                    <input class="input" type="button" id="add_more" class="upload" value="Add product"/>
                    <input class="submit"type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				
                <?php include "upload.php"; ?>
            <div class="panel-footer">The Mallam's Clothing &copy;2017</div>
						</div>
					</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	
	</body>
</html>	
