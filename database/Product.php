<?php

class Product
{
  public $db = null;

  public function __construct(Database $db)
  {
    if (!isset($db->connection)) return null;
    $this->db = $db;
  }

  // Получение данных о товаре
  public function getData($table = 'Products')
  {
    $result = $this->db->connection->query("SELECT * FROM {$table}");

    $resultArray = array();

    while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $resultArray[] = $product;
    }

    return $resultArray;
  }

  // Получить товар по id 
  public function getProduct($product_id = null, $table = 'Products')
  {
    if (isset($product_id)) {
      $result = $this->db->connection->query("SELECT * FROM {$table} WHERE product_id={$product_id}");

      $resultArray = array();

      while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $resultArray[] = $product;
      }

      return $resultArray;
    }
  }

  public function getCategoryMen($product_category = 1)
  {
    if (isset($product_category)) {
      $result = $this->db->connection->query("SELECT * FROM Products WHERE product_category={$product_category}");

      $resultArray = array();

      while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $resultArray[] = $product;
      }

      return $resultArray;
    }
  }

  public function getCategoryWomen($product_category = 2)
  {
    if (isset($product_category)) {
      $result = $this->db->connection->query("SELECT * FROM Products WHERE product_category={$product_category}");

      $resultArray = array();

      while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $resultArray[] = $product;
      }

      return $resultArray;
    }
  }

  public function getCategoryKids($product_category = 3)
  {
    if (isset($product_category)) {
      $result = $this->db->connection->query("SELECT * FROM Products WHERE product_category={$product_category}");

      $resultArray = array();

      while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $resultArray[] = $product;
      }

      return $resultArray;
    }
  }

  public function getCategorySale($product_category = 4)
  {
    if (isset($product_category)) {
      $result = $this->db->connection->query("SELECT * FROM Products WHERE product_category={$product_category}");

      $resultArray = array();

      while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $resultArray[] = $product;
      }

      return $resultArray;
    }
  }

  public function getName(){
    $result = $this->db->connection->query("SELECT * FROM Products WHERE product_name LIKE '%" . $_POST['name'] . "%'");
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "	<tr>
                  <td>" . $row['product_name'] . "</td>
                </tr>";
      }
    } else {
      echo "<tr><td>0 result's found</td></tr>";
    }
  } 
}
