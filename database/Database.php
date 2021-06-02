<?php

class Database
{
  // Свойства подключения к БД
  protected $host = 'localhost';
  protected $user = 'root';
  protected $pass = '';
  protected $db = 'Shopp';
  
  public $connection = null;
  
  public function __construct()
  {
    $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    if ($this->connection->connect_error) {
      echo $this->connection->connect_error;
    }
  }
 
  public function __destruct()
  {
    $this->closeConnection();
  }
  
  protected function closeConnection()
  {
    if ($this->connection != null) {
      $this->connection->close();
      $this->connection = null;
    }
  }
}
