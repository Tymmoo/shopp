<?php

require('database/Database.php');

require('database/Product.php');

require('database/Cart.php');

$db = new Database();

$Cart = new Cart($db);
$Product = new Product($db);

$product_men = $Product->getCategoryMen();
$product_women = $Product->getCategoryWomen();
$product_kids = $Product->getCategoryKids();
$product_sale = $Product->getCategorySale();

?>