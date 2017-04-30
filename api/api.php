<?php
/**
 * Created by PhpStorm.
 * User: 1600574
 * Date: 30/04/2017
 * Time: 16:12
 */
mysql_connect("", "", "") or die(mysql_error());
mysql_select_db("campusdate") or die(mysql_error());

if(function_exists($_GET['method'])){
    $_GET['method']();
}
function getAllproducts(){
    $products_sql = mysql_query("SELECT * FROM products");
    $products = array();
    while($product = mysql_fetch_array($products_sql)){
        $products[] = $product;
    }
    $products = json_encode($products);
    echo $_GET['jsoncallback']. '(' . $products . ')';
}