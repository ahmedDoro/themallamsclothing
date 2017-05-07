<?php

use ..\Psr\Http\Message\ServerRequestInterface as Request;

use ..\Psr\Http\Message\ResponseInterface as Response;



$app = new ..\Slim\App;



$app->options('/{routes:.+}', function ($request, $response, $args) {

    return $response;

});



$app->add(function ($req, $res, $next) {

    $response = $next($req, $res);

    return $response

        ->withHeader('Access-Control-Allow-Origin', '*')

        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')

        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

});



//Get All products



$app->get('/api/products', function (Request $request, Response $response){

    //Get all TMC products





    $sql = "SELECT * FROM products";

    try{



        $db = new db();



        $db = $db->connect();

        $stmt = $db->query($sql);

        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($products);

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }



});



// Get a single product

$app->get('/api/products/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM products WHERE product_id = $id";

    try{

        // Get DB Object

        $db = new db();

        // Connect

        $db = $db->connect();

        $stmt = $db->query($sql);

        $products = $stmt->fetch(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($products);

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});



// Add product

$app->post('/api/products/add', function(Request $request, Response $response){





    $product_cat = $request->getParam('product_cat');

    $product_title = $request->getParam('product_title');

    $product_price = $request->getParam('product_price');

    $product_desc = $request->getParam('product_desc');

    $product_image = $request->getParam('product_image');

    $product_keyword = $request->getParam('product_keyword');



    $sql = "INSERT INTO products (product_cat,product_title,product_price,product_desc,product_image,product_keyword) VALUES

    (:product_cat,:product_title,:product_price,:product_desc,:product_image,:product_keyword)";

    try{

        // Get DB Object

        $db = new db();

        // Connect

        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':product_cat', $product_cat);

        $stmt->bindParam(':product_title',  $product_title);

        $stmt->bindParam(':product_price',  $product_price);

        $stmt->bindParam(':product_desc',   $product_desc);

        $stmt->bindParam(':product_image',   $product_image);

        $stmt->bindParam(':product_keyword',  $product_keyword);

        $stmt->execute();

        echo '{"notice": {"text": "Product Added"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});



// Update products

$app->put('/api/products/update/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $product_cat = $request->getParam('product_cat');

    $product_title = $request->getParam('product_title');

    $product_price = $request->getParam('product_price');

    $product_desc = $request->getParam('product_desc');

    $product_image = $request->getParam('product_image');

    $product_keyword= $request->getParam('product_keyword');



    $sql = "UPDATE products SET

				product_cat 	= :product_cat,

				product_title 	= :product_title,

                product_price	= :product_price,

                product_desc	= :product_desc,

                product_image 	= :product_image,

                product_keyword = :product_keyword

                

			WHERE product_id = $id";

    try{

        // Get DB Object

        $db = new db();

        // Connect

        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':product_cat', $product_cat);

        $stmt->bindParam(':product_title', $product_title);

        $stmt->bindParam(':product_price', $product_price);

        $stmt->bindParam(':product_desc', $product_desc);

        $stmt->bindParam(':product_image', $product_image);

        $stmt->bindParam(':product_keyword',  $product_keyword);

        $stmt->execute();

        echo '{"notice": {"text": "product Updated"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});

// Delete product

$app->delete('/api/products/delete/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "DELETE FROM products WHERE product_id = $id";

    try{

        // Get DB Object

        $db = new db();

        // Connect

        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->execute();

        $db = null;

        echo '{"notice": {"text": "product Deleted"}';

    } catch(PDOException $e){

        echo '{"error": {"text": '.$e->getMessage().'}';

    }

});
