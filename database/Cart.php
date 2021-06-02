<?php

class Cart
{
  public $db = null;

  public function __construct(Database $db)
  {
    if (!isset($db->connection)) return null;
    $this->db = $db;
  }

  public function insertIntoCart($params = null, $table = "Cart")
  {
    if ($this->db->connection != null) {
      if ($params != null) {

        $columns = implode(',', array_keys($params));

        $values = implode(',', array_values($params));

        $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

        $result = $this->db->connection->query($query_string);
        return $result;
      }
    }
  }

  public function addToCart($userid, $productid)
  {
    if (isset($userid) && isset($productid)) {
      $params = array(
        "user_id" => $userid,
        "product_id" => $productid
      );

      $result = $this->insertIntoCart($params);
      if ($result) {
        header("Location: " . $_SERVER['PHP_SELF']);
      }
    }
  }

  public function addToWishlist($product_id = null, $saveTable = "Wishlist", $fromTable = "Cart")
  {
    if ($product_id != null) {
      $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE product_id={$product_id};";
      $query .= "DELETE FROM {$fromTable} WHERE product_id={$product_id};";

      $result = $this->db->connection->multi_query($query);

      if ($result) {
        header("Location:" . $_SERVER['PHP_SELF']);
      }
      return $result;
    }
  }

  public function deleteCart($product_id = null, $table = 'Cart')
  {
    if ($product_id != null) {
      $result = $this->db->connection->query("DELETE FROM {$table} WHERE product_id={$product_id}");
      if ($result) {
        header("Location:" . $_SERVER['PHP_SELF']);
      }
      return $result;
    }
  }

  public function deleteWishlist($product_id = null, $table = 'Wishlist')
  {
    if ($product_id != null) {
      $result = $this->db->connection->query("DELETE FROM {$table} WHERE product_id={$product_id}");
      if ($result) {
        header("Location:" . $_SERVER['PHP_SELF']);
      }
      return $result;
    }
  }

  public function getSum($arr)
  {
    if (isset($arr)) {
      $sum = 0;
      foreach ($arr as $productid) {
        $sum += floatval($productid[0]);
      }
      return sprintf('%.2f', $sum);
    }
  }

  public function getCartId($cartArray = null, $key = "product_id")
  {
    if ($cartArray != null) {
      $cart_id = array_map(function ($value) use ($key) {
        return $value[$key];
      }, $cartArray);
      return $cart_id;
    }
  }


}
