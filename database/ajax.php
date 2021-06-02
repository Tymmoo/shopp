<?php

// Подключение к БД
require('../database/Database.php');

// Класс Product
require('../database/Product.php');

// Объект БД
$db = new Database();

// Объект Product
$product = new Product($db);

if (isset($_POST['productid'])) {
  $result = $product->getProduct($_POST['productid']);
  echo json_encode($result);
}
